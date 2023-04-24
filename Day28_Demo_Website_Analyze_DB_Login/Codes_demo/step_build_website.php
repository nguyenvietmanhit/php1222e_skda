<!--step_build_website.php-->
Quy trình xây dựng 1 website từ đầu:
+ B1: Lên chủ đề: tin tức (ko nên), bán hàng, thi online ...
+ B2: Xác định thành viên nhóm: độc lập hoặc team (tối đa 3 người)
Sử dụng Git để code nhóm
+ B3: Lên giao diện tĩnh cho website: HTML CSS JS
Cần xác định tất các trang có thể có cho website và dựng hết giao
diện tĩnh. Vd với trang bán hàng
- Frontend: giao diện cho user sử dụng:
trang chủ, trang login/register, danh sách sp/tin tức, giỏ hàng
, thanh toán, liên hệ, chi tiết ...
- Backend: giao diện cho admin quản trị hệ thống
trang chủ, và crud cho các chức năng

- Có 2 hướng dựng giao diện:
Tự code:
Tìm template có sẵn: nên theo hướng này để tiết kiệm thời gian, tập
trung vào việc code
Nếu chức năng nào mà chưa rõ về giao diện thì nên trải nghiệm
trên các trang web đang có
mockup

web_demo
        /frontend/
                 /assets
                 /configs
                    ....
        /backend/
                /assets
                /configs
                ....

+ B4: Phân tích CSDL từ giao diện tĩnh đã có:
- Phải chạy lần lượt toàn bộ trang HTML tĩnh, ưu tiên trang frontend
- Tại mỗi trang, đi từ trên xuống dưới để phân tích
Mỗi khi gặp các thông tin hiển thị trên màn hình, cần tự đặt ra câu
hỏi là có nên lưu thông tin này vào CSDL hay ko?
Xem xét xem thông tin đó có hay thay đổi hay ko, nếu hay thay đổi
thì cần lưu vào CSDL, và ngược lại
- Lưu vào CSDL thì admin sẽ chỉnh sửa đc thông tin bằng giao diện
CRUD -> phải code -> trang web chậm hơn vì phải tương tác CSDL
- Nếu ko lưu vào CSDL thì admin ko tự sửa đc, phải sửa trực tiếp
trong code -> dev phải sửa, bù lại ko phải code CRUD và web nhanh
hơn
- Menu động: tạo bảng menus, xác định các trường: mặc định và nghiệp
vụ
id: khóa chính
status: trạng thái, tinyint, 0: ẩn, 1: hiển thị
created_at: ngày tạo menu
updated_at: lần cập nhật cuối cùng, sinh tự động
name: tên menu
link: url cho menu
- Bảng products: lưu các thông tin sp
id
status
created_at
updated_at
avatar: lưu tên file ảnh, varchar
name: tên sp
price: giá sp
# Cần tìm tất cả trang chứa thông tin về sản phẩm để phân tích
summary: mô tả ngắn cho sp, TEXT
content: mô tả chi tiết sp, TEXT
seo_title: seo theo tên sp vARCHAR
seo_description: seo theo mô tả VARCHAR
seo_keyword: seo theo từ khóa VARCHAR
# Xác định khóa ngoại nếu có
category_id: liên kết để bảng categories, INT

- Tạo CSDL php1222e_project dùng PHPMyadmin
Vào tab SQL, copy nội dung file file_create_db.html
để tạo các bảng
Sử dụng chức năng Designer của PHPMyadmin để lấy hình vẽ các sự liên
kết giữa các bảng -> báo cáo cuối khóa
-> bắt buộc phải định nghĩa khóa ngoại trong lúc tạo bảng
+ B6: Code, dựa vào thư mục mvc_demo của ngày 28
Code backend trước rồi đến frontend:
- Code chức năng Đăng ký user:
Cần tạo bảng user để lưu lại thông tin sẽ đăng ký:
Xây dựng form đăng ký user: username, password
Username: tên đăng nhập mang tính duy nhất
password: mật khẩu, lưu ntn ? 123 -> 123, bắt buộc phải mã hóa r mới
lưu, 1 số thuật toán như md5, bcrypt -> ưu tiên bcrypt vì có tính
bảo mật cao
Tạo 1 trường role_id để lưu lại role cho user/admin, role_id = 0 là
user, = 1 là admin
Bảng roles: id, name
1 Admin
0 User
