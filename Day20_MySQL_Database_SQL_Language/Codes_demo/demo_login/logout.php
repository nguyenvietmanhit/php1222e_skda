<?php
session_start();
//logout.php
// Xóa session sinh ra khi login thành công
unset($_SESSION['username']);

//Xóa cookie ghi nhớ đăng nhập
setcookie('username', '', time() - 1);

$_SESSION['success'] = 'Đăng xuất thành công';
header('Location: login.php');
exit();

