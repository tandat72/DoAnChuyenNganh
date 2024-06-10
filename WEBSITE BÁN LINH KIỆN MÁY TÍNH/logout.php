<?php

session_start();

if(isset($_SESSION['user_name']))
{
	unset($_SESSION['user_name']);
	unset($_SESSION['user_id']);
    unset($_SESSION['cart']);
}

header("Location: index.php");
die;