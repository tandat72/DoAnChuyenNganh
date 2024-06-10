<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_brand.php"
?>

<?php
$brand = new brand;
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <label for="">Chọn loại sản phẩm<span style="color: red;">*</span></label>
                <select name="category_id" id="category_id">
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
                <section id="list-brand">


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
            $.get("brand-list-ajax.php",{category_id:x},function(data){
                $("#list-brand").html(data);
            })
        })
    })
</script>