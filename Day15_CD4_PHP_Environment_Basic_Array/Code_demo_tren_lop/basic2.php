<?php
//C://xampp/htdocs/basic2.php
// http://localhost/basic2.php
echo 'PHP test';
// 1 - Kiểu dữ liệu: integer, float/double, boolean, string, null,
// array, object
// 2 - Ép kiểu dữ liệu: sử dụng tên kiểu dữ liệu trc giá trị cần ép
//$number = 5;
//if ($number) {
//	echo 'test';
//}
$test = 11.5; //float
$test1 = (integer) $test; //11
var_dump($test1);
$test2 = (boolean) $test; // true
// Các giá trị khác chuỗi rỗng, null, số 0 thì ép về true, ngược lại
//là false
var_dump($test2);
$test3 = (string) $test; //11.5
var_dump($test3);
// 3 - Hằng:
define('PI', 3.14);
echo PI; //3.14
const MAX_AGE = 100; //nên dùng cách này để khai báo hằng
//MAX_AGE = 12;
// Một số hằng có sẵn trong PHP:
echo '<br>';
echo __LINE__;
echo '<br>';
echo __FILE__; //đường đẫn tuyệt đối/vật lý
echo '<br>';
echo __DIR__;
// 4 - Hàm
function sum($number1, $number2) {
	$sum = $number1 + $number2;
	return $sum;
}
$result1 = sum(1, 2);
echo $result1; //3
// 5 - Truyền biến dạng tham trị và tham chiếu vào hàm:
$number = 3;
echo "Ban đầu biến number = $number"; // 3

function changeNumber($num) {
	$num = 1;
	echo "Trong hàm, biến = $num"; //1
}
changeNumber($number);
echo "Sau khi gọi hàm, biến = $number";
// -> truyền tham trị

$number = 3;
echo "Ban đầu biến number = $number"; // 3

function changeNumber1(&$num) {
	$num = 1;
	echo "Trong hàm, biến = $num"; //1
}
changeNumber1($number);
echo "Sau khi gọi hàm, biến = $number";
// - Truyền tham trị: lấy bản sao của biến gốc truyền vào hàm, bên
//trong hàm thao tác với bản sao
// - Truyền tham chiếu: lấy bản gốc truyền vào hàm, bên trong hàm
//thao tác chính bản gốc
//
// 6 - Toán tử:
// - Toán tử số học: + - * / % ++ --
// - Toán tử logic: && || !
// - Toán tử so sánh: > >= < <= !=
// - Toán tử gán: = += -= *= /= %=
// 7 - Câu lệnh điều kiện: if else elseif switch case
$number = -2;
if ($number) {
	echo 'Number > 0';
} else {
	echo 'Number <= 0';
}
//Switch case
$day = 3;
switch ($day) {
	case 2: echo 'Thứ hai';break;
	case 3: echo 'Thứ ba';break;
	case 4: echo 'Thứ tư';
}
// Toán tử điều kiện: ? :
$test = 5 > 0 ? 'đúng' : 'sai';
// Hiển thị logic HTML phức tạp theo 1 điều kiện:
$number = 5;
if ($number > 0) {
	echo '<table>';
	echo '<tr>';
	echo '<td>1</td>';
	echo '<td>2</td>';
	echo '<td>3</td>';
	echo '<td>4</td>';
	echo '</tr>';
	echo '</table>';
}
// Sử dụng thẻ viết tắt để tách biệt code PHP và HTML
?>

<?php if($number > 0): ?>
    <table border="1" cellspacing="0" cellpadding="8">
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
        </tr>
    </table>
<?php endif; ?>

<?php if (5 > 0): ?>
<?php elseif (4 > 0): ?>
<?php elseif (3 > 0): ?>
<?php else: ?>
<?php endif; ?>

<?php
// 7 - Vòng lặp
// for while do...while
// 8 - Từ khóa break - continue
// Sử dụng bên trong vòng lặp
for ($i = 1; $i <= 10; $i++) {
	if ($i == 9 || $i <= 3) {
		continue;
	}
    echo $i;

}
//4567810
?>
