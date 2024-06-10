<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_category.php";
?>

<?php
$cartegory = new category;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $cartegory_name= $_POST['category_name'];
    $insert_cartegory = $cartegory ->insert_category($cartegory_name);
    echo "<script>window.location.href='category-list.php'</script>";
}

?>

<div class="admin-content-right">
            <div class="admin-content-right-category-add">
                <h1>Thêm Danh Mục</h1>
                <form id="add-category-parent" action="" method="post">
                    <input name="category_name" type="text" placeholder="Nhập tên danh mục">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>