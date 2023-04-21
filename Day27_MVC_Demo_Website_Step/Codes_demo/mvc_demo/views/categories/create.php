<!--views/categories/create.php
categories: id, name, avatar, created_at
-->
<h2>Form thêm mới danh mục</h2>
<form method="post" action="" enctype="multipart/form-data">
    Nhập tên:
    <input type="text" name="name" value=""><br>
    Chọn ảnh:
    <input type="file" name="avatar"><br>
    <input type="submit" name="submit" value="Lưu danh mục">
    <a href="index.php?controller=category&action=index">
        Về trang danh sách
    </a>
</form>

