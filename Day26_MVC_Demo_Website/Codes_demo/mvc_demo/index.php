<!--mvc_demo/index.php
-- Xóa XAMPP thì backup lại thư mục htdocs và mysql/data
- Tạo ứng dụng CRUD danh mục dựa trên mô hình MVC
1 - Tạo CSDL: php1222e_mvc
2 - Bảng categories: id, name, avatar, created_at
avatar: lưu tên file của ảnh sp
- Code trong thư mục mvc_demo của ngày 26
-->
<?php
// - Đây là file quan trọng nhất của MVC
// - File index gốc của ứng dụng của MVC, mọi request từ trình duyệt
//gửi lên đều phải chạy qua file này đầu tiên
// - Khi chạy 1 ứng dụng MVC, luôn luôn phải tìm file index gốc này
//để chạy
// - Chức năng: nhận request/url từ trình duyệt, phân tích request,
//sau đó gọi Controller tương ứng xử lý
// - Một số chuẩn với mô hình MVC hiện tại
// + Url bắt buộc phải có dạng sau: vd thêm mới danh mục
// index.php?controller=category&action=create
// Sửa sp có id = 7
// index.php?controller=product&action=update&id=7
// + Tên file controller bắt buộc phải có dạng sau:
// CategoryControlller.php, ProductController.php, UserController.php
// + Tên file model bắt buộc phải có dạng sau:
// Category.php, Product.php, User.php
session_start();
// - Set múi giờ về Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');
// - Phân tích url: demo với chức năng thêm mới danh mục
// index.php?controller=category&action=create
//
// Lấy ra controller và action từ url:
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'test';
//var_dump($controller);
//var_dump($action);
// - Biến đổi controller thành tên file controller tương ứng
// category -> CategoryController
$controller = ucfirst($controller); //Category
//var_dump($controller);
$controller .= "Controller";
//var_dump($controller); // CategoryController
// - Tạo biến lưu lại đường dẫn tương đối đến file controller sẽ gọi
// Quy tắc khi nhúng file trong mô hình MVC: luôn luôn phải
// đứng từ file index gốc để nhúng file
$path_controller = "controllers/$controller.php";
var_dump($path_controller); //controllers/CategoryController.php
// - Nếu đường dẫn ko tồn tại thì báo lỗi:
if (!file_exists($path_controller)) {
    die('Trang bạn tìm không tồn tại');
}
// - Nhúng file:
require_once $path_controller;
// - Khởi tạo đối tượng từ class controller của file controller vừa
//nhúng
$obj = new $controller(); //$obj = new CategoryController()
// - Ktra nếu ko tồn tại phương thức trong class thì báo lỗi:
if (!method_exists($obj, $action)) {
    die("Phương thức $action ko tồn tại trong class $controller");
}
// Gọi phương thức để thực thi chức năng
$obj->$action();

?>
