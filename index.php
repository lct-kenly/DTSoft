<?php



'Khi đã có file SQL thì mình sẽ thêm vào csdl tới lúc đó sẽ xóa /* */ và lệnh kết nố sẽ thực hiện nếu kết nối thành công nó sẽ tự chuyển vào trang chủ còn nếu lỗi thì nó sẽ dừng ở trang này';


error_reporting(0);



echo "Lỗi kết nối vui lòng để tất cả file vào đúng thư mục htdocs nếu dùng trên xampp và kiểm tra kết nối database ở file admind/config.php";
require_once('./admin/config.php');


if(!$ketnoi){}else{
header("location: trang-chu");
}