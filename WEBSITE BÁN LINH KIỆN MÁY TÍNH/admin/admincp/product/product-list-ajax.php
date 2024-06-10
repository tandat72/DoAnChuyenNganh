<?php
    include "../class/class_product.php";
$product = new product;
$brand_id = $_GET['brand_id'];
$show_product = $product -> show_product($brand_id);
?>


    <table>
                    <tr>
                        <th>Stt</th>
                        <th>Id</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Giá khuyến mãi</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                        $show_product_list_ajax = $product->show_product_list_ajax($brand_id);
                        if ($show_product_list_ajax) {
                        while ($result = $show_product_list_ajax->fetch_assoc()) {
                    ?>
                    <?php
                        if($show_product){$i=0;
                        while($result = $show_product ->fetch_assoc()) {$i++;  
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_id'] ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['product_price'] ?></td>
                        <td><?php echo $result['product_discount'] ?></td>
                        <td><img style="width: 50px;" height="50px" src="../../uploads/<?php echo $result['product_thumnail']?>"></td>
                        <td><a href="product-edit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a> | <a href="product-delete.php?product_id=<?php echo $result['product_id'] ?>">Xoá</a></td>
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
