<?php
    include "../class/class_cart.php";
    $cart = new cart();
    if(isset($_GET['cart_status']) && isset($_GET['code'])){
        $status = $_GET['cart_status'];
        $code = $_GET['code'];
        $update_status = $cart -> update_cart($status,$code);
        
    echo "<script>window.location.href='order-list.php'</script>";
    }
?>