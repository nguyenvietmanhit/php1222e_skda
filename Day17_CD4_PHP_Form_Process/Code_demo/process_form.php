<?php
//process_form.php
// - Form là gì ? là nơi nhập liệu, dữ liệu khi gửi đi
// thì PHP sẽ cần xử lý -> xử lý form
// - Form có 2 dạng:
// + Lấy thông tin dưới dạng dữ liệu cơ bản ( giá trị có thể nhìn
//thấy đc)
// + Lấy thông tin dưới dạng file
// - Xử lý form: lấy thông tin từ form sau đó hiển thị ra
?>

<!--
- action của form: url/file mà dữ liệu từ form đc gửi lên, nếu
action="" tương đương với chính file hiện tại
- method: phương thức gửi dữ liệu lên PHP, POST và GET
POST: dữ liệu truyền ngầm
GET: dữ liệu truyền lên url theo format ?name1=value1&name2=value2
ko đc sử dụng khi form có dữ liệu cần bảo mật: password, ngân hàng ...
Form tìm kiếm -> GET
-> phân biệt POST/GET dựa vào url, POST url ko thay đổi sau khi submit
còn GET sẽ bị thay đổi, POST bảo mật hơn GET
-->
<?php
// Code PHP xử lý nằm phía trên khai báo form HTML
// Quy trình xử lý form:
// + B1: Debug
// Dựa vào method của form thì PHP sẽ sinh ra biến tương ứng lưu trữ
// toàn bộ dữ liệu từ form gửi lên, dạng mảng kết hợp
// method = get -> $_GET
// method = post -> $_POST
echo '<pre>';
print_r($_GET);
echo '</pre>';
// - Khi mới vào form, $_GET/$_POST rỗng
// + B2: Khai báo biến chứa lỗi và kết quả:
$error = '';
$result = '';
// + B3: Xử lý dữ liệu từ form gửi lên với điều kiện là user phải
//submit form, dựa vào name của nút submit
if (isset($_GET['show']) == true) {
    // + B4: Lấy giá trị từ form thông qua việc gán biến để thao tác
    //cho dễ
    $fullname = $_GET['fullname'];
    // + B5: Validate form: lọc dữ liệu rác, giúp bảo mật form
    // Nếu có lỗi thì đổ lỗi vào biến error ở B2:
    // - Tên ko đc để trống: empty -> true là rỗng
    // - Tên phải ít nhất 3 ký tự:  strlen
    // - Tên phải dạng email: filter_var
    if (empty($fullname) == true) {
        $error = 'Tên ko đc để trống';
    } elseif (strlen($fullname) < 3) {
        $error = 'Tên phải ít nhất 3 ký tự';
    } elseif (filter_var($fullname, FILTER_VALIDATE_EMAIL) == false) {
        $error = 'Tên phải dạng email';
    }
    // + B6: Xử lý logic chính chỉ khi ko có lỗi nào xảy ra, dựa vào
    //biến error
    // Lưu kết quả vào biến result ở B2
    if (empty($error) == true) {
        $result = "Chào bạn: $fullname";
    }
    // B4 B5 B6 nằm trong B3
}
// + B7: Hiển thị error và result ra form, nằm ngoài B3
//echo "<h3 style='color: red'>$error</h3>";
// + B8: Đổ lại dữ liệu đã nhập ra form
?>

<h3 style="color: red"><?php echo $error; ?></h3>
<h3 style="color: green"><?php echo $result; ?></h3>
<form action="" method="get">
	Nhập tên của bạn:
<!--  Các input bắt buộc phải khai báo thuộc tính name, vì PHP dựa
  vào thuộc tính name để biết đc dữ liệu gửi lên là của input nào-->
    <input type="text" name="fullname"
value="<?php echo isset($_GET['fullname']) ? $_GET['fullname'] : '' ?>"
           placeholder="Nhập tên" />
    <br>
<!--   Bắt buộc phải có nút submit để gửi thông tin đi -->
    <input type="submit" name="show" value="Hiển thị tên"/>
</form>
