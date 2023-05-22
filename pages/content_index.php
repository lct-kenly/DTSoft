<?php
require_once('../admin/config.php');
if (!isset($_SESSION['username'])) {
    header("location: ./login.php");
}




function ham_get_chitieudadat($conn, $makehoach, $manhanvien, $machitieu)
{
    $sql = "SELECT SUM(theodoikehoach.chitieuthangdatduoc) AS TONGDATDUOC
                FROM kehoachgiaoviec, theodoikehoach
                WHERE kehoachgiaoviec.makehoach = theodoikehoach.makehoach AND kehoachgiaoviec.makehoach = '{$makehoach}' AND theodoikehoach.manhanvien = '{$manhanvien}' AND theodoikehoach.machitieu = '{$machitieu}' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";

    $result = $conn->query($sql)->fetch_assoc();

    if (empty($result['TONGDATDUOC'])) {
        $result['TONGDATDUOC'] = 0;
    }

    return $result['TONGDATDUOC'];
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/styles.css" />
    <title>Quan Ly Nhan Su</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-statistical bg-success">
                        <div class="card-body card-statistical__body">
                            <div class="card-statistical__left">
                                <span class="card-statistical__icon">
                                    <i class="fa-solid fa-users-line"></i>
                                </span>
                                <p class="card-statistical__name">TỔNG KẾ HOẠCH</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">
                                    <?php
                                    if ($profile['level'] == "3") {
                                        $sql_tongkehoach = "SELECT COUNT(kehoachgiaoviec.makehoach) TONGKEHOACH
                                        FROM kehoachgiaoviec
                                        WHERE kehoachgiaoviec.makhuvuc = '" . $bophan['makhuvuc'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    } elseif ($profile['level'] == "2") {
                                        $sql_tongkehoach = "SELECT COUNT(kehoachgiaoviec.makehoach) TONGKEHOACH
                                        FROM kehoachgiaoviec
                                        WHERE kehoachgiaoviec.mabophan = '" . $bophan['mabophan'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    } else {
                                        $sql_tongkehoach = "SELECT COUNT(chitietkehoach.makehoach) TONGKEHOACH
                                        FROM kehoachgiaoviec, chitietkehoach
                                        WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = '" . $profile['manhanvien'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    }

                                    //echo $sql_tongkehoach;
                                    $TONGKEHOACH =  $ketnoi->query($sql_tongkehoach)->fetch_array();
                                    echo $TONGKEHOACH['TONGKEHOACH'];


                                    ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-statistical bg-info">
                        <div class="card-body card-statistical__body">
                            <div class="card-statistical__left">
                                <span class="card-statistical__icon">
                                    <i class="fa-solid fa-money-bill-trend-up"></i>
                                </span>
                                <p class="card-statistical__name">Chỉ tiêu cần đạt</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">


                                    <?php
                                    if ($profile['level'] == "3") {
                                        $sql_chitieucandat = "SELECT COUNT(chitietkehoach.machitieu) TONGCHITIEU, kehoachgiaoviec.thoigianbatdau
                                        FROM kehoachgiaoviec, chitietkehoach
                                        WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.makhuvuc = '" . $bophan['makhuvuc'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    } elseif ($profile['level'] == "2") {
                                        $sql_chitieucandat = "SELECT COUNT(chitietkehoach.machitieu) TONGCHITIEU, kehoachgiaoviec.thoigianbatdau
                                        FROM kehoachgiaoviec, chitietkehoach
                                        WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.mabophan = '" . $bophan['mabophan'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    } else {
                                        $sql_chitieucandat = "SELECT COUNT(chitietkehoach.machitieu) TONGCHITIEU, kehoachgiaoviec.thoigianbatdau
                                        FROM kehoachgiaoviec, chitietkehoach
                                        WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = '" . $profile['manhanvien'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    }

                                    //echo $sql_chitieucandat;
                                    $chitieucandat =  $ketnoi->query($sql_chitieucandat)->fetch_array();
                                    echo $chitieucandat['TONGCHITIEU'];


                                    ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-statistical bg-info">
                        <div class="card-body card-statistical__body">
                            <div class="card-statistical__left">
                                <span class="card-statistical__icon">
                                    <i class="fa-solid fa-users-line"></i>
                                </span>
                                <p class="card-statistical__name">Tổng chỉ tiêu đã đạt</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">



                                    <?php
                                    if ($profile['level'] == "3") {
                                        $sql_chitieudadat = "SELECT kehoachgiaoviec.makehoach, chitietkehoach.manhanvien, chitietkehoach.machitieu, chitietkehoach.chitieucandat
                                            FROM kehoachgiaoviec, chitietkehoach
                                            WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.makhuvuc = '" . $bophan['makhuvuc'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    } elseif ($profile['level'] == "2") {
                                        $sql_chitieudadat = "SELECT kehoachgiaoviec.makehoach, chitietkehoach.manhanvien, chitietkehoach.machitieu, chitietkehoach.chitieucandat
                                            FROM kehoachgiaoviec, chitietkehoach
                                            WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.mabophan = '" . $bophan['mabophan'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    } else {
                                        $sql_chitieudadat = "SELECT kehoachgiaoviec.makehoach, chitietkehoach.manhanvien, chitietkehoach.machitieu, chitietkehoach.chitieucandat
                                            FROM kehoachgiaoviec, chitietkehoach
                                            WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = '" . $profile['manhanvien'] . "' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))";
                                    }


                                    $tongchitieudadat = [];

                                    //echo $sql_chitieudadat;
                                    $result =  $ketnoi->query($sql_chitieudadat);

                                    while($row = $result->fetch_assoc()) {
                                        $tongchitieudadat[] = $row;
                                    }
                                    //echo $tongchitieudadat['TONGCHITIEU'];
                                    //print_r($tongchitieudadat);

                                    
                                    $cc = 0;
                                    foreach ($tongchitieudadat as $item){
                                        if($item['chitieucandat'] <= ham_get_chitieudadat($conn, $item['makehoach'], $item['manhanvien'], $item['machitieu'])){
                                            $cc++;
                                        }

                                    }
                                    echo $cc;
                                    ?>



                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="news">
                        <marquee direction="up" style="max-height: 80%" onmouseover="this.stop()" onmouseout="this.start()">
                            <div class="news__item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../asset/img/news/ky-niem-28-nam-thanh-lap-dtsoft-27-03-1995-27-03-20231679905549.jpg" alt="" class="news__img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="news__content">
                                            <p class="news__des">
                                                Kỷ niệm 28 năm thành lập DTSoft (27/03/1995 - 27/03/2023)
                                            </p>
                                            <a href="" class="news__link">
                                                <i class="fa-solid fa-angles-right"></i>
                                                Xem thêm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="news__item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../asset/img/news/ky-niem-28-nam-thanh-lap-dtsoft-27-03-1995-27-03-20231679905549.jpg" alt="" class="news__img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="news__content">
                                            <p class="news__des">
                                                Kỷ niệm 28 năm thành lập DTSoft (27/03/1995 - 27/03/2023)
                                            </p>
                                            <a href="" class="news__link">
                                                <i class="fa-solid fa-angles-right"></i>
                                                Xem thêm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="news__item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../asset/img/news/ky-niem-28-nam-thanh-lap-dtsoft-27-03-1995-27-03-20231679905549.jpg" alt="" class="news__img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="news__content">
                                            <p class="news__des">
                                                Kỷ niệm 28 năm thành lập DTSoft (27/03/1995 - 27/03/2023)
                                            </p>
                                            <a href="" class="news__link">
                                                <i class="fa-solid fa-angles-right"></i>
                                                Xem thêm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="news__item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../asset/img/news/ky-niem-28-nam-thanh-lap-dtsoft-27-03-1995-27-03-20231679905549.jpg" alt="" class="news__img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="news__content">
                                            <p class="news__des">
                                                Kỷ niệm 28 năm thành lập DTSoft (27/03/1995 - 27/03/2023)
                                            </p>
                                            <a href="" class="news__link">
                                                <i class="fa-solid fa-angles-right"></i>
                                                Xem thêm
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </marquee>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="plan">
                        <h4 class="plan__title">Theo dõi kế hoạch</h4>
                        <p class="plan__des">Các hoạt động gần đây trên tất cả các dự án</p>

                        <?php

                        // Thực hiện truy vấn bảng theo dõi kế hoạch
                        if ($profile['level'] == "3") {
                            $sql = "SELECT kehoachgiaoviec.makehoach, thoigiandukien, bophan.tenbophan, motakehoach
                            FROM kehoachgiaoviec, chitietkehoach, bophan
                            WHERE bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.makhuvuc = '" . $bophan['makhuvuc'] . "'
                            GROUP BY kehoachgiaoviec.makehoach
                            ORDER BY kehoachgiaoviec.thoigiandukien DESC
                            LIMIT 0, 5";
                        }elseif ($profile['level'] == "2") {
                            $sql = "SELECT kehoachgiaoviec.makehoach, thoigiandukien, bophan.tenbophan, motakehoach
                            FROM kehoachgiaoviec, chitietkehoach, bophan
                            WHERE bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.mabophan = '" . $bophan['mabophan'] . "'
                            GROUP BY kehoachgiaoviec.makehoach
                            ORDER BY kehoachgiaoviec.thoigiandukien DESC
                            LIMIT 0, 5";
                        }else{

                        $sql = "SELECT kehoachgiaoviec.makehoach, thoigiandukien, bophan.tenbophan, motakehoach
                            FROM kehoachgiaoviec, chitietkehoach, bophan
                            WHERE bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = '".$profile["manhanvien"]."'
                            GROUP BY kehoachgiaoviec.makehoach
                            ORDER BY kehoachgiaoviec.thoigiandukien DESC
                            LIMIT 0, 5";
                        }
                        $result = mysqli_query($ketnoi, $sql);

                        //$arr_theodoikehoach;
                        // Lấy dữ liệu
                        while ($row = mysqli_fetch_array($result)) {
                            
                            //$arr_theodoikehoach[] = $row;




                        ?>

                            <div class="plan-item">
                                <div class="row">
                                    <div class="col-md-3 d-flex justify-content-between">
                                        <div class="plan-item__timedate">
                                            <p class="lh-sm">
                                                <?= $row['thoigiandukien'] ?>
                                            </p>
                                        </div>
                                        <div class="plan-item__timeline-bar">
                                            <span class="plan-item__icon"><i class="fa-regular fa-calendar-plus"></i></span>
                                            <span class="plan-item__line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 ps-4">
                                        <p class="plan-item__title">
                                            <?= $row['tenbophan'] ?>
                                        </p>
                                        <p class="plan-item__des">
                                            <?= $row['motakehoach'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        <?php


                        }

                        ?>

                        <!--
                        <div class="plan-item">
                            <div class="row">
                                <div class="col-md-3 d-flex justify-content-between">
                                    <div class="plan-item__timedate">
                                        <p class="lh-sm">
                                            15 DEC, 2023 </br>
                                            10:30 AM
                                        </p>
                                    </div>
                                    <div class="plan-item__timeline-bar">
                                        <span class="plan-item__icon"><i class="fa-regular fa-calendar-plus"></i></span>
                                        <span class="plan-item__line"></span>
                                    </div>
                                </div>
                                <div class="col-md-9 ps-4">
                                    <p class="plan-item__title">
                                        Assigned as a director for Project The Chewing Gum Attack
                                        by <a href="" class="text-decoration-none">Shantinon Mekalan</a>
                                    </p>
                                    <p class="plan-item__des">
                                        Utilizing best practices to better leverage our assets, we must engage in black sky leadership thinking, not the usual band-aid solution.
                                    </p>
                                </div>
                            </div>
                        </div>
                        -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Bootstrap bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Chart js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Main JS -->
<script src="../asset/js/main.js"></script>

</html>