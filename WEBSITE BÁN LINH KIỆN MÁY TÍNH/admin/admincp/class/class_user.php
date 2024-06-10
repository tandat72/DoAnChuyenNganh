<?php
    include "../../database/database.php";
?>
<?php

class user {
    private $db;

    public function __construct()
    {
        $this -> db = new Database();

    }

    public function show_user(){
        $query = "SELECT * FROM user";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_user($user_id){
        $query = "select * from user where user_id = '$user_id' limit 1";
		$result = $this -> db->select($query);
        return $result;
    }

    public function update_user($user_id,$user_name,$user_password, $user_phone, $user_email, $user_address){
        $query = "UPDATE user SET user_name = '$user_name', user_phone = '$user_phone', user_password = '$user_password', user_email = '$user_email', user_address = '$user_address' WHERE user_id= '$user_id'";
        $result = $this ->db->update($query);
        return $result;
    }

    public function delete_user($user_id){
        $query = "DELETE FROM user WHERE  user_id = '$user_id'";
        $result = $this ->db->delete($query);
        
        return $result;  
    }
}
?>