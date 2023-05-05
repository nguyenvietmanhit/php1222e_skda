<?php
//views/users/login.php
?>
<form action="" method="post" class="container">
	<h2>Form đăng nhập</h2>

<!--  Cần tích hợp trình soạn thảo để cho phép user sửa văn bản
  1 cách trực quan mà ko cần biết kiến thức về HTML
  Tích hợp CKEditor vào hệ thống:
  - Tải ckeditor về máy: khá nặng, trong thư mục assets của backend
  đã có sẵn thư mục ckeditor
  - Viết code JS để tích hợp, chú ý CKEditor chỉ tích hợp đc vào
  textarea
  - Nhúng thư viện ckeditor vào layout main_user.php
  - Cần tích hợp thêm thư viện CKFinder để hỗ trợ upload ảnh
  từ máy tính , vì mặc định CKEditor ko có tính năng này
  + Cách tích hợp CKFinder:
  - Tải thư viện CKFinder về máy, khá nặng, cần dựa vào phiên bản
  PHP đang cài trên máy để tìm CKFinder phù hợp
  Ktra ver PHP: XAMPP -> Shell -> php -v
  - Trong thư mục assets đã tải sẵn ckfinder là
  ckfinder_php.7.x và ckfinder_php.8.x, dựa vào phiên bản PHP
  để sử dụng thư mục tương ứng
  - CKFinder ko free, 2 thư mục ckfinder trên đã đc crack
  - Mặc định PHP 8 tắt thư viện gd, nên để CKFinder hoạt động cần
  sửa cấu hình để bật thư viện gd lên
  Để bật, XAMPP, ở Apache click Config -> php.ini, search gd sẽ
  thấy ;extension=gd2 , bỏ ; sau đó lưu lại file, restart lại Apache
  -->
    <div class="form-group">
        Nhập chi tiết sản phẩm
        <textarea name="detail" class="form-control"></textarea>
    </div>

	<div class="form-group">
		<label for="username">Username</label>
		<input type="text" name="username" class="form-control"
			   id="username" >
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control"
			   id="password" >
	</div>

	<div class="form-group">
		<input type="submit" name="submit" value="Đăng nhập"
			   class="btn btn-success">
		<a href="index.php?controller=user&action=register"
		   class="btn btn-default">
			Về trang đăng ký
		</a>
	</div>

</form>
