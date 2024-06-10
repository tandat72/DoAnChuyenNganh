<?php
    include "layout/header.php";

    if(isset($_GET['page'])){
        $presen = $_GET['page'];
    }else{
        $presen = 1;
    }
    if($presen == '' || $presen == 1){
        $begin = 0;
    }else{
        $begin = ($presen * 4)-4;
    }
?>
<?php
    $category_id = $_GET['category_id'];
    $product = new classAll();
    $show_product = $product -> show_product($category_id,$begin);
    $get_category = $category -> get_category($category_id); 
    $page_change = $product -> page_change($category_id);
    $row_count = mysqli_num_rows($page_change);
    $page = ceil($row_count/4);
?>
<!--------------------------------------------------Cartegory--------------------------------------------------------------->
<section class="cartegory">
    <div class="container">
        <div class="cartegory-top row">
            <p>Trang chủ</p> <span>&#10230; </span> <p>CPU</p> <span>&#10230;</span> <p>Tất cả</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="cartegory-left">

            </div>
            <div class="cartegory-right row">
                <div class="cartegory-right-top-item">
                    <p>Tất cả</p>
                </div>
                 <div class="cartegory-right-content row">
                 <?php
                    if($show_product){$i=0;
                    while($result = $show_product->fetch_assoc()) {$i++;  
                ?>
                    <div class="cartegory-right-content-item">
                        <form method="Post" action="add_cart.php?product_id=<?php echo $result['product_id']?>">
                        <a href="product.php?product_id=<?php echo $result['product_id']?>"><img src="admin/uploads/<?php echo $result['product_thumnail'] ?>" alt=""></a>
                        <a href="product.php?product_id=<?php echo $result['product_id']?>"><h1><?php echo $result['product_name']?></h1></a>
                        <?php
                            if($result['product_amount'] == 0){
                                echo "<h1 style=color:red;>Hết hàng</h1>"; }else{
                        ?>
                        <?php
                            if($result['product_discount'] == 0){
                        ?>
                              <p><?php echo number_format($result['product_price'],0,',','.') ?><sup>đ</sup></p>;
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
                        <div class="product-content-right-product-button">
                            <button name="add_cart">  
                                    <i class="fas fa-shopping-cart"></i>
                                    <p>Mua hàng</p>
                                
                            </button>
                        </div>
                        <?php
                            }
                        ?>
                        </form>
                    </div>
                    <?php
                        }
                    }
                    ?>
                </div>


                <div class="cartegory-right-bottom row">
                    <div class="cartegory-right-bottom-items">
                        <p><?php echo $presen ?><span>|</span><?php echo $page ?></p>
                    </div>
                    <div class="cartegory-right-bottom-items">
                        <ul>
                            <?php
                                for($i=1;$i<=$page;$i++){
                            ?>
                                <li <?php if($i == $presen){echo 'style="background: red;"';}else{echo "";} ?>><a href="cartegory.php?page=<?php echo $i ?>&category_id=<?php echo $category_id ?>"><?php echo $i ?></a></li>
                            <?php  } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!------------------------------------------------------Footer--------------------------------------------->
<?php
    include "layout/footer.php";
?>