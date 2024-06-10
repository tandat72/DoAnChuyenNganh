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
                        <th>Số lượng</th>
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
                        <td><?php echo $result['product_amount'] ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
    </table>
<?php
    }
}
?>