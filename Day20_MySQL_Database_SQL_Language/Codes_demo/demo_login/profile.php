<?php
session_start();
// Ktra nếu chưa đăng nhập thì ko cho truy cập trang này,
//bằng cách chuyển hướng ngược lại về login
if (!isset($_SESSION['username'])) {
	$_SESSION['error'] = 'Bạn chưa đăng nhập';
	header('Location: login.php');
	exit();
}


//profile.php
// Hiển thị thông tin user vừa đăng nhập thành công
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

if (isset($_SESSION['success'])) {
	echo $_SESSION['success'];
	//Sau khi hiển thị xong thì xóa đi - session dạng flash
	unset($_SESSION['success']);
}

echo "<br>Chào bạn, " . $_SESSION['username'];
echo "<a href='logout.php'>Đăng xuất</a>";
?>
