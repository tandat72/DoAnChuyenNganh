

<!------------------------------Slider-------------------------------------------->
<div class="slideshow-container">
    <div class="mySlides fade">
      <img src="images/slider/slider2.jpg" style="width:100%">
    </div>
  
    <div class="mySlides fade">
      <img src="images/laptop3.jpg" style="width:100%">
    </div>
  
    <div class="mySlides fade">
      <img src="images/laptop2.jpg" style="width:100%">
    </div>
  
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  
  <br>
  
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span> 
    <span class="dot" onclick="currentSlide(2)"></span> 
    <span class="dot" onclick="currentSlide(3)"></span> 
  </div>
<style>
.mySlides img {
    border-top-right-radius: 50px;
    border-top-left-radius: 50px;
    border-bottom-left-radius: 200px;
    border-bottom-right-radius: 30px;
}
.mySlides {
  display: none;
}
.dot{
    cursor: pointer;
}
.next{
    cursor: pointer;
}
.prev{
    cursor: pointer;
}
.slideshow-container {
  max-width: 1200px;
  position: relative;
  margin: auto;
}

.prev,
.next {
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active,
.dot:hover {
  background-color: #717171;
}


</style>
<script>
    var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

// Auto play
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  setTimeout(carousel, 3000); // Change image every 5 seconds
}

</script>  


<!--------->
<style>
   .tvgh{
    cursor: pointer;
    border-radius: 12px; 
    border: 2px solid black;
    height: 24px;
    margin: 0px auto;
    }
    
</style>
<div class="cartegory-right row container">
    <div class="cartegory-right-top-item">
        <p style="text-align: center; font-size: 30px; color: red;" >CPU</p>
    </div>
    <?php
    $product = new classAll();
    $category_id = 17;
    $show_product = $product -> show_product_index($category_id);
    ?>
     <div class="cartegory-right-content row">
      <?php 
        while($result = $show_product -> fetch_assoc()){
      ?>
        <div class="cartegory-right-content-item">
            <form method="Post" action="add_cart.php?product_id=<?php echo $result['product_id']?>">
        <img src="admin/uploads/<?php echo $result['product_thumnail'] ?>" alt="">
            <h1><?php echo $result['product_name'] ?></h1>
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
             <div>
                <input class="tvgh" type="submit" name="add_cart" value="Thêm vào giỏ hàng">
                <a href="product.php?product_id=<?php echo $result['product_id']?>">Xem chi tiết</a>
            </div>
            </form>
        </div>
      <?php
        }
      ?>
    </div>
     <div class="seeall">
        <h1><a href="cartegory.php?category_id=<?php echo $category_id ?>">Xem tất cả</a></h1>
       </div>
    </div>

    <div class="cartegory-right row container">
        <div class="cartegory-right-top-item">
            <p style="text-align: center; font-size: 30px; color: red;" >VGA</p>
        </div>
        <?php
    $product = new classAll();
    $category_id = 20;
    $show_product = $product -> show_product_index($category_id);
    ?>
     <div class="cartegory-right-content row">
      <?php 
        while($result = $show_product -> fetch_assoc()){
      ?>
        <div class="cartegory-right-content-item">
            <form method="Post" action="add_cart.php?product_id=<?php echo $result['product_id']?>">
        <img src="admin/uploads/<?php echo $result['product_thumnail'] ?>" alt="">
            <h1><?php echo $result['product_name'] ?></h1>
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
             <div>
                <input class="tvgh" type="submit" name="add_cart" value="Thêm vào giỏ hàng">
                <a href="product.php?product_id=<?php echo $result['product_id']?>">Xem chi tiết</a>
            </div>
            </form>
        </div>
      <?php
        }
      ?>
    </div>
    <div class="seeall">
        <h1><a href="cartegory.php?category_id=<?php echo $category_id ?>">Xem tất cả</a></h1>
       </div>
    </div>


