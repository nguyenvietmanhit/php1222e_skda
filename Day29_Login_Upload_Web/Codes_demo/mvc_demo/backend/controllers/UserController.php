<?php
//backend/controllers/UserController.php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
class UserController extends Controller {
	// index.php?controller=user&action=register
	public function register() {
		// - Controller xử lý submit form
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			if (empty($this->error)) {
				// Mã hóa mật khẩu trc khi lưu, thuật toán bcrypt
				$password_hash = password_hash($password, PASSWORD_BCRYPT);
				// - Controller gọi Model để lưu
				$user_model = new User();
				$is_register = $user_model->registerUser($username, $password_hash);
				var_dump($is_register);
				if ($is_register) {
					$_SESSION['success'] = 'Đăng ký thành công';
					header('Location:index.php?controller=user&action=login');
					exit();
				}
			}
		}

		// - Controller gọi View
		$this->page_title = 'Form đăng ký';
		$this->content =  $this->render('views/users/register.php');
//		require_once 'views/layouts/main.php';
		// Sử dụng layout khác cho form đăng ký
		require_once 'views/layouts/main_user.php';
	}
}
