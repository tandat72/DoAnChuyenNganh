<?php
    include "../../database/database.php";
?>
<?php

class galery {
    private $db;

    public function __construct()
    {
        $this -> db = new Database();

    }

    public function show_product(){
        $query = "SELECT product_id ,product_name FROM product";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_galery($product_id){
        $query = "SELECT g.galery_thumbnail, g.galery_id FROM galery g , product p WHERE g.product_id = p.product_id AND g.product_id = '$product_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_galery_list_ajax($product_id){
        $query = "SELECT galery_id, product_id, galery_thumbnail FROM galery WHERE product_id = '$product_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_galery($galery_id){
        $query = "SELECT * FROM galery WHERE galery_id = '$galery_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_galery($galery_thumbnail,$galery_id){

        move_uploaded_file($_FILES['galery_thumbnail']['tmp_name'],"../../uploads/".$_FILES['galery_thumbnail']['name']);
        $sql = "SELECT * FROM galery WHERE galery_id = '$galery_id' LIMIT 1";
        $result = $this ->db->update($sql);
        while($row = mysqli_fetch_array($result)){
            unlink('../../uploads/'.$row['galery_thumbnail']);
        }
        $query = "UPDATE galery SET galery_thumbnail = '$galery_thumbnail' WHERE  galery_id = '$galery_id'";
        $result = $this ->db->update($query);   
        return $result;
    }
    
    public function delete_galery($galery_id){
        $query = "DELETE FROM galery WHERE  galery_id = '$galery_id'";
        $result = $this ->db->delete($query);
        return $result;  
    }
}
?>