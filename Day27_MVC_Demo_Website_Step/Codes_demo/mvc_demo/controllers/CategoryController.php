<!--controllers/CategoryController.php-->
<?php
// namespace
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
class CategoryController extends Controller {

    //index.php?controller=category&action=create
    public function create() {
        // - Controller xử lý submit form:
        echo '<pre>';
        print_r($_POST);
        print_r($_FILES);
        echo '</pre>';
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $avatars = $_FILES['avatar'];
            if (empty($name)) {
                $this->error = 'Tên phải nhập';
            } elseif ($avatars['error'] == 0) {
                // File phải là ảnh
                $ext = pathinfo($avatars['name'], PATHINFO_EXTENSION);
                $ext = strtolower($ext);
                $allowed = ['png', 'jpg', 'jpeg', 'gif'];
                if (!in_array($ext, $allowed)) {
                    $this->error = 'File upload phải là ảnh';
                }
                // Dung lương ko đc vượt quá 2Mb
                $size_b = $avatars['size'];
                // 1MB = 1024KB = 1024 * 1024B;
                $size_mb = $size_b / 1024 / 1024;
                if ($size_mb > 2) {
                    $this->error = 'Dung lương ko đc vượt quá 2Mb';
                }
            }
            // Lưu vào bảng chỉ khi hệ thống ko có lỗi nào xảy ra
            if (empty($this->error)) {
                // - Xử lý upload file lên để lấy tên file sẽ lưu vào db
                $filename = '';
                if ($avatars['error'] == 0) {
                    $dir_upload = 'uploads';
                    if (!file_exists($dir_upload)) {
                        mkdir($dir_upload);
                    }
                    $filename = time() . '-' . $avatars['name'];
                    $is_upload = move_uploaded_file($avatars['tmp_name'],
                    "$dir_upload/$filename");
                    var_dump($is_upload);
                }
                // Controller gọi Model để nhờ Model truy vấn CSDL
                $category_model = new Category();
                $is_insert = $category_model->insertData($name, $filename);
                var_dump($is_insert);
                if ($is_insert) {
                    $_SESSION['success'] = 'Thêm mới thành công';
                    header('Location:index.php?controller=category&action=index');
                    exit();
                }
                $this->error = 'Thêm mới thất bại';
            }
        }

//        echo 'Chức năng thêm mới danh mục';
        // - Controller gọi View để hiển thị
        // Gán các giá trị tương ứng cho thuộc tính của class cha
        $this->page_title = 'Form thêm mới danh mục';
        $this->content = $this->render('views/categories/create.php');
        // Gọi layout để hiển thị view: layout động trong MVC, là layout
        //mà có thành phần chung như header, footer ... và chỉ có 1 phần
        //nội dung thay đổi duy nhất là view tương ứng
        require_once 'views/layouts/main.php';

    }

    //index.php?controller=category&action=index
    public function index() {
        // - Controller gọi Model
        $category_model = new Category();
        $categories = $category_model->getAll();
        echo '<pre>';
        print_r($categories);
        echo '</pre>';

        // - Controller gọi View
        $this->page_title = 'Trang danh sách';
        $this->content =
            $this->render('views/categories/index.php', [
                'categories' => $categories, //$categories
                'abc' => 123, // $abc
                'def' => 'aaa', // $def
            ]);
        require_once 'views/layouts/main.php';
    }
}
?>
