<?php
//process_form_2.php
// Xử lý form với các input phức tạp hơn: radio, checkbox, select,
//texarea
// XỬ LÝ FORM:
// + B1: Debug:
echo '<pre>';
print_r($_POST);
echo '</pre>';
// + B2: Khai báo biến chứa lỗi và kết quả
$error = '';
$result = '';
// + B3: Xử lý form chỉ khi user submit form:
if (isset($_POST['submit'])) {
    // + B4: Lấy giá trị từ form để thao tác cho dễ
    $age = $_POST['age'];
    // Nếu ko chọn vào bất cứ radio hoặc checkbox nào thì PHP sẽ ko
    //bắt đc dữ liệu
//    $gender = $_POST['gender'];
//    $jobs = $_POST['jobs'];
    $country = $_POST['country'];
    $note = $_POST['note'];
    // + B5: Validate:
    // - Phải nhập tất cả các trường
    // - Tuổi phải là số:

}
?>
<form action="" method="post">
	Nhập tuổi:
	<input type="text" name="age" value="">
	<br>
	Giới tính:
    <input type="radio" name="gender" value="0">Nam
    <input type="radio" name="gender" value="1">Nữ
    <input type="radio" name="gender" value="2">Khác
    <br>
    Nghề nghiệp:
<!--  Với input cho phép chọn nhiều giá trị tại 1 thời điểm như
  checkbox, select multiple, file multiple thì name bắt buộc phải
  ở dạng mảng-->
    <input type="checkbox" name="jobs[]" value="0">Dev
    <input type="checkbox" name="jobs[]" value="1">Tester
    <input type="checkbox" name="jobs[]" value="2">BA
    <br>
    Chọn quốc gia:
    <select name="country">
        <option value="0">VN</option>
        <option value="1">Korea</option>
        <option value="2">Japan</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"></textarea>
    <br>
    <input type="submit" name="submit" value="Hiển thị">
</form>
