<?php
    session_start();
    include "class/class.php";
    $brand = new classAll();
    $show_brand = $brand -> show_brand();

    $category = new classAll();
    $show_category = $category -> show_category();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/script.js"></script>
    <script src="js/slider.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="css/mainstyle.css">
    <title>Website Bán Linh Kiện Máy Tính</title>
</head>
<style>
body{
    background: #FFCCCC;
}
    .logo123{
        width: 250px;
        height:100px;
    }
</style>
<body>
<section class="top">
        <div class="container">
            <div class="row">
                <div class="top-logo">
                    <a href="index.php">
                        <img src="images/logo/logo123.png" class="logo123" alt="Trang chủ">
                    </a>
                </div>
                <div class="top-menu-items">
                    <ul>
                        <?php
                            if($show_category){$i=0;
                                while($result = $show_category->fetch_assoc()) {$i++; 
                        ?>
                        <li class="hieuung1"><a href="cartegory.php?category_id=<?php echo $result['category_id']; ?>"><?php echo $result['category_name'] ?></a>

                        <?php  
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="top-menu-icons">
                    <ul>
                        <li>
                            <form action="search.php" method="POST">
                            <input type="text" placeholder="Tìm kiếm" name="search" id="">
                            <i class="fas fa-search"></i>
                            </form>
                        </li>
                        <li class="user" style="width: max-content;">
                            <?php
                                if(isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
                                    echo '<p>Xin chào:</p>
                                    <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()"><i class="fa fa-bars"></i>'.$_SESSION['user_name'].'
</button>
  <div class="dropdown-content" id="myDropdown">
    <a href="user_detail.php">Thông tin tài khoản</a>
    <a href="shipping.php">Chi tiết đặt hàng</a>
    <a href="logout.php">Đăng xuất</a>
  </div>
</div>
<style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

.show {
  display: block;
}
p{
    margin-left: 10px;
     font-weight: bold;
}
.vip {
  width: 35px;
  height: 5px;
  background-color: black;
  margin: 6px 0;
</style>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<script>
/* Khi nút được nhấp vào, kích hoạt hàm để thêm hoặc xóa lớp show */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

/* Đóng dropdown nếu người dùng nhấn chuột bất kỳ nơi nào khác trên trình duyệt */
window.onclick = function(event) {
  if (!event.target.matches(".dropbtn")) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains("show")) {
        openDropdown.classList.remove("show");
      }
    }
  }
}
</script>
 <p style="margin-left: 10px;  font-weight: bold;"> </p>';
                                }else{
                            ?>
                            <div class=" navbar-collapse justify-content-end inner-header" id="collapsibleNavbar">
      <ul class="navbar-nav" style="float: right;">
        <li class="nav-item">
          <a class="nav-link btn btn-info" href="login.php"><b>Đăng nhập</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-info" href="signup.php"><b>Đăng ký</b></a>
        </li>
      </ul>
    </div>
                            <?php
                            }
                            ?>
                        </li>
            
                        <li class="cart">
                            <a href="cart.php">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

