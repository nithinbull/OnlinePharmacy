<?php
class user{

    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    

    //get data about user
    public function getUser($user_mail = null, $table= 'user'){
        if (isset($user_mail)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE user_mail='{$user_mail}'");

            $resultArray = array();

            // fetch password
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            
            return $resultArray;
        }
    }
    
    // insert into user table
    public  function insertIntoUser($params = null, $table = "user"){
        
        if ($this->db->con != null){
            if ($params != null){
                
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode('","' , array_values($params));

                // create sql query
                $query_string = sprintf('INSERT INTO %s(%s) VALUES ("%s")', $table, $columns, $values);
                // execute query
                $result = $this->db->con->query($query_string);
                return $result;

            }
        }
    }

    //to get data and insert into user table
    public  function addToUser($first_name,$last_name,$user_mail,$user_password,$security_question,$answer,$user_type,$user_address=null){
        if (isset($first_name) && isset($last_name) && isset($user_mail) && isset($user_type) && isset($user_password) ){
            $params = array(
                
                "first_name" => $first_name,
                "last_name" => $last_name,
                "user_mail"  => $user_mail,
                "user_type"  => $user_type,
                "user_password" => $user_password,
                "user_address"  => $user_address,
                "security_question"  => $security_question,
                "security_answer"  => $answer
                
            );
            
            // insert data into user
            $result = $this->insertIntoUser($params,'user');
            if($result)
            header('location:'.$_SERVER['PHP_SELF']);
        }
    }

    //reset password of the user
    public function resetPassword($id,$user_password)
    {
        //UPDATE `user` SET `user_password` = '$2y$10$Ev4lN1cHQWItLm4gYJ7jHuM7.a4hgye' WHERE `user`.`user_id` = 11;
        
        $query_string = "UPDATE `user` SET `user_password`='{$user_password}' WHERE `user_id`={$id}";     
        $result = $this->db->con->query($query_string);
        return $result;
    }


}

?>