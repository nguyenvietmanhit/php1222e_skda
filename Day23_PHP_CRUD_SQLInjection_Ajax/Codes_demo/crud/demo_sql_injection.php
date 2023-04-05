<?php
//crud/demo_sql_injection.php
// Demo lỗi bảo mật SQL Injection liên quan đến câu truy vấn
//SQL
// - Tấn công vào hệ thống thông qua form, thay đổi câu SQL theo
//mục đích của nó
// Demo chức năng tìm kiếm sản phẩm theo tên sp
// Chức năng tìm kiến nên để dạng GET để giữ đc tham số search trên
//url, tiện cho copy link
// XỬ LÝ FORM
require_once 'connection.php';
if (isset($_GET['submit'])) {
    $name = $_GET['name'];
    // - Chống lỗi bảo mật này bằng cách lọc dữ liệu từ form bằng hàm
    //sau :
    $name = mysqli_real_escape_string($connection, $name);
    // Truy vấn tìm kiếm:
    // B1: Viết truy vấn:
    // 123456' OR name != '
    $sql_select_all = "SELECT * FROM products WHERE name LIKE '%$name%' ";
    var_dump($sql_select_all);
    // B2: Thực thi
    $obj_result_all = mysqli_query($connection, $sql_select_all);
    // B3: Trả về mảng kết hợp 2 chiều:
    $products = mysqli_fetch_all($obj_result_all, MYSQLI_ASSOC);
    echo '<pre>';
    print_r($products);
    echo '</pre>';
}
?>
<h2>Form tìm kiếm</h2>
<form action="" method="get">
	Nhập tên sp
	<input type="text" name="name" value="">
	<input type="submit" name="submit" value="Tìm kiếm">
</form>
