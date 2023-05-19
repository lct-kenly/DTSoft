<?php
    require_once('../admin/config.php');
    if (!isset($_SESSION['username'])) {
        header("location: ./login.php");
    }

    $error = array();

    function tongdatduoctungchitieu($conn, $makehoach, $machitieu)
    {

        $sql = "SELECT SUM(theodoikehoach.chitieuthangdatduoc) AS TONG
                FROM theodoikehoach
                WHERE makehoach = '{$makehoach}' AND machitieu = '{$machitieu}'";

        $tong = $conn->query($sql)->fetch_assoc();

        if (empty($tong['TONG'])) {
            $tong = 0;
        } else {
            $tong = $tong['TONG'];
        }

        return $tong;
    }

    function tongchitieunhanvien($conn, $makehoach, $manhanvien, $machitieu)
    {
        $sql = "SELECT SUM(theodoikehoach.chitieuthangdatduoc) AS TONG
                FROM theodoikehoach
                WHERE makehoach = '{$makehoach}' AND manhanvien = '{$manhanvien}' AND machitieu = '{$machitieu}'";

        $tong = $conn->query($sql)->fetch_assoc();

        if (empty($tong['TONG'])) {
            $tong = 0;
        } else {
            $tong = $tong['TONG'];
        }

        return $tong;
    }

    function mucdohoanthanh($mucdo)
    {
        $str = '';

        if ($mucdo > 100) {
            $str = 'Đạt';
        } else if ($mucdo > 75) {
            $str = 'Chưa đạt';
        } else {
            $str = 'Không đạt';
        }

        return $str;
    }

    function check_danh_gia($conn, $makehoach)
{

    $sql = "SELECT * FROM danhgiakehoach WHERE makehoach = '{$makehoach}'";

    $result = $conn->query($sql);

    return $result->num_rows;
}

    $makehoach = isset($_GET['makehoach']) ? $_GET['makehoach'] : '';

    $plan = array();
    $chitieukehoach = array();
    $nhanvien = array();
    $ketquadanhgia = array();

    if (!empty($makehoach)) {
        $sql_get_plan = "SELECT khuvuc.makhuvuc, khuvuc.tenkhuvuc, bophan.mabophan, bophan.tenbophan, kehoachgiaoviec.makehoach, kehoachgiaoviec.thoigianbatdau, kehoachgiaoviec.thoigiandukien, kehoachgiaoviec.thoigianketthuc
                            FROM khuvuc, bophan, kehoachgiaoviec, chitietkehoach
                            WHERE kehoachgiaoviec.makhuvuc = khuvuc.makhuvuc AND bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND kehoachgiaoviec.makehoach = '{$makehoach}'";

        $plan = $conn->query($sql_get_plan)->fetch_assoc();

        //
        $sql_chi_tieu = "SELECT chitieu.machitieu, chitieu.tenchitieu, SUM(chitieucandat) AS TONGCANDAT
                        FROM chitietkehoach, chitieu
                        WHERE chitietkehoach.machitieu = chitieu.machitieu AND chitietkehoach.makehoach = '{$makehoach}'
                        GROUP BY chitieu.machitieu";

        $result_chi_tieu = $conn->query($sql_chi_tieu);

        while ($row = $result_chi_tieu->fetch_assoc()) {
            $chitieukehoach[] = $row;
        }

        //
        $sql_nhan_vien = "SELECT nhanvien.manhanvien, nhanvien.hoten, chitieu.machitieu, chitieu.tenchitieu, chitietkehoach.chitieucandat
                        FROM nhanvien, chitieu, chitietkehoach
                        WHERE nhanvien.manhanvien = chitietkehoach.manhanvien AND chitietkehoach.machitieu = chitieu.machitieu AND chitietkehoach.makehoach = '{$makehoach}'";

        $result_nhan_vien = $conn->query($sql_nhan_vien);

        while ($row = $result_nhan_vien->fetch_assoc()) {
            $nhanvien[] = $row;
        }

        //
        $sql_danh_gia = "SELECT nhanvien.hoten, bophan.tenbophan, chucvu.tenchucvu, danhgiakehoach.ketqua, danhgiakehoach.noi_dung_chi_tiet
                         FROM bophan, chucvu, nhanvien, danhgiakehoach, thoigiannhanchuc
                         WHERE bophan.mabophan = nhanvien.mabophan AND nhanvien.manhanvien = thoigiannhanchuc.manhanvien AND thoigiannhanchuc.machucvu = chucvu.machucvu AND nhanvien.manhanvien = danhgiakehoach.nguoi_danh_gia AND danhgiakehoach.makehoach = '{$makehoach}'";

        $result_danh_gia = $conn->query($sql_danh_gia);

        while ($row = $result_danh_gia->fetch_assoc()) {
            $ketquadanhgia[] = $row;
        }

    }


    //
    if(isset($_POST['evaluate-submit']) && $_POST['evaluate-submit'] == 'submit') {
        $evaluate = isset($_POST['evaluate']) ? $_POST['evaluate'] : '';
        $evaluate_detail = isset($_POST['evaluate-detail']) ? $_POST['evaluate-detail'] : '';

        if(!empty($evaluate)) {

            $sql = "SELECT * FROM danhgiakehoach WHERE makehoach = '{$makehoach}' AND nguoi_danh_gia = '{$profile['manhanvien']}'";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                $sql_update_evaluate = "UPDATE `danhgiakehoach` SET `ketqua`='{$evaluate}',`noi_dung_chi_tiet`='{$evaluate_detail}' WHERE makehoach = '{$makehoach}' AND nguoi_danh_gia = '{$profile['manhanvien']}'";

                if($conn->query($sql_update_evaluate)) {
                    echo '<script> alert("Cập nhật kết quả đánh giá thành công!"); </script>';
                    header("Refresh:0");
                } else {
                    echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
                }
            } else {
                $sql_insert_evaluate = "INSERT INTO `danhgiakehoach`(`makehoach`, `nguoi_danh_gia`, `ketqua`, `noi_dung_chi_tiet`) VALUES ('{$makehoach}','{$profile['manhanvien']}','{$evaluate}','{$evaluate_detail}')";

                if($conn->query($sql_insert_evaluate)) {
                    echo '<script> alert("Đánh giá kế hoạch thành công!"); </script>';
                    header("Refresh:0");
                } else {
                    echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
                }
            }

        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- DataTables plugins jquery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/style_content_evaluate_detail.css" />

    <title>Quan Ly Nhan Su</title>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid p-0">
            <div class="evaluate-detail-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="evaluate-detail-content__header">
                            <h2 class="header__title ms-0">
                                Chi tiết đánh giá kế hoạch
                            </h2>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <p class="fs-4">
                                        <span class="fw-bold">Mã kế hoạch:</span>
                                        <span class="ms-2"><?= $plan['makehoach'] ?>
                                            <?php 
                                                if(check_danh_gia($conn, $makehoach) <= 0) {
                                                    echo '<span class="badge bg-danger"> Chưa đánh giá </span>';
                                                } else {
                                                    echo '<span class="badge bg-success"> Đã đánh giá </span>';
                                                }
                                            ?>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="text-center fs-4">
                                        <span class="fw-bold">Khu vực:</span>
                                        <span class="ms-2"><?= $plan['tenkhuvuc'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="text-end fs-4">
                                        <span class="fw-bold">Bộ phận:</span>
                                        <span class="ms-2"><?= $plan['tenbophan'] ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <p class="fs-4">
                                        <span class="fw-bold">Thời gian bắt đầu:</span>
                                        <span class="ms-2"><?= $plan['thoigianbatdau'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p class="text-center fs-4">
                                        <span class="fw-bold">Thời gian kết thúc dự
                                            kiến:</span>
                                        <span class="ms-2"><?= $plan['thoigiandukien'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p class="text-end fs-4">
                                        <span class="fw-bold">Thời gian kết thúc:</span>
                                        <span class="ms-2"><?= $plan['thoigianketthuc'] ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="evaluate-detail-content__body">
                            <table id="evaluate-detail-table" class="table table-bordered display evaluate-detail-content__table-staff">
                                <caption class="mt-4 text-center">
                                    Tổng chỉ tiêu đề ra cho kế hoạch
                                </caption>
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Tên chỉ tiêu</th>
                                        <th scope="col">
                                            Tổng chỉ tiêu cần đạt
                                        </th>
                                        <th scope="col">
                                            Tổng chỉ tiêu đạt được
                                        </th>
                                        <th scope="col">
                                            Mức độ hoàn thành
                                        </th>
                                        <th scope="col">Đánh giá</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php foreach ($chitieukehoach as $item) {
                                        $tongdatduoc = tongdatduoctungchitieu($conn, $makehoach, $item['machitieu']);
                                        $mucdo = ($tongdatduoc * 100 / $item['TONGCANDAT']);

                                        $tongdatduoc = number_format($tongdatduoc, 0, ',', '.')
                                    ?>
                                        <tr>
                                            <th><?= $item['tenchitieu'] ?></th>
                                            <td><?= number_format($item['TONGCANDAT'], 0, ',', '.') ?></td>
                                            <td><?= $tongdatduoc ?></td>
                                            <td><?= round($mucdo, 2) ?>%</td>
                                            <td><?= mucdohoanthanh($mucdo) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <div class="d-flex align-items-center justify-content-center" style="margin: 36px 0;">
                                <p class="w-50 bg-dark border border-2"></p>
                            </div>

                            <table id="evaluate-detail-table-list-staff" class="table table-bordered display evaluate-detail-content__table-staff">
                                <caption class="mt-4 text-center">
                                    Danh sách nhân viên thuộc kế hoạch
                                </caption>
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Tên nhân viên</th>
                                        <th scope="col">Tên chỉ tiêu</th>
                                        <th scope="col">
                                            Chỉ tiêu cần đạt
                                        </th>
                                        <th scope="col">
                                            Chỉ tiêu đạt được
                                        </th>
                                        <th scope="col">
                                            Mức độ hoàn thành
                                        </th>
                                        <th scope="col">Đánh giá</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php foreach ($nhanvien as $item) {
                                        $tong_chi_tieu_tung_nhan_vien = tongchitieunhanvien($conn, $makehoach, $item['manhanvien'], $item['machitieu']);

                                        $mucdo = ($tong_chi_tieu_tung_nhan_vien / $item['chitieucandat']) * 100;

                                        $tong_chi_tieu_tung_nhan_vien = number_format($tong_chi_tieu_tung_nhan_vien, 0, ',', '.');
                                    ?>
                                        <tr>
                                            <th><?= $item['hoten'] ?></th>
                                            <th><?= $item['tenchitieu'] ?></th>
                                            <td><?= number_format($item['chitieucandat'], 0, ',', '.') ?></td>
                                            <td><?= $tong_chi_tieu_tung_nhan_vien ?></td>
                                            <td><?= round($mucdo, 2) ?>%</td>
                                            <td><?= mucdohoanthanh($mucdo) ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <div class="d-flex align-items-center justify-content-center" style="margin: 36px 0;">
                                <p class="w-50 bg-dark border border-2"></p>
                            </div>

                            <?php if(!empty($ketquadanhgia)) { ?>
                                <table id="evaluate-detail-table-list-staff" class="table table-bordered display evaluate-detail-content__table-staff">
                                    <caption class="mt-4 text-center">
                                        Kết quả đánh giá kế hoạch
                                    </caption>
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Người đánh giá</th>
                                            <th scope="col">Bộ phận</th>
                                            <th scope="col">
                                                Chức vụ
                                            </th>
                                            <th scope="col">
                                                Kết quả đánh giá
                                            </th>
                                            <th scope="col">
                                                Mô tả chi tiết
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <?php foreach ($ketquadanhgia as $item) {?>
                                            <tr>
                                                <th><?= $item['hoten'] ?></th>
                                                <th><?= $item['tenbophan'] ?></th>
                                                <td><?= $item['tenchucvu'] ?></td>
                                                <td><?= $item['ketqua'] ?></td>
                                                <td><?= $item['noi_dung_chi_tiet'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                

                            <?php }?>

                        </div>

                        <div class="d-flex align-items-center justify-content-center" style="margin: 36px 0;">
                            <p class="w-50 bg-dark border border-2"></p>
                        </div>
                        

                        <?php if($macv == 'C2' || $macv == 'C3') { ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="fs-2 fw-bold text-secondary">
                                        Đánh giá tổng thể kế hoạch
                                    </h3>

                                    <form class="form-evaluate" action="" method="POST">
                                        <div class="mb-3 d-flex align-items-center">
                                            <label for="exampleInputEmail1" class="form-label">Đánh giá mức độ: </label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="evaluate" value="Đạt" id="dat" checked>
                                                <label class="form-check-label" for="dat">
                                                    Đạt
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="evaluate" value="Chưa đạt" id="chuadat">
                                                <label class="form-check-label" for="chuadat">
                                                    Chưa đạt
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="evaluate" value="Không đạt" id="khongdat">
                                                <label class="form-check-label" for="khongdat">
                                                    Không đạt
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Đánh giá chi tiết</label>
                                            <textarea name="evaluate-detail" id="" cols="30" rows="10" class="form-control mt-3"></textarea>
                                            <span class="form-text"></span>
                                        </div>
                                        <button type="submit" name="evaluate-submit" value="submit" class="btn btn-lg btn-primary">Xác nhận</button>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- DataTables plugins jquery -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Main JS -->
<script src="../asset/js/main.js"></script>

<script>
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
</script>

<script>
    $(document).ready(function() {
        $("#evaluate-detail-table-list-staff").DataTable();
    });
</script>

</html>