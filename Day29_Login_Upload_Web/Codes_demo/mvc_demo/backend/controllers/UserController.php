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

	// index.php?controller=user&action=login
	public function login() {
		// - Controller xử lý submit form
		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			//Validate ...
			if (empty($this->error)) {
				// Dựa vào thuật toán mã hóa của mật khẩu khi đăng ký
				//user để xử lý đăng nhập tương ứng
				// - Tìm trong bảng users xem có tồn tại user nào với
				//username từ form hay ko
				$user_model = new User();
				$user = $user_model->getUserByUsername($username);
				if (empty($user)) {
					$this->error = 'Username ko tồn tại';
				} else {
					$password_hash = $user['password'];
					$is_login = password_verify($password, $password_hash);
					var_dump($is_login);
					if ($is_login) {
						$_SESSION['user'] = $user;
						// Chuyển hướng về trang quản trị
					} else {
						$this->error = 'Sai tài khoản/mk';
					}
				}
				// - Nếu tìm thấy, thì sẽ lấy đc mật khẩu mã hóa, sẽ
				// so khớp với mật khẩu gửi từ form
			}
		}

		// - Controller gọi view
		$this->page_title = 'Form đăng nhập';
		$this->content = $this->render('views/users/login.php');
		require_once 'views/layouts/main_user.php';
	}
}
