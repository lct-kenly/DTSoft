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



/*
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $user = $ketnoi->query("SELECT * FROM `users` WHERE `taikhoan` = '$username' ")->fetch_array();

    $userr = $user;

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
*/