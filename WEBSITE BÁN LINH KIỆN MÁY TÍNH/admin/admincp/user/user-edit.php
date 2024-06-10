<?php
    include "../header.php";
    include "../menu.php";
    include "../class/class_user.php";

    $user_id = $_GET['user_id'];
    $user = new user();
    $get_user = $user -> get_user($user_id);
    $result = $get_user -> fetch_assoc();

    if($_SERVER['REQUEST_METHOD']=== 'POST'){
        $user_name = $_POST['user_name'];
        $user_phone = $_POST['user_phone'];
        $user_address = $_POST['user_address'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $update_user = $user -> update_user($user_id,$user_name,$user_password,$user_phone,$user_email,$user_address);
        echo "<script>window.location.href='user-list.php'</script>";
    }
?>
<style>
    form{
        display: grid;
    }
    label{
        margin-bottom: -20px;
    }
    .button{
    display: block;
    margin-top: 10px;
    height: 30px;
    width: 100px;
    cursor: pointer;
    background-color: brown;
    border: none;
    color: white;
    transition: all 0.3s ease;
}
    .button:hover{
    background-color: transparent;
    border: 1px solid brown;
    color: brown;

}
</style>
<div class="admin-content-right">
    <div class="admin-content-right-category_list">
        <form action="" method="POST">
            <td><label for="">Họ Tên</label>
            <input type="text" name="user_name" value="<?php echo $result['user_name'] ?>"></td>
            <td><label for="">Mật Khẩu</label>
            <input type="text" name="user_password" value="<?php echo $result['user_password'] ?>"></td>
            <td><label for="">Địa chỉ</label>
            <input type="text" name="user_address" value="<?php echo $result['user_address'] ?>"></td>
            <td><label for="">Email</label>
            <input type="text" name="user_email" value="<?php echo $result['user_email'] ?>"></td>
            <td><label for="">Số Điện Thoại</label>
            <input type="text" name="user_phone" value="<?php echo $result['user_phone'] ?>"></td>
            <input class="button" type="submit" value="Sửa">
        </form>
    </div>
</div>
    </section>
</body>
</html>