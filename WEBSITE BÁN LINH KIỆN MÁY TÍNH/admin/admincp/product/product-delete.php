<?php
include "../class/class_product.php";
$product = new product;
$product_id = $_GET['product_id'];
$product_id = $product -> delete_product($product_id);
echo "<script>window.location.href='product-list.php'</script>";
?>