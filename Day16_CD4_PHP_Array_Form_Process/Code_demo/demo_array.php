<?php
//demo_array.php
echo 'Hello array';
// - Mảng là gì?
// + Là 1 kiểu dữ liệu có thể lưu đc nhiều giá trị tại 1 thời
//điểm, các giá trị này có thể là bất cứ kiểu dữ liệu nào
// - Cú pháp khai báo mảng:
// Từ khóa array
$names = array(1, 2, 3, 4); // dùng cho mọi version PHP
// []
$names = [1, 2, 3, 4]; // >= 5.4 -> ưu tiên dùng
// - Bài toán dùng kiểu mảng
// Khai báo tên của 500 ae, sau đó hiển thị 500 tên này ra
// Tạo 500 biến, echo 500 biến
$name1 = 'a';
$name2 = 'b';
$name3 = 'c';
echo $name1;
echo $name2;
echo $name3;
// Tạo 1 mảng có 500 phần tử
// -> kiểu mảng giúp xử lý dữ liệu dễ dàng hơn so với biến
//thông thường
// - Các thuật ngữ liên quan đến mảng:
// + Element/phần tử mảng: một mảng chứa 1 hoặc nhiều phần tử
//mảng
// + Key/Index: giá trị để xác định ra phần tử mảng
// + Value: giá trị của phần tử mảng tương ứng với key
$names = ['PHP', 'CSS', 'JS', 'HTML'];
// MẢng có 4 phần tử
$c = count($names);
var_dump($c); //4
// Phần tử đầu tiên: key = 0, value = PHP
// Phần tử đầu 3: key = 2, value = JS
var_dump($names);
// Debug mảng bằng cách sau:
echo '<pre>';
print_r($names);
echo '</pre>';
// - Xử lý mảng theo kiểu thủ công:
$names = ['PHP', 'CSS', 'JS', 'HTML'];
// Lấy giá trị phần tử mảng theo kiểu thủ công:
// Nguyên tắc: để lấy đc giá trị của 1 phần tử mảng, bắt
//buộc phải biết key của phần tử đó
echo $names[0]; //PHP
echo $names[2]; //JS
// echo $names[4]; //báo lỗi ko tìm thấy key
// Xử lý mảng sử dụng vòng lặp: for while do..while
$c = count($names); //4
for ($key = 0; $key < $c; $key++) {
	echo $names[$key];
}
// For while do...while chưa phải là cách tối ưu nhất để
//lặp mảng vì tốn nhiều bước và chỉ áp dụng cho mảng đơn
//giản (mảng tuần tự, mảng có key là số tăng dần)

// - Vòng lặp foreach
// + Chuyên dùng để lặp mảng
$names = ['PHP', 'CSS', 'JS', 'HTML'];
// Dạng đầy đủ
foreach ($names AS $key => $value) {
	echo "<br> Key: $key, value: $value";
}
foreach ($names AS $k => $v) {
	echo "<br> Key: $k, value: $v";
}
// Dạng khuyết key:
$names = ['PHP', 'CSS', 'JS', 'HTML'];
foreach ($names AS $v) {
	echo "<br> Value: $v";
}
// - Thẻ viết tắt foreach khi hiển thị mã HTML phức tạp
$names = ['PHP', 'CSS', 'JS', 'HTML'];
echo '<table border="1" cellspacing="0">';
foreach ($names AS $language) {
	echo "<tr>";
	echo "<td>$language</td>";
	echo "</tr>";
}
echo '</table>';
?>

<table border="1" cellspacing="0" cellpadding="8">
	<?php foreach($names AS $language): ?>
		<tr>
			<td><?php echo $language; ?></td>
		</tr>
	<?php endforeach; ?>
</table>

<?php
// - Phân loại mảng:
// + Mảng tuần tự: key là số nguyên
$ages = [1, 5, 7, 9, 100];
echo '<pre>';
print_r($ages);
echo '</pre>';
// + Mảng kết hợp: key xuất hiện ở dạng chuỗi
$infos = [
    'fullname' => 'manhnv',
    'age' => 33,
    'address' => 'HN'
];
foreach ($infos AS $key => $value) {
    echo "<br>Key: $key, Value: $value";
}
echo '<pre>';
print_r($infos);
echo '</pre>';
// + Mảng đa chiều: mảng trong mảng
$infos = [
    'name' => 'PHP1222E',
    'info' => [
        'amount' => 30,
        'address' => 'VN'
    ]
];
// Xử lý mảng đa chiều phức tạp hơn
foreach ($infos AS $key => $value) {
//    echo "<br>Key: $key, Value: $value";
}
echo $infos['info']['amount'];
?>
