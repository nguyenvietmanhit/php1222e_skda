<!--views/layouts/main.php
- Cần xác định nội dung động trên trang để hiển thị ra thuộc tính
của class controller cha tương ứng đang đc set ở class controller con
-->
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $this->page_title; ?></title>
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="assets/js/script.js"></script>
    </head>
    <body>
<!-- Hiển thị các lỗi, session lỗi, session thành công tại file
layout-->
        <h3 style="color: red"><?php echo $this->error; ?></h3>
        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        }
		if (isset($_SESSION['error'])) {
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
        ?>
        <div class="header">Đây là header</div>
        <div class="main"><?php echo $this->content; ?></div>
        <div class="footer">Đây là footer</div>
    </body>
</html>
