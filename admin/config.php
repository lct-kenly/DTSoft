<?php


session_start();
define("DATABASE", "quanlynhansu");
define("USERNAME", "root");
define("PASSWORD", "");
define("LOCALHOST", "localhost");
$ketnoi = mysqli_connect(LOCALHOST, USERNAME, PASSWORD, DATABASE);
$ketnoi->query("set names 'utf8'");
$conn = $ketnoi;
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION['session_request'] = time();
$time = date('h:i d-m-Y');


$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['WWW_HTTP_CLIENT_IP'])) {
    $ip = $SERVER['WWW_HTTP_CLIENT_IP'];
} else if (!empty($_SERVER['WWW_HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['WWW_HTTP_X-FORWARDED_FOR'];
}
$browser = $_SERVER['HTTP_USER_AGENT'];




if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $user = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `tentk` = '".$_SESSION['username']."'")->fetch_array();
    $profile =  $ketnoi->query("SELECT * FROM `nhanvien`,`taikhoan` WHERE nhanvien.manhanvien = '".$user['manv']."' and taikhoan.manv = '".$user['manv']."'")->fetch_array();
    
    $macv = "C".$profile['level'];

    $chucvu =  $ketnoi->query("SELECT * FROM  `chucvu` WHERE chucvu.machucvu = '".$macv."'")->fetch_array();

    $bophan = $ketnoi->query("SELECT * FROM `bophan` WHERE `mabophan` = '".$profile['mabophan']."'")->fetch_array();


    $chucvu_khuvuc = $chucvu['tenchucvu']." - Phòng ".$bophan['tenbophan'];





    //$chuc_vu = 


    // if(empty($user['id_user'])) {
    // session_start();
    // session_destroy();
    // header('location: /');
    // }

    // if($user['level'] == "-1") {
    // session_start();
    // session_destroy();
    // header('location: /');
    // }

}
