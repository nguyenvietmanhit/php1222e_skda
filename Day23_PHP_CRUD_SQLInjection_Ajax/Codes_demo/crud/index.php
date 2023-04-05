<!--crud /-->
<!--     /index.php : liệt kê sp-->
<!--     /update.php: cập nhật sp-->
<!--     /create.php: tạo mới sp-->
<!--     /delete.php: xóa sp-->
<!--     /connection.php: file kết nối CSDL dùng chung cho CRUD-->
<!--Xây dựng CRUD sản phẩm:-->
<!--- Create - Read - Update - Delete, là 4 chức năng nền tảng-->
<!--cho bất cứ 1 chức năng thực tế nào của 1 Website-->
<!--- Nên thành thạo để có hiểu đc cơ bản 1 ngôn ngữ lập trình và-->
<!--cách mà ngôn ngữ lập trình đó tương tác với CSDL-->

<!--crud/index.php
Trang Liệt kê sản phẩm
-->
<?php
// Lấy dữ liệu từ db đổ ra bảng
session_start();
require_once 'connection.php';
// B1: Viết truy vấn: lấy nhiều sp
$sql_select_all = "SELECT * FROM products";
// B2: Thực thi truy vấn: SELECT trả về obj trung gian
$obj_result_all = mysqli_query($connection, $sql_select_all);
// B3: Trả về mảng kết hợp 2 chiều:
$products = mysqli_fetch_all($obj_result_all, MYSQLI_ASSOC);
//echo '<pre>';
//print_r($products);
//echo '</pre>';
?>
<h2>Trang liệt kê sản phẩm</h2>
<a href="create.php">Thêm mới sp</a>
<?php
// Hiển thị session thông báo dạng flash
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
	echo $_SESSION['error'];
	unset($_SESSION['error']);
}
?>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <?php foreach($products AS $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo number_format($product['price'])?> vnđ</td>
            <td>
<!--                Y-m-d H:i:s -->
<?php echo date('d/m/Y H:i:s', strtotime($product['created_at'])); ?>
<!--                03/04/2023 19:03:12-->
            </td>
            <td>
                <a href="update.php?id=<?php echo $product['id'] ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $product['id'] ?>" onclick="return confirm('Xóa?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

