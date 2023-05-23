<?php
    require_once('../admin/config.php');
    require_once('../lib/helper.php');

    if (!isset($_SESSION['username'])) {
        header("location: ../dang-nhap");
    }
    if(!isset($_SESSION['makhuvuc'])) {
        $_SESSION['makhuvuc'] = 'ALL';
    }

    $makhuvuc = isset($_POST['makhuvuc']) ? $_POST['makhuvuc'] : '';
    $mabophan = isset($_POST['mabophan']) ? $_POST['mabophan'] : '';
    $macongviec = isset($_POST['macongviec']) ? $_POST['macongviec'] : '';

    $danh_sach_bo_phan = array();

    if($_SESSION['makhuvuc'] != $makhuvuc && $makhuvuc != 'ALL' ) {

        $_SESSION['makhuvuc'] = $makhuvuc;

        $sql_bophan = "SELECT * FROM bophan WHERE makhuvuc = '{$makhuvuc}'";

        $result_bophan = $conn->query($sql_bophan);
        

        while($row = $result_bophan->fetch_assoc()) {
            $danh_sach_bo_phan[] = $row;
        }
        
    }

    if(!empty($makhuvuc) && !empty($mabophan) && !empty($macongviec)) {

        $makhuvuc = $makhuvuc != 'ALL' ? " AND khuvuc.makhuvuc = '{$makhuvuc}'" : '';
        $mabophan = $mabophan != 'ALL' ? " AND bophan.mabophan = '{$mabophan}'" : '';
        $macongviec = $macongviec != 'ALL' ? " AND congviec.macongviec = '{$macongviec}'" : '';

        $where = $makhuvuc . $mabophan . $macongviec;

    }
    //
    $danh_sach_nhan_vien = array();

    $sql = "SELECT nhanvien.manhanvien, nhanvien.hoten, chucvu.tenchucvu, congviec.tencongviec, khuvuc.tenkhuvuc, bophan.tenbophan
                FROM khuvuc, bophan, nhanvien, thoigiannhanchuc, chucvu, congviec
                WHERE khuvuc.makhuvuc = bophan.makhuvuc AND bophan.mabophan = nhanvien.mabophan AND congviec.macongviec = nhanvien.macongviec AND nhanvien.manhanvien = thoigiannhanchuc.manhanvien AND thoigiannhanchuc.machucvu = chucvu.machucvu {$where}
                ORDER BY nhanvien.manhanvien ASC";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $danh_sach_nhan_vien[] = $row;
    }

    echo json_encode(array("nhanvien" => $danh_sach_nhan_vien, "danhsachbophan" => $danh_sach_bo_phan, "mabophan" => $_POST['mabophan']));



?>