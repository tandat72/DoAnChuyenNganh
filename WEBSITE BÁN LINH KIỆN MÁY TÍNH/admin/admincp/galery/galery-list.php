<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_galery.php";
?>

<?php
$galery = new galery;
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_list">
            <label for="">Chọn danh mục sản phẩm<span style="color: red;">*</span></label>
                <select name="product_id" id="product_id">
                    <option value="#">--Chọn--</option>
                    <?php
                        $show_product = $galery -> show_product();
                        if($show_product){while($result = $show_product -> fetch_assoc()){        
                    ?>
                        <option value="<?php echo $result['product_id']?>" ><?php echo $result['product_name']?></option>
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
        $("#product_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get("galery-ajax.php",{product_id:x},function(data){
                $("#product-type").html(data);
            })
        })
    })
</script>