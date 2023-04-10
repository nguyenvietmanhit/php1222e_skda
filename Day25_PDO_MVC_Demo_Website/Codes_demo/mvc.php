
//mvc.php
// Mô hình MVC
// - Khái niệm
// + Là mô hình kiến trúc phần mềm 3 lớp: Model View Controller
// + Đa số các website hiện nay đều đc xây dựng dựa trên MVC
// + Tách biệt ứng dụng web ra làm 3 thành phần riêng biệt là Model,
//View, Controller -> tách biệt code và dễ mở rộng hệ thống
// + Khó tiếp cận với beginner vì dựa trên OOP và cấu trúc triển
//khai MVC
// - Chi tiết 3 thành phần MVC:
// + M - Model: tương tác với CSDL, tất cả code truy vấn sẽ đc
// viết trong Model
// + V - View: hiển thị dữ liệu tới người dùng
// + C - Controller: trung gian giữa M và V, luân chuyển dữ liệu
//giữa M và V
// - Luồng xử lý dữ liệu của MVC
// - Cấu trúc thư mục code MVC:
mvc_demo /
         /assets: chứa các file tĩnh CSS JS Image Fonts ...
                 /css: chứa các file .css
                     /style.css
                 /js: chứa các file .js
                    /script.js
                 /images: chứa các ảnh tĩnh
         /configs: chứa file cấu hình CSDL, mail ...
                 /Database.php: class lưu cấu hình kết nối CSDL
         /controllers: chứa các class controller của MVC
                     /CategoryController.php
         /models: chứa các class model của MVC
                /Category.php
         /views: chứa các file view
               /layouts: chứa file layout chung
                        /main.php
               /categories/
                          /index.php: list danh mục
                          /create.php: thêm danh mục
                          /update.php: sửa
                          /delete.php: xóa
         .htaccess: cấu hình truy cập, đường dẫn thân thiện ...
		 index.php: file index gốc của ứng dụng MVC

