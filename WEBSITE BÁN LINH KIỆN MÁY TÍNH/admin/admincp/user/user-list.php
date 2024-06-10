<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_user.php";

    $user = new user();
    $show_user = $user -> show_user();

?>
<div class="admin-content-right">
            <div class="admin-content-right-category_list">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Họ Tên</th>
                        <th>Mật Khẩu</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Tuỳ biến</th>
                    </tr>
                    <?php
                    if($show_user){$i=0;
                        while($result = $show_user->fetch_assoc()) {$i++;  
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['user_name'] ?></td>
                        <td><?php echo $result['user_password'] ?></td>
                        <td><?php echo $result['user_address'] ?></td>
                        <td><?php echo $result['user_phone'] ?></td>
                        <td><?php echo $result['user_email'] ?></td>
                        <td><a href="user-edit.php?user_id=<?php echo $result['user_id'] ?>">Sửa</a> | <a href="user-delete.php?user_id=<?php echo $result['user_id'] ?>">Xoá</a></td>
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