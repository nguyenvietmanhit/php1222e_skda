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
    if (empty($age)) {
        $error = 'Phải nhập tuổi';
    } elseif (!isset($_POST['gender'])) {
        $error = 'Phải chọn giới tính';
    } elseif (!isset($_POST['jobs'])) {
        $error = 'Phải chọn nghề nghiệp';
    } elseif (empty($note)) {
        $error = 'Phải nhập ghi chú';
    } elseif (!is_numeric($age)) {
        $error = 'Tuổi là phải là số';
    }
    // + B6: Xử lý logic chính chỉ khi nào ko có lỗi nào
    if (empty($error)) {
        $result .= "Tuổi: $age <br>";
        $gender = $_POST['gender'];
        switch ($gender) {
            case 0: $result .= "Giới tính: Nam <br>";break;
            case 1: $result .= "Giới tính: Nữ <br>";break;
            case 2: $result .= "Giới tính: Khác <br>";
        }
        $jobs = $_POST['jobs'];
        $job_text = '';
        foreach ($jobs AS $job) {
            switch ($job) {
                case 0: $job_text .= " Dev ";break;
                case 1: $job_text .= " Tester ";break;
                case 2: $job_text .= " BA ";
            }
        }
        $result .= "Nghề nghiệp: $job_text <br>";

        switch ($country) {
            case 0: $result .= "Quốc gia: VN";break;
            case 1: $result .= "Quốc gia: Korea";break;
            case 2: $result .= "Quốc gia: Japan";
        }
        $result .= "<br>Ghi chú: $note";
    }
}
// + B7: Đổ error và result ra form
// + B8: Giữ lại data đã nhập sau khi submit
?>
<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="post">
	Nhập tuổi:
	<input type="text" name="age"
value="<?php echo isset($_POST['age']) ? $_POST['age'] : '' ?>">
	<br>
	Giới tính:
    <?php
    // Có bao nhiêu radio có bấy nhiêu biến lưu trữ trạng thái checked
    //hay ko
    $checked_male = '';
    $checked_female = '';
    $checked_another = '';
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
        switch ($gender) {
            case 0: $checked_male = 'checked';break;
            case 1: $checked_female = 'checked';break;
            case 2: $checked_another = 'checked';
        }
    }
    ?>
    <input <?php echo $checked_male; ?> type="radio" name="gender" value="0">Nam
    <input <?php echo $checked_female; ?> type="radio" name="gender" value="1">Nữ
    <input <?php echo $checked_another; ?> type="radio" name="gender" value="2">Khác
    <br>
    Nghề nghiệp:
<!--  Với input cho phép chọn nhiều giá trị tại 1 thời điểm như
  checkbox, select multiple, file multiple thì name bắt buộc phải
  ở dạng mảng-->
    <?php
    // Giống radio
    $checked_dev = '';
    $checked_tester = '';
    $checked_ba = '';
    if (isset($_POST['jobs'])) {
        $jobs = $_POST['jobs'];
        foreach($jobs AS $job) {
            switch ($job) {
                case 0: $checked_dev = 'checked';break;
                case 1: $checked_tester = 'checked';break;
                case 2: $checked_ba = 'checked';
            }
        }
    }
    ?>
    <input <?php echo $checked_dev; ?> type="checkbox" name="jobs[]" value="0">Dev
    <input <?php echo $checked_tester; ?> type="checkbox" name="jobs[]" value="1">Tester
    <input <?php echo $checked_ba; ?> type="checkbox" name="jobs[]" value="2">BA
    <br>
    Chọn quốc gia:
    <?php
    $selected_vn = '';
    $selected_korea = '';
    $selected_japan = '';
    if (isset($_POST['country'])) {
        $country = $_POST['country'];
        switch ($country) {
            case 0: $selected_vn = 'selected';break;
            case 1: $selected_korea = 'selected';break;
            case 2: $selected_japan = 'selected';
        }
    }
    ?>
    <select name="country">
        <option value="0" <?php echo $selected_vn; ?> >VN</option>
        <option value="1" <?php echo $selected_korea; ?>>Korea</option>
        <option value="2" <?php echo $selected_japan; ?>>Japan</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"><?php echo isset($_POST['note']) ? $_POST['note'] : ''?></textarea>
    <br>
    <input type="submit" name="submit" value="Hiển thị">

</form>
