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
                        <th>Tình trạng</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    if($show_cart){$i=0;
                        while($result = $show_cart->fetch_assoc()) {$i++; 
                            if($result['cart_status'] == 0){           
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['code_cart'] ?></td>
                        <td><?php echo $result['user_name'] ?></td>
                        <td><?php echo $result['user_address'] ?></td>
                        <td><?php echo $result['user_phone'] ?></td>
                        <td><a href="order-pending.php?code=<?php echo $result['code_cart'] ?>">Xem chi tiết</a></td>
                    </tr>
                    <?php
                        }
                    ?>
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