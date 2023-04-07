<?php
//crud/update.php
// Xóa sản phẩm
session_start();
require_once 'connection.php';
//crud/update.php?id=5
// - Validate tham số trên url trc khi xử lý xóa:
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
	$_SESSION['error'] = 'Tham số Id ko hợp lệ';
	header('Location: index.php');
	exit;
}
// - Lấy sp dựa theo id từ url để đổ ra form cập nhật:
$id = $_GET['id'];
// Truy vấn lấy sp theo id:
// B1: Viết truy vấn:
$sql_select_one = "SELECT * FROM products WHERE id = $id";
// B2: Thực thi:
$obj_result_one = mysqli_query($connection, $sql_select_one);
// B3: Lấy ra mảng kết hợp 1 chiều:
$product = mysqli_fetch_assoc($obj_result_one);
//echo '<pre>';
//print_r($product);
//echo '</pre>';

// - XỬ LÝ FORM
// B1: Debug
echo '<pre>';
print_r($_POST);
echo '</pre>';
// B2: Khai báo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// B3: Xử lý form chỉ khi user submit form:
if (isset($_POST['submit'])) {
	// B4: Lấy giá trị từ form:
	$name = $_POST['name'];
	$price = $_POST['price'];
	// B5: Validate:
	// - Tên và giá ko đc để trống: empty
	// - Giá phải là số: is_numeric
	if (empty($name) || empty($price)) {
		$error = 'Tên và giá ko đc để trống';
	} else if (!is_numeric($price)) {
		$error = 'Giá phải là số';
	}
	// B6: Xử lý logic chính chỉ khi ko có lỗi nào xảy ra:
	if (empty($error)) {
		// Truy vấn Cập nhật dữ liệu
        // B1: Viết truy vấn:
        $sql_update = "UPDATE products SET name='$name', price=$price
        WHERE id=$id";
        // B2: Thực thi truy vấn:
        $is_update = mysqli_query($connection, $sql_update);
        var_dump($is_update);
        if ($is_update) {
            $_SESSION['success'] = 'Cập nhật thành công';
            header('Location: index.php');
            exit();
        }
        $error = 'Cập nhật thất bại';
	}
}
// B7: Hiển thị error ra form:
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h2>Form cập nhật sp</h2>
<form action="" method="post">
	Tên sp:
	<input type="text" name="name"
           value="<?php echo $product['name']; ?>">
	<br>
	Giá sp:
	<input type="text" name="price"
           value="<?php echo $product['price']; ?>">
	<br>
	<input type="submit" name="submit" value="Cập nhật sp">
	<a href="index.php">Về trang danh sách sp</a>
</form>

