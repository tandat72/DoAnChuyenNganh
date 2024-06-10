<?php
    include "layout/header.php";

    $product_id = $_GET['product_id'];
    $product = new classAll();
    $get_product = $product -> get_product($product_id);
    $result = $get_product -> fetch_assoc();

    $show_product_galery = $product -> show_product_galery($product_id);
?>
    <!-----------------------------------------------------Product--------------------------------------------->
    <section class="product">
        <div class="container">
            <div class="product-top row">
                <p>Trang chủ</p> <span>&#10230; </span> <p><?php echo $result['category_name'] ?></p> <span>&#10230;</span> <p><?php echo $result['brand_name'] ?></p><span>&#10230;</span> <p><?php echo $result['product_name'] ?></p>
            </div>
            
            <div class="product-content row">
                <div class="product-content-left row">
                      <div class="product-content-left-big-img">
                        <img src="admin/uploads/<?php echo $result['product_thumnail'] ?>" alt="">
                      </div>
                      <div class="product-content-left-small-img">
                      <?php
							if($show_product_galery){$i=0;
								while($result1 = $show_product_galery->fetch_assoc()){$i++;
							?>
                            <img src="admin/uploads/<?php echo $result1['galery_thumbnail'] ?>" alt="">
							<?php
							}}
							?>
                      </div>
                </div>
                <div class="product-content-right">
                    <form method="post" action="add_cart.php?product_id=<?php echo $result['product_id']?>">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $result['product_name'] ?></h1>
                        <p>(No.00775414)</p>
                    </div>
                    <div class="product-content-right-product-price">
                        
                        <?php
                            if($result['product_discount'] == 0){
                        ?>
                              <p>Giá:  <?php echo number_format($result['product_price'],0,',','.') ?><sup>đ</sup></p>
                         <?php
                            }else{
                        ?>
                        <p style="color:red;">Giá gốc: <del><?php echo number_format($result['product_price'],0,',','.') ?></del><sup>đ  <?php echo '-'.$result['product_discount'].'%'?></sup></p>
                        <?php
                            $discount = ($result['product_discount'] * $result['product_price'])/100;
                            $product_af_dis = $result['product_price'] - $discount;
                        ?>
                        <p>Giá khuyến mãi: <?php echo number_format($product_af_dis,0,',','.') ?><sup>đ</sup></p>
                        <?php
                            }
                        ?>
                        
                    </div>
                    <?php
                        if($result['product_amount'] ==0){
                            echo "<h1 style=color:red;>Hết hàng</h1>";
                        }else{
                    ?>
                    <div class="product-content-right-product-button">
                        <button name="add_cart"><i class="fas fa-shopping-cart"></i>Mua hàng</button>
                    </div>
                    <?php
                        }
                    ?>
                    </form>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-phone-alt"></i><p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-comments"></i><p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-envelope"></i><p>Mal</p>
                        </div>
                    </div>
                    <div class="product-content-right-product-QR">
                        <img src="" alt="">
                    </div>
                    
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            &#8744;
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                    <p>Cấu hình chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan">
                                    <p>Thông tin hàng hóa</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet"> 
                                <?php echo $result['product_description'] ?>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    Model	i3-10100F
                                    Thương hiệu	Intel
                                    Xuất xứ	Malaysia
                                    Thời gian bảo hành (tháng)	36.<br><br>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------------------------------Footer--------------------------------------------->
<script src="js/script.js"></script>
<script src="js/slider.js"></script>
<?php
        include "layout/footer.php";
?>