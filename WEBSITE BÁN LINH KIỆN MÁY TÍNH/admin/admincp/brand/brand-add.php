<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_brand.php"
?>

<?php
$brand = new brand;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $category_id = $_POST['category_id'];
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand ->insert_brand($category_id,$brand_name);
    echo "<script>window.location.href='brand-list.php'</script>";
}
?>

        <div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <form id="add-category-child" action="" method="post">
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label>
                    <select name="category_id" id="">
                        <option value="#">--Chọn--</option>
                        <?php
                        $show_category = $brand -> show_category();
                        if($show_category){while($result = $show_category-> fetch_assoc()){
                        ?>
                            <option value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <input name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm">
                    <button type="submit">Thêm</button>
                </form>
            </div>
       </div>
    </section>
</body>
</html>