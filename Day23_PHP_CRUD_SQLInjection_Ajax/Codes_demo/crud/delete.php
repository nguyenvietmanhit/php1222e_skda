<?php
//crud/delete.php
// Chức năng xóa
session_start();
require_once 'connection.php';
// crud/delete.php?id=3
// crud/delete.php?id=dsadsadsa
// crud/delete.php
// - Validate tham số trên url trc khi xử lý xóa:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	$_SESSION['error'] = 'Tham số Id ko hợp lệ';
	header('Location: index.php');
	exit;
}
$id = $_GET['id'];
// Truy vấn Xóa dữ liệu:
// + B1: Viết truy vấn:
$sql_delete = "DELETE FROM products WHERE id = $id";
// + B2: Thực thi:
$is_delete = mysqli_query($connection, $sql_delete);
var_dump($is_delete);
if ($is_delete) {
	$_SESSION['success'] = 'Xóa thành công';
} else {
	$_SESSION['error'] = 'Xóa thất bại';
}
header('Location: index.php');
exit();
?>
