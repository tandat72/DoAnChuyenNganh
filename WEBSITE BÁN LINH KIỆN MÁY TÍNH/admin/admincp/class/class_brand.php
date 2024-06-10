<?php
    include "../../database/database.php";
?>
<?php

class brand {
    private $db;

    public function __construct()
    {
        $this -> db = new Database();

    }

    public function insert_brand($category_id,$brand_name)
    {
        $query = "INSERT INTO brand (category_id,brand_name) VALUES ('$category_id','$brand_name')";
        $result = $this ->db->insert($query);
        header('Location:brand-list.php');
        return $result;
    }

    public function show_brand($category_id){
        //$query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT b.brand_id, b.brand_name, c.category_name FROM brand b, category c WHERE c.category_id = b.category_id AND b.category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    
    public function get_brand($brand_id){
        $query = "SELECT * FROM brand WHERE brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    
    public function update_brand($category_id,$brand_name,$brand_id){
        $query = "UPDATE brand SET brand_name = '$brand_name',category_id = '$category_id'  WHERE  brand_id = '$brand_id'";
        $result = $this ->db->update($query);
        return $result;
    }

    public function delete_brand($brand_id){
        $query = "DELETE FROM brand  WHERE  brand_id = '$brand_id'";
        $result = $this ->db->delete($query);
        return $result;  
    }


public function show_category(){
        $query = "SELECT * FROM category ORDER BY category_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_category($category_id){
        $query = "SELECT * FROM cartegory WHERE category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    
        public function show_brand_ajax($category_id){
        $query = "SELECT * FROM category WHERE category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }
}
?>