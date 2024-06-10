<?php
include "../class/class_brand.php";
$brand = new brand;
$brand_id = $_GET['brand_id'];
$delete_brand = $brand -> delete_brand($brand_id);
echo "<script>window.location.href='brand-list.php'</script>";
?>
