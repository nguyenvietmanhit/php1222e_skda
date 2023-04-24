<?php
//views/users/register.php
?>

<form action="" method="post" class="container">
	<h2>Form đăng ký</h2>
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
		<label for="confirm_password">Nhập lại pass</label>
		<input type="password" name="confirm_password"
			   class="form-control" id="confirm_password" >
	</div>
	<div class="form-group">
		<input type="submit" name="submit" value="Đăng ký"
		   class="btn btn-success">
		<a href="index.php?controller=user&action=login"
		   class="btn btn-default">
			Về trang đăng nhập
		</a>
	</div>
</form>
