<?php
    include "../class/class_galery.php";
$galery = new galery;
$product_id = $_GET['product_id'];
$show_galery = $galery -> show_galery($product_id);
?>


    <table>
                    <tr>
                        <th>Stt</th>
                        <th>Id</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    $show_galery_list_ajax = $galery->show_galery_list_ajax($product_id);
                    if ($show_galery_list_ajax) {
                        while ($result = $show_galery_list_ajax->fetch_assoc()) {
                    ?>
                    <?php
                        if($show_galery){$i=0;
                        while($result = $show_galery ->fetch_assoc()) {$i++;  
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['galery_id'] ?></td>
                        <td><img style="width: 50px;" height="50px" src="../../uploads/<?php echo $result['galery_thumbnail']?>"></td>
                        <td><a href="galery-edit.php?galery_id=<?php echo $result['galery_id'] ?>">Sửa</a> | <a href="galery-delete.php?galery_id=<?php echo $result['galery_id'] ?>">Xoá</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <?php
    }
}
?>
    </table>
