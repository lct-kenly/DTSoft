<?php
require_once('../admin/config.php');
    function test($conn, $makehoach, $manhanvien, $machitieu) {
        $sql = "SELECT SUM(theodoikehoach.chitieuthangdatduoc) AS TONGDATDUOC
                FROM kehoachgiaoviec, theodoikehoach
                WHERE kehoachgiaoviec.makehoach = theodoikehoach.makehoach AND kehoachgiaoviec.makehoach = '{$makehoach}' AND theodoikehoach.manhanvien = '{$manhanvien}' AND theodoikehoach.machitieu = '{$machitieu}' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";

        $result = $conn->query($sql)->fetch_assoc();

        if(empty($result['TONGDATDUOC'])) {
            $result['TONGDATDUOC'] = 0;
        }

        return $result['TONGDATDUOC'];
    }

    $data = array();

    $sql = "SELECT kehoachgiaoviec.makehoach, chitietkehoach.manhanvien, chitietkehoach.machitieu, chitietkehoach.chitieucandat
            FROM kehoachgiaoviec, chitietkehoach
            WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.mabophan = 'KD001' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";

    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }


    $total = 0;

    foreach($data as $item) {
        if($item['chitieucandat'] <= test($conn, $item['makehoach'], $item['manhanvien'], $item['machitieu'])) {
            $total++;
        }
    }

    echo $total;
?>