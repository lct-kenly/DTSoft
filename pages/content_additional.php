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


    $sql_kehoach = "SELECT * FROM `kehoachgiaoviec`";

    $result_kehoach = $ketnoi->query($sql_kehoach);

    while ($row_kehoach = $result_kehoach->fetch_assoc()) {
        $makehoach = $row_kehoach['makehoach'];

        //echo $makehoach."<br/>";

        $makhuvuc = $_GET['makhuvuc_thongke'];
        $mabophan = $_GET['mabophan_thongke'];
        $sql__nhanvien = "SELECT * FROM `nhanvien` WHERE `mabophan` = '" . $mabophan . "'";

        //echo $sql__nhanvien;

        $result__nhanvien = $ketnoi->query($sql__nhanvien);

        $arr_ds = [];

        if ($result__nhanvien->num_rows > 0) {
            // Lặp qua từng dòng kết quả
            while ($row__nhanvien = $result__nhanvien->fetch_assoc()) {

                $manv = $row__nhanvien['manhanvien'];

                //echo $manv."<br/>";

                $tongchitieucandat = 0;
                $tongchitieudatduoc = 0;

                $sql_chitietkehoach = "SELECT * FROM `chitietkehoach` WHERE `makehoach` = '".$makehoach."' AND `manhanvien` = '".$manv."'";
                $result_chitietkehoach = $ketnoi->query($sql_chitietkehoach);
                while ($row_chitietkehoach = $result_chitietkehoach->fetch_assoc()) {
                    $chitieucandat = $row_chitietkehoach['chitieucandat'];
                    $chitieudatduoc = $row_chitietkehoach['chitieudatduoc'];
                    $tongchitieucandat = $tongchitieucandat + $chitieucandat;
                    $tongchitieudatduoc = $tongchitieudatduoc + $chitieudatduoc;
                }

                $phantram_tongchitieudatduoc = ($tongchitieudatduoc / $tongchitieucandat) * 100;

                if($phantram_tongchitieudatduoc > 99){
                    $trangthai = "Đạt";
                }else if($phantram_tongchitieudatduoc > 74){
                    $trangthai = "Đạt";
                }else{
                    $trangthai = "Không đạt";
                }


                $user = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `manv` = '" . $manv . "'")->fetch_array();

                $profile =  $ketnoi->query("SELECT * FROM `nhanvien`,`taikhoan` WHERE nhanvien.manhanvien = '" . $user['manv'] . "' and taikhoan.manv = '" . $user['manv'] . "'")->fetch_array();


                $macv = "C" . $profile['level'];

                $chucvu =  $ketnoi->query("SELECT * FROM  `chucvu` WHERE chucvu.machucvu = '" . $macv . "'")->fetch_array();

                $bophan = $ketnoi->query("SELECT * FROM `bophan` WHERE `mabophan` = '" . $profile['mabophan'] . "'")->fetch_array();


                $hoten = $profile['hoten'];
                $tenchucvu = $chucvu['tenchucvu'];
                $mabophan = $bophan['mabophan'];

                $arr = array("MANV" => $manv, "HOTEN_NV" => $hoten, "TEN_CV" => $tenchucvu, "MAKEHOACH" => $makehoach,"TRANG_THAI"=>$trangthai);
                array_push($arr_ds, $arr);
            }
        }
    }

    echo json_encode($arr_ds);
}
