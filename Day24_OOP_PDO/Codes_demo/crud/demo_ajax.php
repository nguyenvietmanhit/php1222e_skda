<!--crud/demo_ajax.php
Ajax - Asynchronous Javascript and XML - là kỹ thuật ko đồng bộ
cho phép tương tác với trang web mà ko cần tải lại trang
- PHP là ngôn ngữ lập trình đồng bộ - các chức năng phải chờ nhau
tải xong thì mới đến lượt, tốc độ tải trang ko cao
- Ajax là kỹ thuật dựa trên Javascipt - ko đồng bộ -> tốc độ nhanh
Framework FE dựa trên JS: Angular, React, Vue JS
BE của JS: NodeJS, Framework: NestJS
- Sử dụng Ajax của thư viện jQuery cho đơn giản về cú pháp
-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<a href="#" id="click-ajax">
    Click để lấy danh sách sp bằng ajax
</a>
<div id="result-ajax" style="border: 1px solid red">
    Danh sách sp sẽ đc hiển thị tại đây
</div>
<script>
    $(document).ready(function() {
        // alert('test jquery');
        // Khi click vào thẻ a thì gọi ajax
        $('#click-ajax').click(function() {
            // alert('click ok');
            var obj_ajax = {
                // url PHP xử lý ajax gửi lên
                url: 'index.php',
                // phương thức gửi dữ liệu: GET, POST, PUT, DELETE
                // liên quan đến API
                method: 'GET',
                // Set dữ liệu truyền lên
                data: {
                    fullname: 'manhnv',
                    age: 33
                },
                // Nơi nhận dữ liệu trả về từ PHP
                success: function(info) {
                    // console.log(info);
                    $('#result-ajax').html(info);
                }
            };
            // Gọi ajax với jQuery
            $.ajax(obj_ajax);
            // Debug ajax bằng cách
            // Inspect HTML -> Network, tích Filter by Fetch/XHR

            // Thư viện DAtatable của jQuery
        })
    })
</script>
