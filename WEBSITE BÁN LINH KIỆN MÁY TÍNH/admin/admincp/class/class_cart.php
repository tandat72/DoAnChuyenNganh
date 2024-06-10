<?php
    include "../../database/database.php";
?>
<?php
    class cart{
        private $db;

        public function __construct()
        {
            $this -> db = new Database();
    
        }

        public function show_cart(){
        $query = "SELECT * FROM cart c, user u WHERE c.customer_id = u.user_id ORDER BY cart_id DESC";
        $result = $this ->db->select($query);
        return $result;
        }

        public function show_cart_details($code_cart){
            $query = "SELECT c.code_cart, p.product_name, c.product_amount, p.product_price, p.product_discount, r.cart_status FROM cart_details c, product p, cart r WHERE c.product_id = p.product_id AND c.code_cart = r.code_cart AND c.code_cart = '$code_cart' ORDER BY cart_details_id DESC";
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
    }
?>