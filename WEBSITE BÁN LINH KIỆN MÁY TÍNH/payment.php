<?php
    include "layout/header.php";
    require('mail/sendmail.php');
    
    $class = new classAll();
    $customer_name = $_SESSION['user_name'];
    if(isset($_SESSION['user_id'])){
    $customer_id = $_SESSION['user_id'];
    $code_cart = rand(0,9999);
    $insert_cart = $class -> insert_cart($customer_id,$code_cart,'1');
    if($insert_cart){
        foreach($_SESSION['cart'] as $key => $value){
            $product_id = $value['product_id'];
            $product_amount= $value['product_amount'];
            $amount = $class -> storage_amount($product_id);
            $result = mysqli_fetch_assoc($amount);
            $insert_cart_details = $class -> insert_cart_details($product_id,$code_cart,$product_amount);
            $storage_amount = $result['product_amount'] - $value['product_amount']  ;
            $update_storage_amount = $class -> update_storage_amount($product_id,$storage_amount);
            
        }
       
        $tieude = "Đặt hàng website thành công";
        $noidung = "<p>Cảm ơn bạn ".$customer_name." đã đặt hàng của chúng tôi với mã đơn hàng là: ".$code_cart."</p>
                    <p>Thông tin đơn hàng:</p> ";
                    foreach($_SESSION['cart'] as $key => $val){
                    $noidung.="
                    <p>Tên sản phẩm: ".$val['product_name']."</p>
                    <p>Số lượng sản phẩm: ".$val['product_amount']."</p>
                    <p>Giá tiền: ".number_format($val['product_price'],0,',','.')."</p>";
                    }
                    $noidung.="
                    <p>Bạn vui lòng kiểm tra và nhấn nút XÁC NHẬN bên dưới để tiến hành vận chuyển</p>
                    <p><a href='https://hkdstore.000webhostapp.com'>Xác nhận</a></p>";
                    
        $maildathang = $_SESSION['user_email'];
        $mail = new Mailer;
        $mail->dathangmail($tieude,$noidung,$maildathang);    
    }
    unset($_SESSION['cart']);
    
echo "<div class='camon'><h1 class='one'><p class='ppp'>Vui lòng check thông tin đơn hàng qua mail nhé!</p>Cảm ơn bạn đã đặt hàng, chúng tôi sẻ liên hệ bạn trong thời gian sớm nhất !</h1><button class='btn'><a href='index.php'>Tiếp tục mua sắm</a></button></div>";
}else{
    echo "<script>window.location.href='login.php'</script>";
}
?>
<style>
    .camon {
  display: flex;
  justify-content: center;
  align-items: center;
    height: 100vh;
}

.one {
  text-align: center;
}
.btn{
    font-size: 23px;
}
.ppp{
    font-size:19px;
    color: blue;
}

</style>