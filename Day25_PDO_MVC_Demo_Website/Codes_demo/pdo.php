<?php
//pdo.php
// Kết nối CSDL MySQL từ PHP sử dụng thư viện PDO
// - PDO - PHP Data Object: là thư viện của PHP hỗ trợ kết nối CSDL
// - PDO hỗ trợ kết nối tới nhiều CSDL, còn mysqli chỉ hỗ trợ 1
//CSDL duy nhất là MySQL
// - PDO áp dụng hoàn toàn của OOP, còn mysqli sử dụng đc cả PHP thuần
// và OOP
// - Đa số các website đều ưu tiên dùng PDO để kết nối CSDL
// + Code truy vấn:
// Tạo 1 CSDL: php1222e_pdo
// Tạo 1 bảng products: id, name, price, created_at
// - Khởi tạo kết nối:
// Chuỗi bắt buộc Data Source Name:
const DB_DSN = 'mysql:host=localhost;dbname=php1222e_pdo;port=3306';
// Username
const DB_USERNAME = 'root';
// Password
const DB_PASSWORD = '';

try {
	$connection = new PDO(DB_DSN,DB_USERNAME,
		DB_PASSWORD);
} catch (PDOException $e) {
	die('Lỗi kết nối: ' . $e->getMessage());
}
echo "Kết nối CSDL theo PDO thành công";

// - Truy vấn INSERT
// + B1: Viết truy vấn kết hợp tránh lỗi bảo mật SQL Injection
// Sử dụng câu truy vấn dạng tham số/param
// products: id, name, price, created_at
$sql_insert = "INSERT INTO products(name,price) 
VALUES(:name,:price)";
// + B2: Cbi obj truy vấn:
$obj_insert = $connection->prepare($sql_insert);
// + B3: [Tùy chọn] Tạo mảng để truyền giá trị thật cho tham số trong
//câu truy vấn, chỉ có nếu câu truy vấn có tham số
$inserts = [
	':name' => 'Tivi Sony',
	':price' => 123
];
// + B4: Thực thi đối tượng truy vấn:
$is_insert = $obj_insert->execute($inserts);
var_dump($is_insert);
// - Truy vấn UPDATE:
// Cập nhật name = abc, price = 111 với sp có id = 1
// + B1: Viết truy vấn dạng tham số:
$sql_update = "UPDATE products SET name=:name,price=:price
WHERE id=:id";
// + B2: Cbi obj truy vấn:
$obj_update = $connection->prepare($sql_update);
// + B3: Tạo mảng truyền giá trị vào câu truy vấn:
$updates = [
	':name' => 'abc',
	':price' => 111,
	':id' => 1
];
// + B4: Thực thi obj truy vấn
$is_update = $obj_update->execute($updates);
var_dump($is_update);
// - Truy vấn DELETE:
// Xóa các sản phẩm có id > 5
// + B1: Viết truy vấn dạng tham số:
$sql_delete = "DELETE FROM products WHERE id > :id";
// + B2: Cbi obj truy vấn:
$obj_delete = $connection->prepare($sql_delete);
// + B3: Tạo mảng:
$deletes = [
	':id' => 5
];
// + B4: Thực thi
$is_delete = $obj_delete->execute($deletes);
var_dump($is_delete);
// - Truy vấn SELECT
// + SELECT nhiều bản ghi: Lấy tất cả sản phẩm theo thứ tự mới nhất
// -> cũ nhất
// B1: Viết truy vấn dạng tham số:
$sql_select_all = "SELECT * FROM products ORDER BY created_at DESC";
// B2: Cbi obj truy vấn:
$obj_select_all = $connection->prepare($sql_select_all);
// B3: Bỏ qua vì câu truy vấn ko có tham số nào
// B4: Thực thi: với SELECT thì
// ko cần thao tác với kết quả trả về sau khi thực thi
$obj_select_all->execute();
// B5: Trả về mảng kết hợp 2 chiều
$products = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';

// + SELECT 1 bản ghi: lấy sp có id = 1
// B1: Viết truy vấn dạng tham số
$sql_select_one = "SELECT * FROM products WHERE id = :id";
// B2: Cbi:
$obj_select_one = $connection->prepare($sql_select_one);
// B3: Tạo mảng:
$selects = [
	':id' => 1
];
// B4: Thực thi
$obj_select_one->execute($selects);
// B5: Trả về mảng kết hợp 1 chiều
$product = $obj_select_one->fetch(PDO::FETCH_ASSOC);
echo '<pre>';
print_r($product);
echo '</pre>';
