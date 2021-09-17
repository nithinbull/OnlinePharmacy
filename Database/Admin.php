<?php

// Use to fetch product data
class Admin
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getDataAdmin Method
    public function getDataAdmin( $table = 'product'){
       
        $result = $this->db->con->query("SELECT * FROM {$table}");
        
        $resultArray = array();
        
        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    //delete different table items according to needs
    public function deleteAdmin($id=null,$table="product"){
        
        
        if($table =='user')
        {   
            $result = $this->db->con->query("DELETE FROM {$table} WHERE user_id={$id}");
            if($result)
            {
                $result = $this->db->con->query("DELETE FROM orders WHERE user_id={$id}");
            }
        }
        else if($table == 'blogs')
        {
            $result = $this->db->con->query("DELETE FROM {$table} WHERE blog_id={$id}");
        }
        else
        {   
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id={$id}");
        }
        if($result){
           header("Location:" . $_SERVER['PHP_SELF']);
        }
        
    }

     // insert into product table
     public  function insertIntoProduct($params = null, $table = "product"){
        
        if ($this->db->con != null){
            if ($params != null){
                
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode('","' , array_values($params));

                // create sql query
                $query_string = sprintf('INSERT INTO %s(%s) VALUES ("%s")', $table, $columns, $values);
                echo $query_string;
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;

            }
        }
    }

    
    // to get product data and insert into cart table
    public  function addToProduct($item_name,$item_brand,$item_image,$item_price,$item_description,$item_prescription,$item_quantity){
        if (isset($item_quantity) && isset($item_name) && isset($item_brand) && isset($item_image) && isset($item_price) && isset($item_description) && isset($item_prescription) ){
            $params = array(
                
                "item_brand" => $item_brand,
                "item_name" => $item_name,
                "item_price" => $item_price,
                "item_image" => $item_image,
                
                "item_description" => $item_description,
                "item_prescription" => $item_prescription,
                "item_quantity" => $item_quantity
            );
            
        
            // insert data into cart
            $result = $this->insertIntoProduct($params);
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }
    
    //to get data and insert into blogs table
    public  function addToBlog($item_title,$item_image,$item_abstract,$item_link){
        if (isset($item_title) && isset($item_abstract) && isset($item_image) && isset($item_link) ){
            $params = array(
                
                "blog_name" => $item_title,
                "blog_image" => $item_image,
                "blog_link"  => $item_link,
                "blog_abstract" => $item_abstract
            );
            // insert data into cart
            $result = $this->insertIntoProduct($params,'blogs');
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    //to get data and insert into user table
    public  function addToUser($first_name,$last_name,$user_mail,$user_password,$user_type,$user_address){
        if (isset($first_name) && isset($last_name) && isset($user_mail) && isset($user_type) && isset($user_password) ){
            $params = array(
                
                "first_name" => $first_name,
                "last_name" => $last_name,
                "user_mail"  => $user_mail,
                "user_type"  => $user_type,
                "user_password" => $user_password,
                "user_address"  => $user_address
            );
            // insert data into cart
            $result = $this->insertIntoProduct($params,'user');
            if ($result){
                // Reload Page
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

}