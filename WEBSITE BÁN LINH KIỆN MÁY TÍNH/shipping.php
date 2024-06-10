<?php
    include "layout/header.php";
  
?>

<section class="delivery">
    <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                    <i class="fas fa-shopping-delivery "></i>
                </div>
                <div class="delivery-top-adress delivery-top-item">
                    <i class="fas fa-money-check-alt "></i>
                </div>
                <div class="delivery-top-payment delivery-top-item">
                    <i class="fas fa-money-check-alt "></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="delivery-content row">
            <div class="delivery-content-right">
                <?php
                    if(isset($_SESSION['user_id'])){   
                        $user_id = $_SESSION['user_id']; 
                        $cart = new classAll();
                        $show_cart = $cart -> show_cart_details($user_id);

                ?>
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Quản lý</th>
                    </tr>
                    <?php
                    if($show_cart){
                        $thanhtien = 0;
                        $tongtien = 0;
                        while($result = $show_cart->fetch_assoc()){
                        $discount = ($result['product_discount'] * $result['product_price'])/100;
                        $product_af_dis = $result['product_price'] - $discount;
                        $thanhtien = $result['product_amount'] * $product_af_dis;
                        $tongtien +=$thanhtien;
                    ?>
                    <tr>
                        <td><?php echo $result['code_cart'] ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><img style="width: 50px;" height="50px" src="admin/uploads/<?php echo $result['product_thumnail']?>"></td>
                        <td><?php echo $result['product_amount'] ?></td>
                        <td><?php echo number_format($product_af_dis,0,',','.') ?></td>
                        <td><p><?php echo number_format($thanhtien,0,',','.')  ?><sup>đ</sup></p></td>
                        <?php if($result['cart_status'] == 1){?>
                            <td><p style=color:red;>Đang chờ<p></td>
                            <?php
                        }elseif($result['cart_status'] == 2){?>
                        <td><p style=color:green;>Hoàn thành<p></td>
                        <?php
                        }elseif($result['cart_status'] == 0){
                        ?>
                        <td><a href="shipping_confirm.php?cart_status='2'&code=<?php echo  $result['code_cart']?>">Đã Nhập Hàng</a> | <a href="shipping_cancel.php?code=<?php echo  $result['code_cart']?>">Huỷ Đơn Hàng</a></td>
                        <?php  } ?>
                    </tr>
                    <?php
                            }
                    
                    ?>
                    <tr>
                        <td style="font-weight: bold;" colspan="3">Tổng</td>
                        <td style="font-weight: bold;"><p><?php echo number_format($tongtien,0,',','.')  ?><sup>đ</sup></p></td>
                    </tr>
                    <?php
                    }else{
                        ?>
                    <tr>
                        <td colspan="8">Chưa có đơn hàng nào</td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <?php
                    }else{
                ?>
                <table>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Quản lý</th>
                    </tr>
                    <tr>
                        <td colspan="8">Chưa có đơn hàng nào</td>
                    </tr>
                </table>
                <?php }?>
            </div>
        </div>
    </div>
</section>

<?php
    include "layout/footer.php";
?>