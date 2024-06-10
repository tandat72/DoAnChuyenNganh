<?php
    include "../class/class_brand.php";
    $brand = new brand;

    $category_id = $_GET['category_id'];
    $show_brand = $brand -> show_brand($category_id);
?>


<table>
                    <tr>
                        <th>Stt</th>
                        <th>Id</th>
                        <th>Danh mục</th>
                        <th>Loại sản phẩm</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    $show_brand_ajax = $brand->show_brand_ajax($category_id);
                    if ($show_brand_ajax) {
                    while ($result = $show_brand_ajax->fetch_assoc()) {
                    ?>
                    <?php
                        if($show_brand){$i=0;
                        while($result = $show_brand->fetch_assoc()) {$i++;  
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brand_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><a href="brand-edit.php?brand_id=<?php echo $result['brand_id'] ?>">Sửa</a> | <a href="brand-delete.php?brand_id=<?php echo $result['brand_id'] ?>">Xoá</a></td>
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