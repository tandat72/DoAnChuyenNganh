<?php
    include "ketnoi/database.php";
?>
<?php
class classAll {
    private $db;
    public function __construct()
    {
        $this -> db = new Database();

    }
    public function show_category(){
        $query = "SELECT * FROM category ORDER BY category_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_category($category_id){
        $query = "SELECT * FROM category WHERE category_id = $category_id";
        $result = $this -> db ->select($query);
        return $result;
    }

    public function show_brand(){
        //$query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT brand.*, category.category_name FROM brand
        INNER JOIN category ON brand.category_id = category.category_id
        ORDER BY brand.brand_id DESC";
        // $query = "SELECT c.category_id, c.category_name, b.brand_id, b.brand_name FROM brand b, category c WHERE c.category_id = b.category_id";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_product($category_id,$begin){
        $query = "SELECT * FROM product WHERE category_id = $category_id ORDER BY product_id DESC LIMIT $begin , 4";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_product_index($category_id){
        $query = "SELECT * FROM product WHERE category_id = $category_id ORDER BY product_id DESC LIMIT 4";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_product($product_id){
        $query = "SELECT p.*,c.category_name, b.brand_name FROM product p , category c, brand b WHERE b.category_id = p.category_id AND p.category_id = c.category_id AND p.product_id= $product_id";
        $result = $this ->db->select($query);
        return $result;
    }
    public function show_product_galery($product_id){
        $query = "SELECT * FROM galery WHERE product_id=$product_id ORDER BY product_id DESC";
        $result1 = $this ->db->select($query);
        return $result1;
    }
    
    public function get_product_cart($product_id){
        $query = "SELECT * FROM product WHERE product_id = '$product_id' LIMIT 1";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_user($user_name){
        $query = "select * from user where user_name = '$user_name' limit 1";
		$result = $this -> db->select($query);
        return $result;
    }

    public function insert_user($user_name, $password,$user_email,$user_address, $user_phone,$role_id ){
        $query = "insert into user (user_name,user_password,user_email,user_address,user_phone,role_id) values ('$user_name','$password','$user_email','$user_address','$user_phone','0')";
		$result = $this -> db->insert($query);
        return $result;
    }

   public function insert_cart($customer_id, $code_cart, $cart_status)
    {
        $query = "insert into cart (customer_id,code_cart,cart_status) values ('$customer_id','$code_cart','$cart_status')";
		$result = $this -> db->insert($query);
        return $result;
    }

    public function insert_cart_details($product_id, $code_cart, $product_amount)
    {
        $query = "insert into cart_details (product_id,code_cart,product_amount) values ('$product_id','$code_cart','$product_amount')";
		$result = $this -> db->insert($query);
        return $result;
    }

    public function storage_amount($product_id){
        $query = "SELECT * FROM product WHERE product_id = $product_id ORDER BY product_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_storage_amount($product_id, $product_amount){
        $query = "UPDATE product SET product_amount = '$product_amount' WHERE product_id = '$product_id'";
        $result = $this ->db->update($query);
        return $result;
    }
    
    public function show_cart_details($user_id){
        $query = "SELECT r.customer_id, r.cart_status, c.code_cart, p.product_name, p.product_thumnail, c.product_amount, p.product_price, p.product_discount FROM cart r, cart_details c, product p WHERE c.product_id = p.product_id AND r.code_cart = c.code_cart AND r.customer_id = '$user_id'  ORDER BY cart_details_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }
    
    public function update_cart($cart_status, $code_cart){
        $query = "UPDATE cart SET cart_status = $cart_status WHERE code_cart = $code_cart";
        $result = $this ->db->update($query);
        return $result;
        }

    public function delete_cart($code_cart){
        $query = "DELETE FROM cart  WHERE  code_cart='$code_cart'";
        $result = $this ->db->delete($query);
        return $result;  
    }
    
    public function page_change($category_id){
        $query = "SELECT * FROM product p WHERE category_id = $category_id";
        $result = $this ->db->select($query);
        return $result;
    }

    public function page_change_search($search){
        $query = "SELECT * FROM product p WHERE product_name LIKE '%$search%'  ";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_product_search($search,$begin){
        $query = "SELECT * FROM product p WHERE p.product_name LIKE '%$search%' ORDER BY product_id DESC LIMIT $begin, 4";
        $result = $this ->db->select($query);
        return $result;
    }
    public function update_user($user_id,$user_name,$user_password, $user_phone, $user_email, $user_address){
        $query = "UPDATE user SET user_name = '$user_name', user_phone = '$user_phone', user_password = '$user_password', user_email = '$user_email', user_address = '$user_address' WHERE user_id= '$user_id'";
        $result = $this ->db->update($query);
        return $result;
    }
    public function get_user_signup($user_phone, $user_email){
        $query = "SELECT user_phone, user_email FROM user WHERE user_phone = '$user_phone' OR user_email= '$user_email'";
		$result = $this -> db ->select($query);
        return $result;
    }
    public function show_user(){
        $query = "SELECT user_phone, user_email FROM user";
		$result = $this -> db ->select($query);
        return $result;
    }
}
?>