<?php
require_once('../admin/config.php');
if (!isset($_SESSION['username'])) {
    header("location: ./login.php");
}


    // //echo $chucvu['machucvu'];
    // if($chucvu['machucvu'] == 'C2' || $chucvu['machucvu'] == 'C3') {
    //     // echo "<script>window.location:\"/pages/index.php\";</script>";
    //     // header("location: ../");
    // }


    if($chucvu["machucvu"] == "C3" || $chucvu["machucvu"] == "C2"){
        header("location: ..//pages/content_index.php");
    }
$query = $conn->query(
    "SELECT DISTINCT `kehoachgiaoviec`.`motakehoach`, `nhanvien`.`manhanvien`, `nhanvien`.`hoten`, `kehoachgiaoviec`.`makehoach`, `kehoachgiaoviec`.`thoigianbatdau`, `kehoachgiaoviec`.`thoigiandukien`, bophan.tenbophan
        FROM `chitietkehoach`, `nhanvien`, `kehoachgiaoviec`, bophan
        WHERE `kehoachgiaoviec`.`makehoach` = `chitietkehoach`.`makehoach` 
        AND `chitietkehoach`.`manhanvien` = `nhanvien`.`manhanvien` 
        AND `nhanvien`.`manhanvien` = '{$profile['manhanvien']}' AND kehoachgiaoviec.mabophan = bophan.mabophan"
);

//================================================================
//================================================================


//================================================================
//================================================================


if (isset($_POST['submit-add']) && $_POST['submit-add']) {



    $plan_code = $_POST['makehoach'];
    $month = date('n');
    $err = '';

    $machitieu = isset($_POST['machitieu']) ? $_POST['machitieu'] : array();
    $chitieu = isset($_POST['chitieu']) ? $_POST['chitieu'] : array();
    $count = 0;

    $sql1 = "SELECT theodoikehoach.chitieuthangdatduoc
            FROM theodoikehoach
            WHERE theodoikehoach.makehoach = '{$plan_code}' AND theodoikehoach.manhanvien = '{$profile['manhanvien']}' AND theodoikehoach.thang = '{$month}'";

    $res1 = $conn->query($sql1);

    if($res1 -> num_rows > 0) {
        $is_update = false;

       for($i = 0; $i < count($machitieu); $i++) {
            $sql_update = "UPDATE `theodoikehoach` SET `chitieuthangdatduoc`='{$chitieu[$i]}' WHERE makehoach = '{$plan_code}' AND manhanvien = '{$profile['manhanvien']}' AND machitieu = '{$machitieu[$i]}' AND thang = '{$month}'";

            $res2 = mysqli_query($conn, $sql_update);
            if ($res2) {
                $is_update = true;
            } else {
                $is_update = false;
            }
        }

        if ($is_update == true) {
            echo "<script>alert('Cập nhật thành công')</script>";
            header("Refresh:0");
        } else {
            echo "Error: " . $res2 . "<br>" . mysqli_error($conn);
        }
    } else {
        $is_insert = false;

        for($j = 0; $j< count($machitieu); $j++) {
            $sql = "INSERT INTO `theodoikehoach`(`makehoach`, `manhanvien`, `machitieu`, `thang`, `chitieuthangdatduoc`)
            VALUES ('{$plan_code}','{$profile['manhanvien']}','{$machitieu[$j]}','{$month}','{$chitieu[$j]}')";

            $res = mysqli_query($conn, $sql);
            if ($res) {
                $is_insert = true;
            } else {
                $is_insert = false;
            }
        }

        if ($is_insert) {
            echo "<script>alert('Thêm thành công')</script>";
            header("Refresh:0");
        } else {
            echo "Error: " . $res . "<br>" . mysqli_error($conn);
        }
    }   
}


//================================================================
//================================================================
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/style_target-month-detail.css" />
    <title>Quan Ly Nhan Su</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-flud">
            <div class="row header">
                <h2 class="header__title">
                    Báo cáo nhiệm vụ <span> Tháng <?= date("n") . '/' . date("Y") ?> </span>
                </h2>
            </div>

            <div class="row content">
                <div class="col-md-6">
                    <div class="content-detail">
                        <h4 class="content__title">Mã nhân viên:</h4>
                        <p class="content__desc" name="manhanvien"><?= $profile['manhanvien'] ?></p>
                    </div>

                    <div class="content-detail">
                        <h4 class="content__title">Tên nhân viên:</h4>
                        <p class="content__desc"><?= $profile['hoten'] ?></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="content-detail details">
                        <h4 class="content__title">Mã kế hoạch:</h4>
                        <select class="content__desc desc" name="makehoach" form="form-baocaothang" id="select-makehoach">
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $row['makehoach'] ?>" name="makehoach"><?= $row['makehoach'] . ' - ' . $row['tenbophan'] ?></option>
                            <?php } ?>

                        </select>
                    </div>

                </div>
            </div>

            <div class="row form-report">
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn_report" name="submit-add" value="submit" form="form-baocaothang">
                    Xác nhận
                </button>
            </div>

            <form id="form-baocaothang" action="" method="POST"></form>
        </div>
    </div>

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- DataTables plugins jquery -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Chart js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>

    <script>
        const listChiTieu = document.querySelector('.form-report');

        $('#select-makehoach').change(function(e) {
            const makehoach = $(this).val();

            $.ajax({
                    url: 'content_report_ajax.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        makehoach: makehoach
                    },
                }).done(function(response) {

                    const danhSachChiTieu = response.danhsachchitieu;

                    let html = danhSachChiTieu.map((item, index) => {
                    let value = item.chitieuthangdatduoc === undefined ? '' : item.chitieuthangdatduoc;

                        return `<div class="col-md-6">
                                    <div class="report__input">
                                        <div class="form-floating report__form">
                                            <input type="hidden" name="machitieu[]" value="${item.machitieu}" form="form-baocaothang">
                                            <input class="form-control report__form-control" placeholder="Nhập vào doanh số" id="floatingTextarea" name="chitieu[]" value="${value}" form="form-baocaothang">
                                            </input>
                                            <label for="floatingTextarea">${item.tenchitieu}</label>
                                        </div>
                                    </div>
                                </div>`;
                    });

                    listChiTieu.innerHTML = html.join('');

                })
        })

        $(document).ready(function(e) {
            const makehoach = $('#select-makehoach').val();

            $.ajax({
                    url: 'content_report_ajax.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        makehoach: makehoach
                    },
                }).done(function(response) {

                    const danhSachChiTieu = response.danhsachchitieu;

                    let html = danhSachChiTieu.map((item, index) => {
                    let value = item.chitieuthangdatduoc === undefined ? '' : item.chitieuthangdatduoc;

                        return `<div class="col-md-6">
                                    <div class="report__input">
                                        <div class="form-floating report__form">
                                            <input type="hidden" name="machitieu[]" value="${item.machitieu}" form="form-baocaothang">
                                            <input class="form-control report__form-control" placeholder="Nhập vào doanh số" id="floatingTextarea" name="chitieu[]" value="${value}" form="form-baocaothang">
                                            </input>
                                            <label for="floatingTextarea">${item.tenchitieu}</label>
                                        </div>
                                    </div>
                                </div>`;
                    });

                    listChiTieu.innerHTML = html.join('');

                })
        })
    </script>

    <script>

    </script>
</body>

</html>