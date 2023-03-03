<?php
//nhung_file.php
echo 'File nhung_file.php';
// - Có 4 hàm nhúng file: include, require
// include_once, require_once
// Tạo 1 file test.php, nằm cùng cấp với file nhung_file.php
require 'fsdadsfdfsd.txt';

echo 'abcdef';
// Include và require khác nhau khi nhúng 1 file ko tồn tại, include
//show ra lỗi warning và code phía sau vẫn chạy, ngược lại require
//dừng thực thi code phía sau -> require chặt chẽ hơn include
// Trong thực tế ưu tiên dùng hàm require_once để nhúng file
?>
