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

    <!-- Slick slide -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/styles.css" />
    <title>Quan Ly Nhan Su</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row pt-3">
                <div class="col-md-4">
                    <div class="card card-statistical bg-info">
                        <div class="card-body card-statistical__body">
                            <div class="card-statistical__left">
                                <span class="card-statistical__icon">
                                    <i class="fa-sharp fa-solid fa-list-check"></i>
                                </span>
                                <p class="card-statistical__name">TỔNG KẾ HOẠCH</p>
                            </div>
                            <div class="card-statistical__right">
                                <p class="card-statistical__total">
                                    <?php
                                    if ($profile['level'] == "3") {
                                        $sql_tongkehoach = "SELECT COUNT(kehoachgiaoviec.makehoach) TONGKEHOACH
                                                            FROM kehoachgiaoviec
                                                            WHERE kehoachgiaoviec.makhuvuc = '{$bophan['makhuvuc']}' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))
                                                            ";
                                        
                                    } elseif ($profile['level'] == "2") {
                                        $sql_tongkehoach = "SELECT COUNT(kehoachgiaoviec.makehoach) TONGKEHOACH
                                                            FROM kehoachgiaoviec
                                                            WHERE kehoachgiaoviec.mabophan = '{$bophan['mabophan']}' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))
                                                            ";
                                    } else {
                                        $sql_tongkehoach = "SELECT COUNT(chitietkehoach.makehoach) TONGKEHOACH
                                                            FROM kehoachgiaoviec, chitietkehoach
                                                            WHERE kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = '{$profile['manhanvien']}' AND (YEAR(kehoachgiaoviec.thoigianbatdau) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigianketthuc) = YEAR(NOW()) OR YEAR(kehoachgiaoviec.thoigiandukien) = YEAR(NOW()))
                                                            GROUP BY chitietkehoach.machitieu";
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
                    <div class="card card-statistical bg-danger">
                        <div class="card-body card-statistical__body">
                            <div class="card-statistical__left">
                                <span class="card-statistical__icon">
                                    <i class="fa-solid fa-arrow-up-right-dots"></i>
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
                    <div class="card card-statistical bg-success">
                        <div class="card-body card-statistical__body">
                            <div class="card-statistical__left">
                                <span class="card-statistical__icon">
                                    <i class="fa-solid fa-clipboard-check"></i>
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

                                    while ($row = $result->fetch_assoc()) {
                                        $tongchitieudadat[] = $row;
                                    }
                                    //echo $tongchitieudadat['TONGCHITIEU'];
                                    //print_r($tongchitieudadat);


                                    $cc = 0;
                                    foreach ($tongchitieudadat as $item) {
                                        if ($item['chitieucandat'] <= ham_get_chitieudadat($conn, $item['makehoach'], $item['manhanvien'], $item['machitieu'])) {
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
                <!-- <div class="col-md-6 mt-4">
                    
                    <canvas id="canvas"></canvas>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                
                </div> -->
                <div class="col-md-7">
                    <div class="slide-container">
                        <div class="slide-item">
                            <img src="../asset/img/slide/dich-vu-bao-tri-dtsoft1618533857.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="slide-item">
                            <img src="../asset/img/slide/dtsoft-phan-mem-hieu-qua1637805824.png" alt="" class="img-fluid">
                        </div>
                        <div class="slide-item">
                            <img src="../asset/img/slide/he-thong-bao-cao-chi-tieu-kinh-te-xa-hoi-dia-phuong1656730477.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="slide-item">
                            <img src="../asset/img/slide/phan-mem-quan-ly-thu-chi-hoc-sinh1655713771.jpg" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
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
                            LIMIT 0, 4";
                        } elseif ($profile['level'] == "2") {
                            $sql = "SELECT kehoachgiaoviec.makehoach, thoigiandukien, bophan.tenbophan, motakehoach
                            FROM kehoachgiaoviec, chitietkehoach, bophan
                            WHERE bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.mabophan = '" . $bophan['mabophan'] . "'
                            GROUP BY kehoachgiaoviec.makehoach
                            ORDER BY kehoachgiaoviec.thoigiandukien DESC
                            LIMIT 0, 4";
                        } else {

                            $sql = "SELECT kehoachgiaoviec.makehoach, thoigiandukien, bophan.tenbophan, motakehoach
                            FROM kehoachgiaoviec, chitietkehoach, bophan
                            WHERE bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = '" . $profile["manhanvien"] . "'
                            GROUP BY kehoachgiaoviec.makehoach
                            ORDER BY kehoachgiaoviec.thoigiandukien DESC
                            LIMIT 0, 4";
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Chart js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Slick slide -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.js"></script>

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>

    <script>
        $('.slide-container').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-chevron-right"></i></button>'
        });

    </script>
</body>

<script>
    const data = {
        labels: [
            <?php
            $sql_tongnv =  "SELECT tenbophan,count(*) FROM  `nhanvien`, bophan where nhanvien.mabophan = bophan.mabophan and bophan.makhuvuc = '" . $bophan['makhuvuc'] . "' GROUP BY nhanvien.mabophan ";
            $result_tongnv = mysqli_query($ketnoi, $sql_tongnv);

            $string = "";
            while ($row = mysqli_fetch_array($result_tongnv)) {
                $string = $string . "'" . $row['tenbophan'] . "'";
                $string = $string . ",";
            }

            echo trim($string, ",");
            ?>
        ],
        datasets: [{
            label: 'Tổng nhân viên',
            data: [
                <?php
                $count_bophan = $ketnoi->query("SELECT tenbophan,count(*) FROM  `nhanvien`, bophan where nhanvien.mabophan = bophan.mabophan and bophan.makhuvuc = '" . $bophan['makhuvuc'] . "' GROUP BY nhanvien.mabophan ");
                $num_rows = $count_bophan->num_rows;
                $count = 0;

                while ($row = $count_bophan->fetch_array()) {
                    echo $row['count(*)'];

                    $count++;
                    if ($count < $num_rows) {
                        echo ",";
                    }
                }
                ?>
            ],
            backgroundColor: [
                '#F56F2F',
                '#F75E54',
                '#E058B5',
                '#C554F7',
                '#7151ED',
                '#AAF54D',
                '#F7B454',
                '#E058B5',
                '#5483F7',
                '#51ED76',
                '#0000FF',
                '#A52A2A',
                '#DEB887',
                '#5F9EA0',
                '#D2691E',
                '#FF7F50',
                '#6495ED',
                '#FFF8DC',
                '#00008B',
                '#F0F8FF'
            ],
            hoverOffset: 4,

        }]
    }
    const config = {
        type: 'pie',
        data: data,
    }

    const canvas = document.getElementById('canvas')
    const chart = new Chart(canvas, config)
</script>

</html>