<?php
// demo_function.php
// 1 - Một số function xử lý mảng cơ bản:
// + Tính tổng các giá trị phần tử mảng:
$arrs = [1, 2, 3, 4];
$sum = 0;
foreach ($arrs AS $value) {
	$sum += $value;
}
echo $sum;
// Ctrl Q để show mô tả hàm
echo array_sum($arrs);

// + Ktra phần tử mảng có tồn tại theo key hay ko
$names = ['a', 'b', 'c'];
$check = isset($names[4]); //false
// - Tham khảo các slide trong buổi học để tự tìm hiểu các hàm
//còn lại
