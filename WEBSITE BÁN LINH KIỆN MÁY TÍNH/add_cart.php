<?php
    session_start();
    include "class/class.php";
// them so luong san pham
    if(isset($_GET['plus'])){
        $product_id = $_GET['plus'];
        $product = new classAll();
        $get_product_cart = $product -> get_product_cart($product_id);
        $result = mysqli_fetch_array($get_product_cart);

        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['product_id'] != $product_id){
                $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $cart_item['product_amount'],
                'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
                $_SESSION['cart'] = $product_cart;
            }else{
                
                if($cart_item['product_amount'] < $result['product_amount']){
                    $plust_cart = $cart_item['product_amount'] + 1;
                    $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $plust_cart,
                    'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
                }else{
                    $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $cart_item['product_amount'],
                    'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
                }
                $_SESSION['cart'] = $product_cart;
            }
        }
        
    echo "<script>window.location.href='cart.php'</script>";
    }
//tru so luong san pham
if(isset($_GET['minus'])){
    $product_id = $_GET['minus'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['product_id'] != $product_id){
            $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $cart_item['product_amount'],
            'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
            $_SESSION['cart'] = $product_cart;
        }else{
            
            if($cart_item['product_amount'] > 1){
                $minus_cart = $cart_item['product_amount'] -1 ;
                $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $minus_cart,
                'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
            }else{
                $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $cart_item['product_amount'],
                'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
            }
            $_SESSION['cart'] = $product_cart;
        }
    }
    echo "<script>window.location.href='cart.php'</script>";
}
//xoa san pham trong gio hang
    if(isset($_SESSION['cart']) && isset($_GET['delete'])){
        $product_id=$_GET['delete'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['product_id'] != $product_id){
                $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $cart_item['product_amount'],
                'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
            }
            $_SESSION['cart'] = $product_cart;
            echo "<script>window.location.href='cart.php'</script>";
        }
    }
//them san pham vao gio hang
    if(isset($_POST['add_cart'])){
        //session_destroy();
        $product_id = $_GET['product_id'];
        $soluong = 1;
        $product = new classAll();
        $get_product_cart = $product -> get_product_cart($product_id);
        $result = mysqli_fetch_array($get_product_cart);
        $discount = ($result['product_discount'] * $result['product_price'])/100;
        $product_af_dis = $result['product_price'] - $discount;

        if($result){
            $new_product = array(array('product_name' => $result['product_name'], 'product_id' => $product_id, 'product_amount' => $soluong,
            'product_price' => $product_af_dis, 'product_thumnail' => $result['product_thumnail']));
            // kiem tra session cart ton tai
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    //neu du lieu trung
                    if($cart_item['product_id']==$product_id){
                        $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $soluong +1,
                        'product_price' => $product_af_dis, 'product_thumnail' => $cart_item['product_thumnail']);
                        $found =true;
                    }else{
                        // du lieu khong trung
                        $product_cart[] = array('product_name' => $cart_item['product_name'], 'product_id' => $cart_item['product_id'], 'product_amount' => $cart_item['product_amount'],
                        'product_price' => $cart_item['product_price'], 'product_thumnail' => $cart_item['product_thumnail']);
                    }
                }
                if($found == false){
                    //lien ket du lieu cua product_cart voi new_product
                    $_SESSION['cart'] = array_merge($product_cart, $new_product);
                }
                else{
                    $_SESSION['cart'] = $product_cart;
                }
            }else{
                $_SESSION['cart'] = $new_product;
            }
        }
       echo "<script>window.location.href='cart.php'</script>";
    }
?>
