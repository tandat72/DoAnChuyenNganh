<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_cart.php";

    $code = $_GET['code'];
    $cart = new cart();
    $show_cart_details = $cart -> show_cart_details($code);
    
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                        if($show_cart_details){
                            $i=0;
                            $tongtien=0;
                            $code_cart=0;
                            while($result = $show_cart_details->fetch_assoc()) {
                                $i++;
                                $discount = ($result['product_discount'] * $result['product_price'])/100;
                                $product_af_dis = $result['product_price'] - $discount;
                                $thanhtien = $result['product_amount'] * $product_af_dis;
                                $tongtien += $thanhtien;
                                $code_cart= $result['code_cart'];
                                $cart_status = $result['cart_status'];
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo  $code_cart ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['product_amount'] ?></td>
                        <td><?php echo number_format($product_af_dis,0,',','.').'vnđ'  ?></td>
                        <td><?php echo number_format($thanhtien,0,',','.').'vnđ'?></td>
                        
                    </tr>
                    <?php
                        }
                    }
                    ?>
                    <?php
                    if($cart_status == 1){
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td><a href="order-processing.php?cart_status='0'&code=<?php echo $code_cart ?>">Hoàn thành</a> | <a href="order-delete.php?code=<?php echo $code_cart?>">Xoá</a></td></tr>                    
                    <?php
                    }elseif($cart_status == 0) {
                     ?>
                    <td colspan="6"></td>
                        <td><a href="order-delete.php?code=<?php echo $code_cart?>">Xoá</a></td></tr> 
                     <?php   
                    }elseif($cart_status == 2){ }
                    ?>
                        <td colspan="7">
                            <p style="font-size: 20px;">Tổng tiền:<?php echo number_format($tongtien,0,',','.').'vnđ'?> </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</body>
</html>