<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_product.php";
?>
<?php
$product = new product;
$product_id = $_GET['product_id'];
$get_product= $product -> get_product($product_id);
if($get_product){
    $result_1 = $get_product -> fetch_assoc();
}

?>
<?php
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $product_price = $_POST['product_price'];
    $product_discount = $_POST['product_discount'];
    $product_amount = $_POST['product_amount'];
    $product_description = $_POST['product_description'];
    $product_thumnail = $_FILES['product_thumnail'];

    $file_name = $_FILES['product_thumnail']['name'];
    $file_temp = $_FILES['product_thumnail']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $product_thumnail = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_img = "../../uploads/".$product_thumnail;
    move_uploaded_file($file_temp,$upload_img);

    $update_product = $product -> update_product($product_id,$product_name,$category_id,$brand_id,$product_price,$product_discount,$product_amount,$product_description,$product_thumnail);
    echo "<script>window.location.href='product-list.php'</script>";
}
?>

<div class="admin-content-right">
            <div class="admin-content-right-product-add">
                <h1>Sửa Sản Phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" type="text" value="<?php echo $result_1['product_name']?>">
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label>
                    <select name="category_id" id="category_id">
                        <option value="#">--Chọn--</option>
                        <?php
                            $show_category = $product -> show_category();
                            if($show_category){while($result = $show_category -> fetch_assoc()){        
                        ?>
                        <option <?php if($result_1['category_id'] == $result['category_id']) {echo "SELECTED";} ?> 
                        value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                        <?php
                            }  
                        }
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">--Chọn--</option>
                        <?php
                        $show_brand= $product -> show_brand();
                        if($show_brand){while($result = $show_brand -> fetch_assoc()){ 
                        ?>
                        <option <?php if($result_1['brand_id'] == $result['brand_id']) {echo "SELECTED";} ?> 
                        value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="">Nhập giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_price" type="text" placeholder="Giá sản phẩm" value="<?php echo $result_1['product_price']?>">
                    <label for="">Nhập giá khuyến mãi<span style="color: red;">*</span></label>
                    <input name="product_discount" type="text" placeholder="Giá khuyến mãi" value="<?php echo $result_1['product_discount']?>">
                    <label for="">Nhập số lượng<span style="color: red;">*</span></label>
                    <input name="product_amount" type="text" placeholder="Giá khuyến mãi" value="<?php echo $result_1['product_amount'] ?>">
                    <label for="">Nhập mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea name="product_description" id="editor1" cols="30" rows="10" placeholder="Mô tả sản phẩm"><?php echo $result_1['product_description']?></textarea>
                    <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <img style="width: 50px;" height="50px" src="../../uploads/<?php echo $result_1['product_thumnail'] ?>" alt=""> <br>
                    <input name="product_thumnail" required type="file">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
<script>
    var editor = CKEDITOR.replace( 'editor1' );
    CKFinder.setupCKEditor( editor );
</script>

</html>