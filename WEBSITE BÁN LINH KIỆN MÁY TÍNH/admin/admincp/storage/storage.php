<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_product.php";
?>
<?php
$product = new product;
$show_product = $product -> show_product_storage();
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_list">
            <label for="">Chọn danh mục sản phẩm<span style="color: red;">*</span></label>
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
                    <option value="">--Chọn--</option>
                    <?php
                        $show_brand = $product -> show_brand();
                        if($show_brand){while($result = $show_brand -> fetch_assoc()){        
                    ?>
                        <option value="<?php echo $result['brand_id']?>" ><?php echo $result['brand_name']?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <section id="product-type">

                </section>
            </div>
        </div>
    </section>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#category_id").change(function(){
            var x = $(this).val()
            $.get("storage-brand-ajax.php",{category_id:x},function(data){
                $("#brand_id").html(data);
            })
        })
    })
</script>
<script>
    $(document).ready(function(){
        $("#brand_id").click(function(){
            var x = $(this).val()
            $.get("storage-list-ajax.php",{brand_id:x},function(data){
                $("#product-type").html(data);
            })
        })
    })
</script>