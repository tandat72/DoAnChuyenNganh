<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_brand.php"
?>

<?php
$brand = new brand;

    $brand_id = $_GET['brand_id'];
    $get_brand = $brand -> get_brand($brand_id);
    if($get_brand){
        $result_1 = $get_brand -> fetch_assoc();
    }

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand ->update_brand($category_id,$brand_name,$brand_id);
    echo "<script>window.location.href='brand-list.php'</script>";
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Sửa loại sản phẩm</h1>
                <form action="" method="post">
                    <select name="category_id" id="">
                        <?php
                        $show_category = $brand -> show_category();
                        if($show_category){while($result = $show_category-> fetch_assoc()){
                        ?>
                        <option <?php if($result_1['category_id'] == $result['category_id']) {echo "SELECTED";} ?> value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select><br>
                    <input name="brand_name" type="text" placeholder="Nhập tên danh mục" value="<?php echo $result_1['brand_name']?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>