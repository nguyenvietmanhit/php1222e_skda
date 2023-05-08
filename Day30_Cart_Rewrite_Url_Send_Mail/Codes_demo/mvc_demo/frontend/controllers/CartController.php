<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller
{
	public function add() {
		// Lấy id từ ajax gửi lên
		$id = $_GET['id'];
		$product_model = new Product();
		$product = $product_model->getById($id);
		$product_cart = [
			'name' => $product['title'],
			'price' => $product['price'],
			'avatar' => $product['avatar'],
			'quantity' => 1 //số lượng sp sẽ thêm vào giỏ
		];
		// Nếu giỏ hàng chưa tồn tại, thì khởi tạo giỏ hàng và
		//thêm sp đầu tiên vào giỏ
		if (!isset($_SESSION['cart'])) {
//			$_SESSION['cart'] = [
//				$id => $product_cart
//			];
			$_SESSION['cart'][$id] = $product_cart;
		} else {
			// Có 2 trường hợp:
			// + Sp thêm đã tồn tại: update quantity
			if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id]['quantity']++;
			} else {
				$_SESSION['cart'][$id] = $product_cart;
			}
			// + Sp thêm chưa tồn tại: thêm mới
		}
	}

	public function index() {
		$this->page_title = 'Giỏ hàng của bạn';
		$this->content = $this->render('views/carts/index.php');
		require_once 'views/layouts/main.php';
	}

	public function delete() {
		$id = $_GET['id'];
		unset($_SESSION['cart'][$id]);
		$_SESSION['success'] = 'Xóa sp khỏi giỏ thành công';
		header('Location:gio-hang-cua-ban.html');
		exit();
		// THam khảo tính năng gửi mail với thư viện PHPMailer
		//, cần tạo mật khẩu ứng dụng Gmail để có username và
		//password cần thiết cho việc gửi mail

	}
}
