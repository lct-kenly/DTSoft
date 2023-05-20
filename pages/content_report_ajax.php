<?php
    require_once('../admin/config.php');
    if(!isset($_SESSION['username'])) {
        header("location: ./login.php");
    }

    $makehoach = isset($_POST['makehoach']) ? $_POST['makehoach'] : '';
    $danhsachchitieu = array();

    if(!empty($makehoach)) {

        $sql_get_staff = "SELECT * FROM theodoikehoach WHERE manhanvien = '{$profile['manhanvien']}' AND makehoach = '{$makehoach}'";

        $result_get_staff = $conn->query($sql_get_staff);

        if($result_get_staff->num_rows > 0) {
            $sql = "SELECT chitieu.machitieu, chitieu.tenchitieu , theodoikehoach.chitieuthangdatduoc
                    FROM chitieu, theodoikehoach
                    WHERE chitieu.machitieu = theodoikehoach.machitieu AND theodoikehoach.makehoach = '{$makehoach}' AND theodoikehoach.manhanvien = '{$profile['manhanvien']}'
                    GROUP BY chitieu.machitieu";
        } else {
            $sql = "SELECT chitieu.machitieu, chitieu.tenchitieu 
                FROM `chitietkehoach`, chitieu
                WHERE chitieu.machitieu = chitietkehoach.machitieu AND chitietkehoach.makehoach = '{$makehoach}'
                GROUP BY chitieu.machitieu";
        }

        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row  = $result->fetch_assoc()) {
                $danhsachchitieu[] = $row;
            }
        }

        echo json_encode(array("danhsachchitieu" => $danhsachchitieu));
    }

?>