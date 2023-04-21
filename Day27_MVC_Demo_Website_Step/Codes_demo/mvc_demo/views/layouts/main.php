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
        <div class="header">Đây là header</div>
        <div class="main"><?php echo $this->content; ?></div>
        <div class="footer">Đây là footer</div>
    </body>
</html>
