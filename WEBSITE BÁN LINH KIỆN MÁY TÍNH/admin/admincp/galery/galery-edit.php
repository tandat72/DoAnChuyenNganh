<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_galery.php";
?>

<?php
$galery = new galery;
$galery_id = $_GET['galery_id'];

?>

<div class="admin-content-right">
        <div class="admin-content-right-category_list">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="">Ảnh mô tả<span style="color: red;">*</span></label><br>
                <input name="galery_thumbnail" type="file">
                <button type="submit">Sửa</button>
            </form>
        </div>
</div>
    </section>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    $galery_thumbnail= $_FILES['galery_thumbnail'];
    $file_name = $_FILES['galery_thumbnail']['name'];
    $file_temp = $_FILES['galery_thumbnail']['tmp_name'];
    $div = explode('.',$file_name);
    $file_ext = strtolower(end($div));
    $galery_thumbnail = substr(md5(time()),0,10).'.'.$file_ext;
    $upload_img = "../../uploads/".$galery_thumbnail;
    move_uploaded_file($file_temp,$upload_img);

    $update_galery = $galery -> update_galery($galery_thumbnail,$galery_id);
    echo "<script>window.location.href='galery-list.php'</script>";
}
?>