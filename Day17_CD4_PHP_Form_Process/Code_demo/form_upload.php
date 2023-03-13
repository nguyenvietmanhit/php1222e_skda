<?php
//form_upload.php
// XỬ lý upload file trong form với PHP
// + B1: Debug
// Xử lý file phải upload đc file đó lên hệ thống, nên ko thể chỉ
//dựa vào tên file
// - Bắt buộc form thỏa mãn 2 điều kiện sau thì mới xử lý đc file:
// + Method = post
// + Phải có thuộc tính enctype=multipart/form-data
// - PHP tạo 1 mảng 2 chiều để quản lý file: $_FILES
// - Cấu trúc $_FILES:
// + name: tên file
// + type: định dạng file
// + tmp_name: temporary name = đường dẫn tạm, là đường dẫn đang lưu
//tạm thời file đc tải lên, dùng để chuyển đến đường dẫn thật về sau
// + error: mã lỗi khi upload file, = 0 nghĩa là tải lên thư mục tạm
// thành công, ngược lại thì có lỗi
// + size: dung lượng file: Byte
// 1Mb = 1024Kb = 1024 * 1024 B = 1024 * 1024 * 8 Bit
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// + B2: Tạo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B3: Xử lý form chỉ khi submit form:
if (isset($_POST['upload'])) {
	// + B4: Gán giá trị
	$fullname = $_POST['fullname'];
	$avatars = $_FILES['avatar']; //mảng 1 chiều
	// + B5: Validate:
	// - File upload phải là ảnh
	// - File upload ko đc lớn hơn 2Mb
	// Về nguyên tắc chỉ validate đc nếu như có file đc tải lên
	if ($avatars['error'] == 0) {
		// - File upload phải là ảnh:
		// Lấy đuôi file:
		$extension = pathinfo($avatars['name'], PATHINFO_EXTENSION);
		$extension = strtolower($extension);
//		var_dump($extension);
		$allowed = ['png', 'jpg', 'jpeg', 'gif'];
		if (!in_array($extension, $allowed)) {
			$error = 'File upload phải là ảnh';
		}
		// - File upload ko đc lớn hơn 2Mb
		$size_b = $avatars['size'];
		$size_mb = $size_b / 1024 / 1024;
		if ($size_mb > 2) {
			$error = 'File upload ko đc lớn hơn 2Mb';
		}
	}
	// + B6: Xử lý logic chính chỉ khi ko có lỗi:
	if (empty($error)) {
		// Xử lý upload file vào thư mục chỉ định
		$filename = '';
		if ($avatars['error'] == 0) {
			$dir_upload = 'uploads';
			// Tạo thư mục uploads trên bằng code, ko đc tạo bằng tay
            //, chỉ tạo khi thư mục chưa tồn tại: file_exists
            if (!file_exists($dir_upload)) {
                mkdir($dir_upload);
            }
            // Tạo ra tên file mang tính duy nhất:
            $filename = time() . '-' . $avatars['name'];

            // Tải file từ thư mục tạm vào thư mục chỉ định:
            $is_upload = move_uploaded_file($avatars['tmp_name'],
            "$dir_upload/$filename");
            var_dump($is_upload);
            $result .= "<img src='$dir_upload/$filename' height='50px' >";
		}
	}
}
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form method="post" action="" enctype="multipart/form-data">
	Nhập tên:
	<input type="text" name="fullname" value="">
	<br>
	Tải ảnh đại diện:
	<input type="file" name="avatar" >
	<br>
	<input type="submit" name="upload" value="Hiển thị" >
</form>
