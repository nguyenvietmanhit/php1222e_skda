<!--views/categories/index.php-->
<?php
echo '<pre>';
print_r($categories);
echo '</pre>';
?>
?>
<h2>Trang danh sách</h2>
<a href="index.php?controller=category&action=create">
    Thêm mới
</a>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Created_at</th>
        <th></th>
    </tr>
    <tr>
        <td>2</td>
        <td>Thể thao</td>
        <td>
            <img src="#" height="50px">
        </td>
        <td>21/04/2023 20:53:00</td>
        <td>
            <a href="index.php?controller=category&action=update&id=2">Sửa</a>
            <a href="index.php?controller=category&action=delete&id=2">Xóa</a>
        </td>
    </tr>
</table>
