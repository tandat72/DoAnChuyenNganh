<?php
include "../class/class_category.php";
$category = new category;
if(!isset($_GET['category_id']) || $_GET['category_id']==NULL ) {
    echo "<script>window.location.href='category-list.php'</script>";
}
else{
    $category_id = $_GET['category_id'];
}
    $delete_category = $category -> delete_category($category_id);
    echo "<script>window.location.href='category-list.php'</script>";
?>
