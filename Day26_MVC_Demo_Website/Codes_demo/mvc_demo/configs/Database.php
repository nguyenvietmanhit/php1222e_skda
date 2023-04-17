<!--
configs/Database.php
- Lưu thông tin kết nối CSDL theo PDO
- Quy tắc đặt tên file: Nếu file PHP mà chứa 1 class duy nhất thì
tên file sẽ trùng tên class -> quy tắc đặt tên class trong MVC
-->
<?php
class Database {
    const DB_DSN = 'mysql:host=localhost;dbname=php1222e_mvc;port=3306';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
}
?>

