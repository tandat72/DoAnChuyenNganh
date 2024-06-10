<?php
include "class/class.php";
$cart = new classAll();
$code_cart = $_GET['code'];
$delete_cart= $cart -> delete_cart($code_cart);

echo "<script>window.location.href='shipping.php'</script>";
?>
