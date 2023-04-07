<?php
// cac_phuong_phap_lap_trinh.php
// Các phương pháp lập trình
// VD: tính tổng 2 số và hiển thị kết quả
// - Lập trình tuyến tính: nghĩ gì code nấy
$number1 = 5;
$number2 = 2;
$sum = $number1 + $number2;
echo $sum;
// - Lập trình có cấu trúc/thủ tục: biết phân tích thành các hàm
function sum1($num1, $num2) {
	$sum = $num1 + $num2;
	return $sum;
}
echo sum1(1, 2);
echo sum1(3, 2);
// - Lập trình hướng đối tượng
class Calculator {
	public $number1;
	public $number2;

	public function sum() {
		$sum = $this->number1 + $this->number2;
		return $sum;
	}
}
$c = new Calculator();
$c->number1 = 3;
$c->number2 = 5;
echo $c->sum(); //8
