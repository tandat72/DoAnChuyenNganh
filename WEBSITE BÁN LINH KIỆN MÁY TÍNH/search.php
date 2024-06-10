<?php
 include "layout/header.php";
?>
<?php
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


    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }else{
        $search = $_GET['search'];
    }

    $searching = new classAll();

    $product = new classAll();
    $show_product = $product -> show_product_search($search,$begin);
    $page_change_search = $product -> page_change_search($search);
    $row_count = mysqli_num_rows($page_change_search);
    $page = ceil($row_count/4);
?>

<section class="cartegory">
    
    <div class="container">
        <div class="row">
            <div class="cartegory-left">
                
            </div>
            <div class="cartegory-right row">
            <h3>Tìm Kiếm: <?php echo $search ?></h3>
<div class="cartegory-right-content row">
<?php

    while($result = mysqli_fetch_array($show_product)){
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
?>
                <div class="cartegory-right-bottom row">
                    <div class="cartegory-right-bottom-items">
                        <p><?php echo $presen ?><span>|</span><?php echo $row_count ?></p>
                    </div>
                    <div class="cartegory-right-bottom-items">
                        <ul>
                            <?php
                                for($i=1;$i<=$page;$i++){
                            ?>
                                <li <?php if($i == $presen){echo 'style="background: red;"';}else{echo "";} ?>><a href="search.php?page=<?php echo $i ?>&search=<?php echo $search ?>"><?php echo $i ?></a></li>
                            <?php  } ?>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
        include "layout/footer.php";
?>