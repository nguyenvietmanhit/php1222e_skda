<!--controllers/Controller.php
-->
<?php
// Class cha để cho các class kế thừa từ nó
class Controller {
    // Tiêu đề trang
    public $page_title;
    // Lỗi
    public $error;
    // Lưu nội dung file view tương ứng với chức năng:
    public $content;

    // Lấy nội dung file kèm cơ chế truyền biến tường minh
    // $file_path: đường dẫn file view
    // $variables: mảng chứa các biến cần truyền vào view
    public function render($file_path, $variables = []) {
        extract($variables);
        ob_start();
        require $file_path;
        return ob_get_clean();
        //file_get_contents
    }
}
