<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_product.php";
?>

<?php
$product = new product;
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $insert_product = $product -> insert_product($_POST,$_FILES);
}
?>
<div class="admin-content-right">
            <div class="admin-content-right-product-add">
                <h1>Thêm Sản Phẩm</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" type="text">
                    <label for="">Chọn danh mục<span style="color: red;">*</span></label>
                    <select name="category_id" id="category_id">
                        <option value="#">--Chọn--</option>
                            <?php
                                $show_category = $product -> show_category();
                                if($show_category){while($result = $show_category -> fetch_assoc()){        
                            ?>
                                <option value="<?php echo $result['category_id']?>" ><?php echo $result['category_name']?></option>
                            <?php
                                }
                            }
                            ?>
                    </select>
                    <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">
                        <option value="#">--Chọn--</option>
                    </select>
                    <label for="">Nhập giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_price" type="text" placeholder="Giá sản phẩm">
                    <label for="">Nhập giá khuyến mãi<span style="color: red;">*</span></label>
                    <input name="product_discount" type="text" placeholder="Giá khuyến mãi">
                    <label for="">Nhập số lượng<span style="color: red;">*</span></label>
                    <input name="product_amount" type="text" placeholder="Giá khuyến mãi">
                    <label for="">Nhập mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea name="product_description" id="editor1" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
                    <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_thumnail" type="file">
                    <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
                    <input name="galery_thumbnail[]" multiple type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
<script>
    var editor = CKEDITOR.replace( 'editor1' );
    CKFinder.setupCKEditor( editor );
</script>
<script>
    $(document).ready(function(){
        $("#category_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get("product-brand-ajax.php",{category_id:x},function(data){
                $("#brand_id").html(data);
            })
        })
    })
</script>
</html>