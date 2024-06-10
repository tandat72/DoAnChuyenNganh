<?php
include "../class/class_cart.php";
$cart = new cart;
$code_cart = $_GET['code'];
$delete_cart= $cart -> delete_cart($code_cart);

echo "<script>window.location.href='order-list.php'</script>";
?>
