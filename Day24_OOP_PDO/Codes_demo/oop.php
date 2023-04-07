<?php
//oop.php
// Lập trình hướng đối tượng
// - OOP - Object Oriented Programming
// - Là 1 phương pháp lập trình hướng đến sự tương tác giữa các đối
//tượng
// - Phần lớn website hiện này đều xây dựng dựa trên OOP
// - OOP khó vì:
// + Có nhiều thuật ngữ mới
// + Thay đổi hoàn toàn tư duy code
// VD: dựng website bán hàng:
// Lập trình cấu trúc chia thành các hàm login, register, listProduct..
// Với OOP: xác định các đối tượng trước: user, product
// 2 - Các thuật ngữ cơ bản trong OOP:
// - Lớp
// LÀ kiểu dữ liệu đặc biệt trong OOP, là 1 khuôn mẫu cho các obj
//sinh ra từ nó
// Quy tắc: Tên class viết hoa ký tự đầu tiên của từng từ, nếu
// 1 file .php mà chỉ có duy nhất 1 class thi tên file trùng tên class
class Person1 {

}

class InfoOfMe {

}
// - Đối tượng/Object: là thực thể cụ thể đc sinh ra từ 1 class
// -> class-object luôn đi đôi với nhau
$obj1 = new Person1();
var_dump($obj1);
$obj2 = new Person1();
// - Thuộc tính của lớp: khai báo bên trong class, có quyền truy cập
//, cần dựa vào obj tương ứng để lấy ra các đặc điểm của nó -> chuyển
// thành các thuộc tính
// Phân tích đối tượng user: tên, tuổi, địa chỉ
class User1 {
	public $fullname;
	public $age;
	public $address;
}
$obj1 = new User1();
// Cú pháp obj truy cập thuộc tính: ->
$obj1->fullname = 'manhnv';
$obj1->age = 33;
$obj1->address = 'HN';
var_dump($obj1);

$obj2 = new User1();
$obj2->fullname = 'a';
$obj2->age = 11;
$obj2->address = 'NĐ';
// - Phương thức của lớp: là các hàm đc khai báo bên trong class,
// có phạm vi truy cập
// Dựa vào obj cụ thể để xác định ra các hành vi -> chuyển thành
//phương thức trong class
// VD: từ obj user -> thêm user, sửa user, xóa user, liệt kê user
class User2 {
	public function addUser() {
		echo 'Thêm user';
	}
	public function editUser($id) {
		echo "Sửa user $id";
	}
	public function deleteUser($id) {
		echo "Xóa user $id";
	}
	public function index() {
		echo 'Liệt kê user';
	}
}
$obj1 = new User2();
// Obj truy cập phương thức ->
$obj1->addUser(); //Thêm user
$obj1->editUser(3); //Sửa user 3
// - Phương thức khởi tạo: là phương thức tự động chạy ngay khi có
// 1 obj sinh ra từ class đó
class User3 {
	public function __construct() {
		echo 'Tự động chạy';
	}
	public function show() {
		echo 'show';
	}
}
$obj = new User3(); //Tự động chạy
// - Từ khóa this: sử dụng bên trong class,
// tham chiếu đến chính class hiện tại
class User4 {
	public $fullname;
	public $age;

	public function showInfo() {
		echo "Tên: " . $this->fullname;
		echo "Tuổi: " . $this->age;
	}
}
// - Phạm vi truy cập:
// Là từ khóa đặt trc tên TT/PT, quy định quyền truy cập cho TT/PT
// Có 3 phạm vi truy cập: private, protected, public
// + private: chỉ truy cập đc bên trong class, bên ngoài sẽ ko thấy
class User5 {
	public $fullname;
	private $age;
	public function showInfo() {
		echo $this->age; // ko lỗi
	}
}
$obj = new User5();
// $obj->age = 33; // báo lỗi
// + protected: truy cập đc bên trong class và class kế thừa từ class
//đó -> liên quan đến tính kế thừa của OOP, bên ngoài class ko truy cập
//đc
class User6 {
	protected $fullname1;
	public function show() {
		echo $this->fullname1;
	}
}
class User7 extends User6 {
	public function test() {
		echo $this->fullname1; //ko lỗi
	}
}
$obj = new User6();
// $obj->fullname1 = 'abc'; //lỗi
// + public: truy cập đc từ mọi nơi






