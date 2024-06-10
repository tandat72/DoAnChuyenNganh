<?php
include "../class/class_galery.php";
$galery = new galery;
$galery_id = $_GET['galery_id'];
$galery_id = $galery -> delete_galery($galery_id);
echo "<script>window.location.href='galery-list.php'</script>";
?>