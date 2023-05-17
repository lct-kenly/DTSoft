<?php
    require_once('../admin/config.php');
    if (!isset($_SESSION['username'])) {
        header("location: ./login.php");
    }

    function check_danh_gia($conn, $makehoach)
    {

        $sql = "SELECT * FROM danhgiakehoach WHERE makehoach = '{$makehoach}'";

        $result = $conn->query($sql);

        return $result->num_rows;
    }

    // Load Ajax
    if(isset($_POST['makhuvuc']) && isset($_POST['nam'])) {
        $makhuvuc = $_POST['makhuvuc'];
        $nam = $_POST['nam'];

        $listPlans = array();

        if(empty($nam)) {
            $nam = date("Y");
        }

        $sql_get_list_plans = '';

        if($makhuvuc == 'all') {
            $sql_get_list_plans = "SELECT kehoachgiaoviec.makehoach, khuvuc.tenkhuvuc, bophan.tenbophan, kehoachgiaoviec.thoigiandukien, kehoachgiaoviec.tiendo
                    FROM khuvuc, bophan, kehoachgiaoviec
                    WHERE khuvuc.makhuvuc = kehoachgiaoviec.makhuvuc AND bophan.mabophan = kehoachgiaoviec.mabophan AND YEAR(kehoachgiaoviec.thoigiandukien) = '{$nam}'";
        } else {
            $sql_get_list_plans = "SELECT kehoachgiaoviec.makehoach, khuvuc.tenkhuvuc, bophan.tenbophan, kehoachgiaoviec.thoigiandukien, kehoachgiaoviec.tiendo
                    FROM khuvuc, bophan, kehoachgiaoviec
                    WHERE khuvuc.makhuvuc = kehoachgiaoviec.makhuvuc AND bophan.mabophan = kehoachgiaoviec.mabophan AND khuvuc.makhuvuc = '{$makhuvuc}' AND YEAR(kehoachgiaoviec.thoigiandukien) = '{$nam}'";
        }

        $result_list_plans = $conn->query($sql_get_list_plans);

        while ($row = $result_list_plans->fetch_assoc()) {
            if(check_danh_gia($conn, $row['makehoach']) > 0) {
                $row['trangthai'] = 'Đã đánh giá';
            } else {
                $row['trangthai'] = 'Chưa đánh giá';
            }

            $listPlans[] = $row;
        }

        echo json_encode(array("response" => $listPlans));
    }
?>