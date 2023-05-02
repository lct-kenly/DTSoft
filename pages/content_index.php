<?php
require_once('../admin/config.php');




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
                                <p class="card-statistical__name">Nhân viên</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">80</p>
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
                                <p class="card-statistical__name">Doanh thu</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">$1M</p>
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
                                <p class="card-statistical__name">Nhân viên</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">80</p>
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
                        $sql = "SELECT * FROM theodoikehoach ORDER BY makehoach DESC LIMIT 5";
                        $result = mysqli_query($ketnoi, $sql);

                        // Lấy dữ liệu
                        while ($row = mysqli_fetch_array($result)) {
                            $makehoach = $row[0];
                            $manhanvien = $row[1];
                            $machitieu = $row[2];
                            $thang = $row[3];
                            $chitieuthangcandat = $row[4];

                            $sql_kehoach = "SELECT `thoigianbatdau`,`motakehoach`,`mabophan` FROM `kehoachgiaoviec` WHERE `makehoach` = '" . $makehoach . "'";
                            $result_kehoach = mysqli_query($ketnoi, $sql_kehoach);
                            $row_kehoach = mysqli_fetch_array($result_kehoach);
                            $thoigianbatdau = $row_kehoach["thoigianbatdau"];
                            $motakehoach = $row_kehoach["motakehoach"];
                            $mabophan = $row_kehoach["mabophan"];

                            $sql_bophan = "SELECT `tenbophan` FROM `bophan` WHERE `mabophan` = '" . $mabophan . "'";
                            $result_bophan = mysqli_query($ketnoi, $sql_bophan);
                            $row_bophan = mysqli_fetch_array($result_bophan);
                            $tenbophan = $row_bophan["tenbophan"];


                        ?>

                            <div class="plan-item">
                                <div class="row">
                                    <div class="col-md-3 d-flex justify-content-between">
                                        <div class="plan-item__timedate">
                                            <p class="lh-sm">
                                                <?=$thoigianbatdau?>
                                            </p>
                                        </div>
                                        <div class="plan-item__timeline-bar">
                                            <span class="plan-item__icon"><i class="fa-regular fa-calendar-plus"></i></span>
                                            <span class="plan-item__line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 ps-4">
                                        <p class="plan-item__title">
                                            <?=$tenbophan?>
                                        </p>
                                        <p class="plan-item__des">
                                        <?=$motakehoach?>
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