<?php

require_once('../admin/config.php');



if (isset($_GET['makv'])) {

    $makv = $_GET['makv'];
    $chon = $_GET['chon'];

    $sql_bophan = "SELECT * FROM `bophan` WHERE `makhuvuc` = '" . $makv . "'";

    $result_bophan = mysqli_query($ketnoi, $sql_bophan);


    echo '<option selected>Chọn bộ phận</option>';
    // Lấy dữ liệu
    while ($row = mysqli_fetch_array($result_bophan)) {
        $mabophan = $row[0];
        $tenbophan = $row[1];
        echo '<option value="' . $mabophan . '">' . $tenbophan . '</option>';
    }
} else if (isset($_GET['mabophan'])) {

    $mabophan = $_GET['mabophan'];
    //$manv_bophan = $_GET['manv_bophan'];


    echo '<option selected>Mã nhân viên</option>';

    $sql_nhanvien = "SELECT * FROM `nhanvien` WHERE `mabophan` = '" . $mabophan . "'";

    $result_nhanvien = mysqli_query($ketnoi, $sql_nhanvien);

    // Lấy dữ liệu
    while ($row = mysqli_fetch_array($result_nhanvien)) {
        $manv = $row[0];
        $tennv = $row[1];
        echo '<option value="' . $manv . '">' . $manv . '</option>';
    }
} else if (isset($_GET['nhanvien_thamgia_kh'])) {

    // Lấy giá trị của biến GET nhanvien_thamgia_kh
    $ma_nhanvien_thamgia_kh = $_GET['nhanvien_thamgia_kh'];

    $clevel =  $ketnoi->query("SELECT taikhoan.level FROM `taikhoan` WHERE manv = '".$ma_nhanvien_thamgia_kh."'")->fetch_array();
    $level = "C".$clevel['level'];

    $nhanvien =  $ketnoi->query("SELECT * FROM `nhanvien` WHERE `manhanvien` = '".$ma_nhanvien_thamgia_kh."'")->fetch_array();
    $mabophan = $nhanvien['mabophan'];

    $bophan =  $ketnoi->query("SELECT * FROM `bophan` WHERE `mabophan` = '".$mabophan."'")->fetch_array();
    $makhuvuc = $bophan['makhuvuc'];

    //$sql_nhan_vien_tham_gia = "";

    $sql_nhan_vien_tham_gia =  $ketnoi->query("SELECT nhanvien.hoten, chucvu.tenchucvu, khuvuc.tenkhuvuc FROM `nhanvien`, `chucvu`, `khuvuc` WHERE nhanvien.`manhanvien` = '".$ma_nhanvien_thamgia_kh."' and chucvu.machucvu = '".$level."' and khuvuc.makhuvuc = '".$makhuvuc."'")->fetch_array();
    
    //echo ;
    
    $hoten = $sql_nhan_vien_tham_gia['hoten'];
    $tenchucvu = $sql_nhan_vien_tham_gia['tenchucvu'];
    $tenkhuvuc = $sql_nhan_vien_tham_gia['tenkhuvuc'];




    // Giả sử mảng các giá trị cần hiển thị
    $values = array($hoten, $tenchucvu, $tenkhuvuc);

    // Trả về chuỗi JSON chứa mảng các giá trị
    echo json_encode($values);
}
