<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_category.php";
?>
<?php
$category = new category;
if(!isset($_GET['category_id']) || $_GET['category_id']==NULL ) {
    echo "<script>window.location = 'category-list.php'</script>";
}
else{
    $category_id = $_GET['category_id'];
}
    $get_category = $category -> get_category($category_id);
    if($get_category){
        $result = $get_category -> fetch_assoc();
    }

?>

<?php
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $category_name= $_POST['name'];
    $insert_category = $category -> update_category($category_name,$category_id);
    echo "<script>window.location.href='category-list.php'</script>";
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-cartegory_add">
                <h1>Sửa tên danh mục</h1>
                <form action="" method="post">
                    <input name="name" type="text" placeholder="Nhập tên danh mục" 
                    value="<?php echo $result['category_name'] ?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>