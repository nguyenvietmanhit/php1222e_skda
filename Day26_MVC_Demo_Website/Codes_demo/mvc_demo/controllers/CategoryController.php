<!--controllers/CategoryController.php-->
<?php
// namespace
require_once 'controllers/Controller.php';
class CategoryController extends Controller {

    //index.php?controller=category&action=create
    public function create() {
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
}
?>
