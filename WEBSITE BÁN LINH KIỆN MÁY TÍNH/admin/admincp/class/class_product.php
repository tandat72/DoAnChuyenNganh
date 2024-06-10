<?php
    include "../../database/database.php";
?>
<?php

class product {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();

    }

    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_discount = $_POST['product_discount'];
        $product_amount = $_POST['product_amount'];
        $product_description = $_POST['product_description'];
        $product_thumnail = $_FILES['product_thumnail']['name'];
        move_uploaded_file($_FILES['product_thumnail']['tmp_name'],"../../uploads/".$_FILES['product_thumnail']['name']);


        $query = "INSERT INTO product (product_name,category_id,brand_id,product_price,product_discount,product_amount,product_description,product_thumnail) 
        VALUES ('$product_name','$category_id','$brand_id','$product_price','$product_discount','$product_amount','$product_description','$product_thumnail')";

        $result = $this ->db->insert($query);
        if($result){
            $query = "SELECT * FROM product ORDER BY product_id DESC LIMIT 1";
            $result = $this -> db ->select($query)->fetch_assoc();
            $product_id  = $result['product_id'];
            $filename = $_FILES['galery_thumbnail']['name'];
            $filetmp = $_FILES['galery_thumbnail']['tmp_name'];

            foreach($filename as $key => $value){
                move_uploaded_file($filetmp[$key],"../../uploads/".$value);
                $query = "INSERT INTO galery (product_id,galery_thumbnail)
                VALUES ('$product_id','$value')";
                $result = $this ->db->insert($query);
            }     
        }

        return $result;
    }

    public function show_product($brand_id){
        $query = "SELECT * FROM product p INNER JOIN brand b ON p.brand_id = b.brand_id
        WHERE p.brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    
    public function show_product_storage(){
        $query = "SELECT product_id, product_name, product_amount FROM product";
        $result = $this ->db->select($query);
        return $result;
    }

    public function delete_product($product_id){
        $query = "DELETE FROM product WHERE  product_id = '$product_id'";
        $result = $this ->db->delete($query);
        
        return $result;  
    }

    public function update_product($product_id ,$product_name,$category_id,$brand_id,$product_price,$product_discount,$product_amount,$product_description,$product_thumnail){
        if($product_thumnail !=''){
            move_uploaded_file($_FILES['product_thumnail']['tmp_name'],"../../uploads/".$_FILES['product_thumnail']['name']);
            $sql = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
            $result = $this ->db->update($sql);
            while($row = mysqli_fetch_array($result)){
                unlink('../../uploads/'.$row['product_thumnail']);
            }
            $query = "UPDATE product SET product_name = '$product_name',category_id = '$category_id',brand_id = '$brand_id',product_price = '$product_price',
            product_discount = '$product_discount',product_amount='$product_amount',product_description = '$product_description',
            product_thumnail = '$product_thumnail'
            WHERE product_id = '$product_id'";
            $result = $this ->db->update($query);

        }else{
            $query = "UPDATE product SET product_name = '$product_name',category_id = '$category_id',brand_id = '$brand_id',product_price = '$product_price',
            product_discount = '$product_discount',product_amount='$product_amount',product_description = '$product_description'
            WHERE product_id = '$product_id'";
            $result = $this ->db->update($query);
        }
        return $result;
    }

    public function show_brand(){
        $query = "SELECT brand.*, category.category_name FROM brand
        INNER JOIN category ON brand.category_id = category.category_id
        ORDER BY brand.brand_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_brand_ajax($category_id){
        $query = "SELECT * FROM brand WHERE category_id = '$category_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_list_ajax($brand_id){
        $query = "SELECT * FROM product WHERE brand_id = '$brand_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_brand($brand_id){
        $query = "SELECT * FROM brand WHERE brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_product($product_id){
        $query = "SELECT * FROM product WHERE product_id = '$product_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    
    public function show_category(){
        $query = "SELECT * FROM category ORDER BY category_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
   
    public function get_category($category_id){
        $query = "SELECT * FROM category WHERE category_id = '$category_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_category($category_name,$category_id){
        $query = "UPDATE category SET category_name = '$category_name' WHERE  category_id = '$category_id'";
        $result = $this ->db->update($query);
        return $result;
    }
}
?>