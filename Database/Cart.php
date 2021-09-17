<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']."?item_id=".$itemid);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null,$user_id= null, $table = 'cart',$order_id=null){
        if($item_id != null){
            if(isset($order_id))
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id} and user_id={$user_id} and order_id={$order_id}");
            else
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$item_id} and user_id={$user_id}");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // get item_id's of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }


    // place order function
    public function placeOrder($user_id)
    {   
        //get data from the cart table
        $result = $this->db->con->query("SELECT * FROM cart WHERE user_id={$user_id}");
        $resultArray = array();
        
        // fetch CART data 
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        
        foreach($resultArray as $item){
        $params= array(
            'user_id'   => $item['user_id'],
            'item_id'   => $item['item_id'],
            'order_quantity' => $item['item_quantity']
            ); 
        $result=$this->insertIntoCart($params,'orders');
            
        if($result)
        {   
            $this->deleteCart($item['item_id'],$item['user_id']);
        }
        }
        return 1;
        
    }

    //update quantity in cart item
    public function updateQuantity($item_id =null,$quantity=null,$table='cart')
    {
        if(isset($item_id) && isset($quantity))
        $result = $this->db->con->query("UPDATE {$table} SET `item_quantity` = {$quantity} WHERE `cart`.`item_id` = {$item_id};");
        return $result;
        
    }


}