<?php
    include "layout/header.php";
?>
<!---------------------------------------Cart-------------------------->
<section class="cart">
    <div class="container">
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart "></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fas fa-money-check-alt "></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fas fa-money-check-alt "></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <?php
                    if(isset($_SESSION['cart'])){   
                ?>
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>
                    <?php                         
                            $i=0;
                            $tongtien=0;
                            $tongsoluong = 0;
                            foreach($_SESSION['cart'] as $cart_item){
                            $i++;
                            $thanhtien = $cart_item['product_amount'] * $cart_item['product_price'];
                            $tongtien += $thanhtien;
                            $tongsoluong += $cart_item['product_amount'];
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><img style="width: 50px; height: 50px;" src="../admin/uploads/<?php echo $cart_item['product_thumnail']?>" alt=""></td>
                        <td><p><?php echo $cart_item['product_name']?></p></td>
                        <td style="align-items: center; display: flex; padding-bottom: 54px; padding-left: 50px;"><?php echo $cart_item['product_amount']?> <a href="add_cart.php?plus=<?php echo $cart_item['product_id']?>"><span>+</span></a> <a href="add_cart.php?minus=<?php echo $cart_item['product_id']?>"><span>-</span></a> </td>
                        <td><p><?php echo number_format ($cart_item['product_price'],0,',','.')?><sup>đ</sup></p></td>
                        <td><?php echo number_format ( $thanhtien ,0,',','.')?><sup>đ</sup></td>
                        <td><a href="add_cart.php?delete=<?php echo $cart_item['product_id']?>"><span>X</span></a></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </table>
                    </div>
                    <div class="cart-content-right">
                    <table>
                    <tr>
                        <th colspan="2" >Tổng tiền</th>
                    </tr>
                    <tr>
                        <td>Tổng số lượng</td>
                        <td><?php echo $tongsoluong ?></td>
                    </tr>
                    <tr>
                        <td>Tổng tiền hàng</td>
                        <td><p><?php echo number_format($tongtien,0,',','.') ?><sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td>Tạm tính</td>
                        <td><p style="color: black; font-weight: bold;" ><?php echo number_format($tongtien,0,',','.')  ?> <sup>đ</sup></p></td>
                    </tr>
                </table>
                <!-- <div class="cart-content-right-text">
                    <p>Bạn sẽ dc freeship trên 2tr vnĐ</p>
                    <p style="color:red; font-weight: bold;">mua thêm <span style="font-size: 18px;">131.000đ</span> dc freeship</p>
                </div> -->
                <div class="cart-content-right-button">
                    <a href="index.php"><button>Tiếp tục mua sắm</button></a>
                    <a href="payment.php"><button>Thanh toán</button></a>
                </div>
            </div>
        </div>
    </div>
</section>


                    <?php
                    }else{
                    ?>
                        <tr>
                        <td colspan="7"><p>Giỏ hàng trống</p></td>
                        </tr>
                        </table>
                    </div>

                    <div class="cart-content-right">
                    <table>
                    <tr>
                        <th colspan="2" >Tổng tiền</th>
                    </tr>
                    <tr>
                        <td>Tổng số lượng</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>Tồng tiền hàng</td>
                        <td><p>0<sup>đ</sup></p></td>
                    </tr>
                    <tr>
                        <td>Tạm tính</td>
                        <td><p style="color: black; font-weight: bold;" >0 <sup>đ</sup></p></td>
                    </tr>
                </table>
                <!-- <div class="cart-content-right-text">
                    <p>Bạn sẽ dc freeship trên 2tr vnĐ</p>
                    <p style="color:red; font-weight: bold;">mua thêm <span style="font-size: 18px;">131.000đ</span> dc freeship</p>
                </div> -->
                <div class="cart-content-right-button">
                <a href="index.php"><button>Tiếp tục mua sắm</button></a>
                <a href="payment.php"><button>Thanh toán</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
                        <?php
                    }
                    ?>


<!------------------------------------------------------Footer--------------------------------------------->

<?php
    include "layout/footer.php";
?>
<script src="js/script.js"></script>
<script src="js/slider.js"></script>
