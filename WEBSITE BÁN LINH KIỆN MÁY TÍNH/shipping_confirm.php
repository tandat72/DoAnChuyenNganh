<?php
    include "class/class.php";
    $cart = new classAll();
    if(isset($_GET['cart_status']) && isset($_GET['code'])){
        $status = $_GET['cart_status'];
        $code = $_GET['code'];
        $update_status = $cart -> update_cart($status,$code);
        
echo "<script>window.location.href='shipping.php'</script>";
    }
?>