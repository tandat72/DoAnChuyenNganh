<?php
include "../class/class_user.php";
$user = new user;
$user_id = $_GET['user_id'];
$user_id = $user -> delete_user($user_id);
echo "<script>window.location.href='user-list.php'</script>";
?>