<?php
    include "../class/class_cart.php";
    include "../header.php";
    include "../menu.php";
    $cart = new cart();
    $show_cart = $cart -> show_cart();
?>
<div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tình trạng</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    if($show_cart){$i=0;
                        while($result = $show_cart->fetch_assoc()) {$i++;  
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['code_cart'] ?></td>
                        <td><?php echo $result['user_name'] ?></td>
                        <td><?php echo $result['user_address'] ?></td>
                        <td><?php echo $result['user_phone'] ?></td>
                        <td><?php echo $result['user_email'] ?></td>
                        <td><?php if($result['cart_status'] == 1){
                            echo '<p style="color:red;font-size:16px;">Chưa xác nhận<p>';
                        }elseif($result['cart_status'] ==0){
                            echo '<p style=color:green;font-size:16px;>Đã xác nhận</p>';
                        }elseif(($result['cart_status'] == 2)){
                            echo '<p style=color:green;font-size:16px;>Đã nhận hàng</p>';
                        } ?></td>
                        <td><a href="order-pending.php?code=<?php echo $result['code_cart'] ?>">Xem chi tiết</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>