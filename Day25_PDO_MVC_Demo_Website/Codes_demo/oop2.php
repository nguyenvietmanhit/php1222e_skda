<?php
//oop2.php
// Tiếp tục OOP từ buổi trước
// - Hằng số trong class
class User1 {
	const AGE = 32;
}
// Cú pháp truy cập hằng số
echo User1::AGE; //32
// - Từ khóa static
// Là từ khóa đứng sau phạm vi truy cập và trước tên TT/PT
class User2 {
	public static $fullname;

	public static function showInfo() {
		echo 'showInfo';
	}
}
// Từ khóa static sau khi đc khởi tạo thì sẽ tồn tại cho đến khi
//ứng dụng chạy xong
// - Ko cần khởi tạo đối tượng, mà gọi trực tiếp luôn
echo User2::$fullname = 'abc';
User2::showInfo(); //showInfo
// - Từ khóa extends: thể hiện tính kế thừa
// Class con kế thừa/sử dụng lại đc tất cả TT/PT của class cha ở 2
//phạm vi truy cập protected/public
class Person {
	public $fullname;
	public $age;
	public $address;
}
class Student extends Person {

}
$student = new Student();
$student->fullname = 'abc';
echo $student->fullname;
// - Từ khóa abstract: sử dụng cho class để làm cho class thành
//trừu tượng, class abstract sẽ chứa 1 phương thức abstract, phương
//thức này ko có body
abstract class User3 {
	public $fullname;
	public function showInfo() {
		echo 'showInfo';
	}
	abstract public function test();
}
// Class abstract chỉ dùng để cho việc thừa kế, tạo ra các chức năng
//mẫu để các class con sẽ cụ thể hóa chức năng đó theo ý của class con
class User4 extends User3 {
	// Class con phải cụ thể hóa hàm trừu tượng của class cha
	public function test() {
		echo 'Hàm test của class User4';
	}
}
class User5 extends User3 {
	// Class con phải cụ thể hóa hàm trừu tượng của class cha
	public function test() {
		echo 'Hàm test User5';
	}
}
// Trừu tượng đc dùng trên phạm vi thiết kế hệ thống
// - Từ khóa implements: thực thi các interface
// Interface là 1 bộ khung chứa các chức năng chuẩn để các class con
//bắt buộc phải thực thi theo
// Interface ko thể khai báo thuộc tính, chỉ cho phép khai báo các
//PT public ko có body
interface Config {
	public function sendMail();
	public function receiveMail();
}
class User6 implements Config {
	public function sendMail() {
		echo 'SendMail class User6';
	}
	public function receiveMail() {
		echo 'receiveMail class User6';
	}
}
// interface giống abstract là đều dùng khi thiết kế hệ thống
// - 4 tính chất của OOP (câu hỏi phỏng vấn)
// + Tính đóng gói: là các phạm vi truy cập, dùng che giấu thông tin
// + Tính kế thừa: extends, cho phép class con tận dụng các TT/PT
//của class cha
// + Tính trừu tượng: abstract, trừu tượng hóa 1 obj để định nghĩa
//các chuẩn chung -> thiết kế hệ thống
// + Tính đa hình: interface, một phương thức có thể có nhiều thể
//hiện khác nhau
