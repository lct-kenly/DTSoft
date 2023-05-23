<?php
    require_once('../admin/config.php');
    require_once('../lib/helper.php');

    function get_nhan_vien($conn, $makhuvuc) {
        $data = array();
        $sql_get = "SELECT kehoachgiaoviec.makehoach, chitietkehoach.manhanvien
                    FROM kehoachgiaoviec, chitietkehoach
                    WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.makhuvuc = '{$makhuvuc}'
                    GROUP BY chitietkehoach.manhanvien";

        $result = $conn->query($sql_get);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    function check_ket_qua($conn, $makehoach, $manhanvien) {
        $total = 0;

        $sql = "SELECT * FROM chitietkehoach WHERE makehoach = '{$makehoach}' AND manhanvien = '{$manhanvien}'";

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $chitieucandat = $row['chitieucandat'];
            $chitieudatduoc = $row['chitieudatduoc'];
            $phantram = $chitieudatduoc / $chitieucandat * 100;

            if($phantram >= 100 ) {
                $total += 3;
            } else if ($phantram >= 75 && $phantram <= 100) {
                $total += 2;
            } else {
                $total += 1;
            }

        }
        
        $total = floor($total / 3);

        return $total;
    }

    $can_tho = array(
        "dat" => 0,
        "chuadat" => 0,
        "khongdat" => 0,
    );

    $nha_trang = array(
        "dat" => 0,
        "chuadat" => 0,
        "khongdat" => 0,
    );


    $danhsachnhanvienCT = get_nhan_vien($conn, 'CT') ?? array();
    $danhsachnhanvienNT = get_nhan_vien($conn, 'NT') ?? array();


    if(!empty($danhsachnhanvienCT)) {
        foreach($danhsachnhanvienCT as $item) {
            $check = check_ket_qua($conn, $item['makehoach'], $item['manhanvien']);
    
            switch($check) {
                case 1: $can_tho['khongdat']++; break;
                case 2: $can_tho['chuadat']++; break;
                case 3: $can_tho['dat']++; break;
                default: $can_tho['khongdat']++; break;
            }
        }
    }


    if(!empty($danhsachnhanvienNT)) {
        foreach($danhsachnhanvienNT as $item) {
            $check = check_ket_qua($conn, $item['makehoach'], $item['manhanvien']);
    
            switch($check) {
                case 1: $nha_trang['khongdat']++; break;
                case 2: $nha_trang['chuadat']++; break;
                case 3: $nha_trang['dat']++; break;
                default: $nha_trang['khongdat']++; break;
            }
        }
    }


    echo json_encode(array("cantho" => $can_tho, "nhatrang" => $nha_trang));

    
?>