<?php

require_once('../admin/config.php');



if (isset($_GET['makv'])) {

    $makv = $_GET['makv'];
    $chon = $_GET['chon'];

    $manv = '';
    if(isset($_GET['manv'])){
        $manv = $_GET['manv'];
        if(strlen($manv)>2){
            $sql_bophan1 = "SELECT * FROM khuvuc, nhanvien, bophan WHERE nhanvien.mabophan = bophan.mabophan and bophan.makhuvuc = khuvuc.makhuvuc and manhanvien ='".$manv."'";
            $result_bophan1 = $ketnoi->query($sql_bophan1)->fetch_array();
            $mabophan1 = $result_bophan1['mabophan'];
            $tenbophan1 = $result_bophan1['tenbophan'];
        }
    }
        
    $sql_bophan = "SELECT * FROM `bophan` WHERE `makhuvuc` = '" . $makv . "'";
    

    $result_bophan = mysqli_query($ketnoi, $sql_bophan);

    if(strlen($manv)>2){
        echo '<option value="' . $mabophan1 . '">' . $tenbophan1 . '</option>';
    }else{
        echo '<option value="" selected>Tất cả</option>';
    }
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

    $clevel =  $ketnoi->query("SELECT taikhoan.level FROM `taikhoan` WHERE manv = '" . $ma_nhanvien_thamgia_kh . "'")->fetch_array();
    $level = "C" . $clevel['level'];

    $nhanvien =  $ketnoi->query("SELECT * FROM `nhanvien` WHERE `manhanvien` = '" . $ma_nhanvien_thamgia_kh . "'")->fetch_array();
    $mabophan = $nhanvien['mabophan'];

    $bophan =  $ketnoi->query("SELECT * FROM `bophan` WHERE `mabophan` = '" . $mabophan . "'")->fetch_array();
    $makhuvuc = $bophan['makhuvuc'];

    //$sql_nhan_vien_tham_gia = "";

    $sql_nhan_vien_tham_gia =  $ketnoi->query("SELECT nhanvien.hoten, chucvu.tenchucvu, khuvuc.tenkhuvuc FROM `nhanvien`, `chucvu`, `khuvuc` WHERE nhanvien.`manhanvien` = '" . $ma_nhanvien_thamgia_kh . "' and chucvu.machucvu = '" . $level . "' and khuvuc.makhuvuc = '" . $makhuvuc . "'")->fetch_array();

    //echo ;

    $hoten = $sql_nhan_vien_tham_gia['hoten'];
    $tenchucvu = $sql_nhan_vien_tham_gia['tenchucvu'];
    $tenkhuvuc = $sql_nhan_vien_tham_gia['tenkhuvuc'];




    // Giả sử mảng các giá trị cần hiển thị
    $values = array($hoten, $tenchucvu, $tenkhuvuc);

    // Trả về chuỗi JSON chứa mảng các giá trị
    echo json_encode($values);
}



if (isset($_GET['makhuvuc_thongke']) and isset($_GET['mabophan_thongke'])) {


    $makhuvuc = $_GET['makhuvuc_thongke'];
    $mabophan = $_GET['mabophan_thongke'];

    $loc_KV_BP = '';
    if ($makhuvuc != "" and $mabophan == "") {
        $loc_KV_BP = " and khuvuc.makhuvuc = '" . $makhuvuc . "'";
    } elseif($makhuvuc == "" and $mabophan == ""){
        $loc_KV_BP = "";
    }else
     {
        $loc_KV_BP = " and khuvuc.makhuvuc = '" . $makhuvuc . "' AND bophan.mabophan = '" . $mabophan . "'";
    }



    $sql_kehoach = "SELECT nhanvien.manhanvien, nhanvien.hoten, khuvuc.makhuvuc, khuvuc.tenkhuvuc, bophan.mabophan, bophan.tenbophan, chucvu.tenchucvu, chitietkehoach.makehoach, chitieu.machitieu, chitieu.tenchitieu, chitietkehoach.chitieucandat FROM khuvuc, bophan, nhanvien, chucvu, thoigiannhanchuc, chitieu, chitietkehoach WHERE khuvuc.makhuvuc = bophan.makhuvuc AND bophan.mabophan = nhanvien.mabophan AND nhanvien.manhanvien = thoigiannhanchuc.manhanvien AND thoigiannhanchuc.machucvu = chucvu.machucvu AND nhanvien.manhanvien = chitietkehoach.manhanvien AND chitietkehoach.machitieu = chitieu.machitieu" . $loc_KV_BP;
    
    //echo $sql_kehoach;
    
    $result_kehoach = $ketnoi->query($sql_kehoach);

    //print_r($result_kehoach);
    //die();
    $arr_ds = [];
    while ($row_kehoach = $result_kehoach->fetch_assoc()) {
        $manv = $row_kehoach['manhanvien'];
        $hoten = $row_kehoach['hoten'];
        $tenkhuvuc = $row_kehoach['tenkhuvuc'];
        $tenchucvu = $row_kehoach['tenchucvu'];
        $tenbophan = $row_kehoach['tenbophan'];
        $tenchitieu = $row_kehoach['tenchitieu'];
        $machitieu = $row_kehoach['machitieu'];
        $chitieucandat = $row_kehoach['chitieucandat'];
        $makehoach = $row_kehoach['makehoach'];
        $sql_kehoach2 = "SELECT SUM(theodoikehoach.chitieuthangdatduoc) AS TONGDATDUOC FROM theodoikehoach WHERE theodoikehoach.manhanvien = '" . $manv . "' AND theodoikehoach.makehoach = '" . $makehoach . "' AND theodoikehoach.machitieu = '" . $machitieu . "';";
        $result_chitieu = $ketnoi->query($sql_kehoach2)->fetch_array();
        $chitieudadat = $result_chitieu['TONGDATDUOC'];
        if($chitieudadat == "" or $chitieudadat == null){
            $chitieudadat = 0;
        }
        $phantram_tongchitieudatduoc = ($chitieudadat / $chitieucandat) * 100;
        if ($phantram_tongchitieudatduoc > 99) {
            $trangthai = "Đạt";
        } else if ($phantram_tongchitieudatduoc > 74) {
            $trangthai = "Chưa đạt";
        } else {
            $trangthai = "Không đạt";
        }
        $arr = array("MANV" => $manv, "HOTEN_NV" => $hoten, "TEN_CV" => $tenchucvu, "TEN_KV" => $tenkhuvuc, "TEN_BP" => $tenbophan, "TEN_CT" => $tenchitieu, "CT_CANDAT" => $chitieucandat, "CT_DADAT" => $chitieudadat, "MAKEHOACH" => $makehoach, "TRANG_THAI" => $trangthai);
        array_push($arr_ds, $arr);
        
    }
    echo json_encode($arr_ds);
}
