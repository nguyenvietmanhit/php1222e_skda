<!--C:/xampp/htdocs/php1222e_demo/basic.php-->
<?php
// http://localhost/php1222e_demo/basic.php
// http://localhost/a/b/c/d/e/f/g/h/basic.php
// Sử dụng tính năng chạy tắt của PHP để chạy đường
//dẫn, bắt buộc phải mở dùng PHPStorm mở thư mục gốc
//(nằm ngay dưới htdocs) đang chứa file .php hiện tại
// C:/xampp/htdocs/fol1/abc/def/test.php
// FTP: 21, SSH: 22
//echo 'PHP';

// 1 - Biến
// + Cú pháp:
$name = 'manhnv';
$age = 32;
$number_of_year = 2023; //snake
$numberOfYear = 2023; //camel
// chuẩn PSR
echo $age; //32
// 2 - Kiểu dữ liệu:
// + integer: số nguyên, -2 tỷ -> 2 tỷ
$number = 1;
$number1 = -123;
// Hàm debug PHP
var_dump($number);
// + float/double: số thực hoặc số nguyên ngoài phạm vi
// -2 tỉ -> 2 tỉ
$number2 = 1.23;
var_dump($number2);
// + string: kiểu chuỗi
$str1 = 'String 1';
$str2 = "String 2";
$str3 = "Chào bạn, 'manhnv' ";
echo $str3;
echo $str1 . $str2; //nối chuỗi
echo "<br>";
$name = 'manhnv';
// Dấu nháy kép hiểu đc biến bên trong, ngược lại
//nháy đơn thì ko
echo "Chào bạn, $name";
//echo "Chào bạn, " . $name;
echo 'Chào bạn, $name';
var_dump($name);
// + boolean: chỉ có 2 giá trị duy nhất true và false
$is_female = True;
$is_boy = false;
var_dump($is_boy);
// + null: kiểu đặc biệt, 1 obj ko tồn tại
$test = null;
// + array: kiểu mảng, lưu trữ nhiều giá trị tại 1 thời
//điểm
// Mọi version PHP
$names = array(12, 'abc', true, null, array());
// 5.4++ -> ưu tiên
$names = [12, 'abc', true, null, []];
var_dump($names);
// + object: đối tượng, học ở phần OOP
?>
