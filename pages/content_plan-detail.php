<?php
require_once('../admin/config.php');
require_once('../lib/helper.php');

if (!isset($_SESSION['username'])) {
    header("location: ./login.php");
}

$makehoach = isset($_GET['makehoach']) ? $_GET['makehoach'] : 'KH01';
$thongtinkehoach = array();
$danhsachchitieu = array();
$tongchitieudadat = array();

$danhsachmakhuvuc = get_all_db($conn, 'khuvuc');
$danhsachmabophan = get_all_db($conn, 'bophan');

function chitieutheothang($conn, $makehoach, $machitieu)
{
    $data = array();

    $sql = "SELECT thang, SUM(chitieuthangdatduoc) AS CHITIEUTHANG
                FROM theodoikehoach
                WHERE makehoach = '{$makehoach}' AND machitieu = '{$machitieu}'
                GROUP BY thang";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $data[] = $row['CHITIEUTHANG'];
    }

    return $data;
}

function chitieutungnhanvien($conn, $makehoach, $manv)
{
    $sql = "SELECT chitieucandat, chitieu.machitieu, chitieu.tenchitieu
                FROM chitietkehoach, chitieu
                WHERE chitietkehoach.machitieu = chitieu.machitieu AND makehoach = '{$makehoach}' AND manhanvien = '{$manv}'";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

// Lấy danh sách nhân viên chưa thuộc kế hoạch
function get_all_nhanvien($conn, $mabophan, $makehoach)
{

    $data = array();

    $sql = "SELECT nhanvien.manhanvien, nhanvien.hoten
                FROM nhanvien, bophan
                WHERE nhanvien.mabophan = bophan.mabophan AND bophan.mabophan = '{$mabophan}' AND nhanvien.manhanvien NOT IN
                (
                    SELECT manhanvien
                    FROM chitietkehoach
                    WHERE chitietkehoach.makehoach = '{$makehoach}'
                )";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    return $data;
}

if ($makehoach) {

    // Lấy thông tin của kế hoạch
    $sql = "SELECT khuvuc.makhuvuc, khuvuc.tenkhuvuc, bophan.mabophan, bophan.tenbophan, kehoachgiaoviec.makehoach, kehoachgiaoviec.thoigianbatdau, kehoachgiaoviec.thoigiandukien, kehoachgiaoviec.thoigianketthuc, kehoachgiaoviec.motakehoach, nhanvien.manhanvien, nhanvien.hoten
        FROM khuvuc, bophan, kehoachgiaoviec, chitietkehoach, nhanvien
        WHERE kehoachgiaoviec.makhuvuc = khuvuc.makhuvuc AND bophan.mabophan = kehoachgiaoviec.mabophan AND kehoachgiaoviec.makehoach = chitietkehoach.makehoach AND chitietkehoach.manhanvien = nhanvien.manhanvien AND kehoachgiaoviec.makehoach = '{$makehoach}'
        GROUP BY nhanvien.manhanvien";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $thongtinkehoach[] = $row;
    }

    $danhsachnhanvien = get_all_nhanvien($conn, $thongtinkehoach[0]['mabophan'], $makehoach);

    // Danh sách các chỉ tiêu thuộc kế hoạch
    $sql = "SELECT chitieu.machitieu, chitieu.tenchitieu, chitietkehoach.chitieucandat, SUM(chitietkehoach.chitieucandat) AS TONGCHITIEU
                FROM chitietkehoach, chitieu
                WHERE chitieu.machitieu = chitietkehoach.machitieu AND chitietkehoach.makehoach = '{$makehoach}'
                GROUP BY chitieu.machitieu";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $danhsachchitieu[] = $row;
    }

    // print_r($danhsachchitieu);
    // die();


    // Tổng đạt được của các chỉ tiêu
    $sql = "SELECT chitieu.tenchitieu, SUM(theodoikehoach.chitieuthangdatduoc) as TONGDATDUOC
                FROM chitieu, theodoikehoach
                WHERE theodoikehoach.machitieu = chitieu.machitieu AND theodoikehoach.makehoach = '{$makehoach}'
                GROUP BY chitieu.machitieu";

    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        $tongchitieudadat[] = $row;
    }


    // Update thông tin kế hoạch
    if (isset($_POST["submit-update-plan"]) && $_POST["submit-update-plan"] == "submit") {
        $thoigianbatdau = isset($_POST["thoigianbatdau"]) ? $_POST["thoigianbatdau"] : '';
        $thoigiandukien = isset($_POST["thoigiandukien"]) ? $_POST["thoigiandukien"] : '';
        $makhuvuc = isset($_POST["makhuvuc"]) ? $_POST["makhuvuc"] : '';
        $mabophan = isset($_POST["mabophan"]) ? $_POST["mabophan"] : '';
        $motakehoach = isset($_POST["motakehoach"]) ? $_POST["motakehoach"] : '';

        if (empty($thoigianbatdau)) {
            $error['thoigianbatdau'] = 'Bạn chưa nhập thời gian bắt đầu!';
        }

        if (empty($thoigiandukien)) {
            $error['thoigiandukien'] = 'Bạn chưa nhập thời gian kết thúc dự kiến!';
        }

        if (empty($makhuvuc)) {
            $error['makhuvuc'] = 'Bạn chưa nhập mã khu vực!';
        }

        if (empty($mabophan)) {
            $error['mabophan'] = 'Bạn chưa nhập mã bộ phận!';
        }

        if (empty($motakehoach)) {
            $error['motakehoach'] = 'Bạn chưa nhập mô tả kế hoạch!';
        }


        if (empty($error)) {

            $sql_update = "UPDATE `kehoachgiaoviec` SET `motakehoach`='{$motakehoach}',`thoigianbatdau`='{$thoigianbatdau}',`thoigiandukien`='{$thoigiandukien}', `makhuvuc`='{$makhuvuc}',`mabophan`='{$mabophan}' WHERE makehoach = '{$makehoach}'";

            if ($conn->query($sql_update)) {
                echo '<script> alert("Cập nhật kế hoạch thành công!"); </script>';
                header("Refresh:0");
            } else {
                echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
            }
        }
    }


    // Thêm nhân viên vào kế hoạch
    if (isset($_POST['submit-add-staff']) && $_POST['submit-add-staff'] == "submit") {
        $manhanvien = isset($_POST['manhanvien']) ? $_POST['manhanvien'] : '';
        $chitieu = isset($_POST['chitieu']) ? $_POST['chitieu'] : array();

        if (empty($manhanvien)) {
            $error['manhanvien'] = 'Bạn chưa chọn mã nhân viên!';
        }

        if (empty($chitieu)) {
            $error['chitieu'] = 'Bạn chưa nhập chỉ tiêu!';
        }

        if (empty($error)) {

            $index = 0;
            $isQuery = false;

            foreach ($danhsachchitieu as $item) {
                $sql = "INSERT INTO `chitietkehoach`(`makehoach`, `manhanvien`, `machitieu`, `chitieucandat`) VALUES ('{$makehoach}','{$manhanvien}','{$item["machitieu"]}','{$chitieu[$index]}')";

                if ($conn->query($sql)) {
                    $isQuery = true;
                } else {
                    $isQuery = false;
                }

                $index++;
            }

            if ($isQuery) {
                echo '<script> alert("Thêm mới nhân viên vào kế hoạch thành công!"); </script>';
                header("Refresh:0");
            } else {
                echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
            }
        }
    }

    // Chỉnh sửa nhân viên trong kế hoạch
    if (isset($_POST['submit-edit-staff']) && $_POST['submit-edit-staff'] == "submit") {

        $manhanvien = isset($_POST['manhanvien']) ? $_POST['manhanvien'] : '';
        $old_manhanvien = isset($_POST['old-manv']) ? $_POST['old-manv'] : '';
        $chitieu = isset($_POST['chitieu']) ? $_POST['chitieu'] : array();

        if (empty($manhanvien)) {
            $error['manhanvien'] = 'Bạn chưa chọn mã nhân viên!';
        }

        if (empty($chitieu)) {
            $error['chitieu'] = 'Bạn chưa nhập chỉ tiêu!';
        }

        if (empty($error)) {

            $index = 0;
            $isQuery = false;

            foreach ($danhsachchitieu as $item) {
                $sql = "UPDATE `chitietkehoach` SET `manhanvien`='{$manhanvien}', `chitieucandat`='{$chitieu[$index]}' WHERE makehoach = '{$makehoach}' AND manhanvien = '{$old_manhanvien}' AND machitieu = '{$item["machitieu"]}' ";

                if ($conn->query($sql)) {
                    $isQuery = true;
                } else {
                    $isQuery = false;
                }

                $index++;
            }

            if ($isQuery) {
                echo '<script> alert("Cập nhật chỉ tiêu nhân thành công!"); </script>';
                header("Refresh:0");
            } else {
                echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
            }
        }
    }


    // Xóa nhân viên khỏi kế hoạch
    if (isset($_POST['submit-delete-staff']) && $_POST['submit-delete-staff'] == "submit") {
        $manhanvien = isset($_POST['manhanvien']) ? $_POST['manhanvien'] : '';

        if (!empty($manhanvien)) {
            $sql_delete_chi_tiet_ke_hoach = "DELETE FROM `chitietkehoach` WHERE makehoach = '{$makehoach}' AND manhanvien = '{$manhanvien}'";

            if ($conn->query($sql_delete_chi_tiet_ke_hoach)) {

                $sql_delete_theo_doi_ke_hoach = "DELETE FROM `theodoikehoach` WHERE makehoach = '{$makehoach}' AND manhanvien = '{$manhanvien}'";

                if($conn->query($sql_delete_theo_doi_ke_hoach)) {
                    echo '<script> alert("Xóa nhân viên khỏi kế hoạch thành công!"); </script>';
                    header("Refresh:0");
                } else {
                    echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
                }
                
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
                            <h2 class="header__title">Chi tiết kế hoạch</h2>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <p class="fs-4">
                                        <span class="fw-bold">Mã kế hoạch:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['makehoach'] ?>
                                            <span class="badge bg-danger">
                                                Đang tiến hành
                                            </span>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="text-center fs-4">
                                        <span class="fw-bold">Khu vực:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['tenkhuvuc'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-4">
                                    <p class="text-end fs-4">
                                        <span class="fw-bold">Bộ phận:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['tenbophan'] ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-4">
                                    <p class="fs-4">
                                        <span class="fw-bold">Thời gian bắt đầu:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['thoigianbatdau'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p class="text-center fs-4">
                                        <span class="fw-bold">Thời gian kết thúc dự
                                            kiến:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['thoigiandukien'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-4 mt-4">
                                    <p class="text-end fs-4">
                                        <span class="fw-bold">Thời gian kết thúc:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['thoigianketthuc'] ?></span>
                                    </p>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <p class="fs-4">
                                        <span class="fw-bold">Mô tả kế hoạch:</span>
                                        <span class="ms-2"><?= $thongtinkehoach[0]['motakehoach'] ?>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <button class="btn btn-info text-white fs-5" data-bs-toggle="modal" data-bs-target="#modal-plan-edit">
                                        <i class="fa-regular fa-pen-to-square me-2"></i>
                                        Chỉnh sửa kế hoạch
                                    </button>

                                    <button class="btn btn-primary text-white fs-5 ms-4 js-add-staff" data-bs-toggle="modal" data-bs-target="#modal-plan">
                                        <i class="fa-solid fa-plus me-2"></i>
                                        Thêm nhân viên
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="evaluate-detail-content__body">
                            <table id="evaluate-detail-table-list-staff" class="table table-bordered display evaluate-detail-content__table-staff">
                                <caption class="mt-4 text-center">
                                    Danh sách nhân viên thuộc kế hoạch
                                </caption>
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">Mã nhân viên</th>
                                        <th scope="col">Tên nhân viên</th>
                                        <?php foreach ($danhsachchitieu as $item) { ?>
                                            <th scope="col"><?= $item['tenchitieu'] ?></th>
                                        <?php } ?>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php foreach ($thongtinkehoach as $item) {
                                        $danhsachchitieunhanvien = chitieutungnhanvien($conn, $makehoach, $item['manhanvien'])
                                    ?>
                                        <tr>
                                            <th><?= $item['manhanvien'] ?></th>
                                            <th><?= $item['hoten'] ?></th>


                                            <?php foreach ($danhsachchitieunhanvien as $chitieu) { ?>
                                                <td><?= $chitieu['chitieucandat'] ?></td>
                                            <?php } ?>

                                            <td>
                                                <button class="btn btn-info text-white fs-5 js-edit-staff" data-bs-toggle="modal" data-bs-target="#modal-plan-edit-staff" data-manv="<?= $item['manhanvien'] ?>" data-tennv="<?= $item['hoten'] ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i>

                                                    <?php foreach ($danhsachchitieunhanvien as $chitieu) { ?>
                                                        <input type="hidden" name="machitieu[]" value="<?= $chitieu['machitieu'] ?>">
                                                        <input type="hidden" name="tenchitieu[]" value="<?= $chitieu['tenchitieu'] ?>">
                                                        <input type="hidden" name="chitieu[]" value="<?= $chitieu['chitieucandat'] ?>">
                                                    <?php } ?>

                                                </button>
                                                <button class="btn btn-danger fs-5" data-bs-toggle="modal" data-bs-target="#modal-delete-staff" data-manv="<?=$item['manhanvien'] ?>">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="fw-bold text-center" colspan="2">
                                            Tổng chỉ tiêu cần đạt
                                        </th>
                                        <?php foreach ($danhsachchitieu as $item) { ?>
                                            <th class="fw-bold text-center">
                                                <?= $item['TONGCHITIEU'] ?>
                                            </th>
                                        <?php } ?>
                                    </tr>

                                </tfoot>
                            </table>

                            <div class="row my-4">
                                <div class="col-md-12">
                                    <h4 class="text-center fs-3 fw-bold">
                                        Biểu đồ theo dõi chỉ tiêu theo tháng
                                    </h4>
                                </div>
                            </div>

                            <div class="row">
                                <?php foreach ($danhsachchitieu as $item) { ?>
                                    <div class="col-md-6 mt-5 pe-4">
                                        <canvas id="<?= $item['machitieu'] ?>"></canvas>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal plan edit-->
    <div class="modal fade" id="modal-plan-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">
                        Chỉnh sửa thông tin kế hoạch
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-update-plan" action="" method="POST">
                        <div class="mb-3 mt-4">
                            <label for="MAKH" class="form-label fw-bold fs-5 fw-bold fs-5">Mã kế hoạch</label>
                            <input type="text" class="form-control fs-5" id="MAKH" value="<?= $thongtinkehoach[0]['makehoach'] ?>" name="makehoach" readonly disabled />
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="exampleInputPassword1" class="form-label fw-bold fs-5 fw-bold fs-5">Thời gian</label>
                            <div class="d-flex align-items-center">
                                <input type="date" class="form-control fs-5" value="<?= $thongtinkehoach[0]['thoigianbatdau'] ?>" name="thoigianbatdau" />
                                <span class="mx-4">Đến</span>
                                <input type="date" class="form-control fs-5" value="<?= $thongtinkehoach[0]['thoigiandukien'] ?>" name="thoigiandukien" />
                            </div>
                        </div>
                        <div class="mb-3 mt-4">
                            <label for="exampleInputPassword1" class="form-label fw-bold fs-5 fw-bold fs-5">Mã khu vực</label>
                            <select class="form-select fs-5" aria-label="Default select example" name="makhuvuc">
                                <?php foreach ($danhsachmakhuvuc as $item) { ?>
                                    <option value="<?= $item['makhuvuc'] ?>" <?php echo $item['makhuvuc'] == $thongtinkehoach[0]['makhuvuc'] ? 'selected' : '' ?>>
                                        <?= $item['makhuvuc'] . ' - ' . $item['tenkhuvuc'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="exampleInputPassword1" class="form-label fw-bold fs-5 fw-bold fs-5">Mã bộ phận</label>
                            <select class="form-select fs-5" aria-label="Default select example" name="mabophan">
                                <?php foreach ($danhsachmabophan as $item) { ?>
                                    <option value="<?= $item['mabophan'] ?>" <?php echo $item['mabophan'] == $thongtinkehoach[0]['mabophan'] ? 'selected' : '' ?>>
                                        <?= $item['mabophan'] . ' - ' . $item['tenbophan'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mb-3 mt-4">
                            <label for="exampleInputPassword1" class="form-label fw-bold fs-5 fw-bold fs-5">Mô tả</label>
                            <textarea name="motakehoach" id="" rows="5" class="form-control fs-5 text-start">
                                    <?= $thongtinkehoach[0]['motakehoach'] ?>
                                </textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit" form="form-update-plan" name="submit-update-plan" value="submit" class="btn btn-primary fs-5">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Lưu
                        lại
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add staff-->
    <div class="modal fade" id="modal-plan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">
                        Thêm mới nhân viên vào kế hoạch
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-add-staff" action="" method="POST">
                        <div class="mb-3 mt-4">
                            <label for="MANV" class="form-label fw-bold fs-5">Mã nhân viên</label>
                            <select class="form-select fs-5" aria-label="Default select example" name="manhanvien">
                                <?php foreach ($danhsachnhanvien as $item) { ?>
                                    <option value="<?= $item['manhanvien'] ?>">
                                        <?= $item['manhanvien'] . ' - ' . $item['hoten'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <?php foreach ($danhsachchitieu as $item) { ?>
                            <div class="mb-3 mt-4">
                                <label for="<?= $item['machitieu'] ?>" class="form-label fw-bold fs-5"><?= $item['tenchitieu'] ?></label>
                                <input type="text" class="form-control fs-5" id="<?= $item['machitieu'] ?>" value="<?= $item['chitieucandat'] ?>" name="chitieu[]" />
                            </div>

                        <?php } ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit" form="form-add-staff" name="submit-add-staff" value="submit" class="btn btn-primary fs-5">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit staff-->
    <div class="modal fade" id="modal-plan-edit-staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">
                        Chỉnh sửa chỉ tiêu nhân viên
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-edit-staff" action="" method="POST">
                        <div class="mb-3 mt-4">
                            <label for="MANV" class="form-label fw-bold fs-5">Mã nhân viên</label>
                            <select class="form-select fs-5" aria-label="Default select example" name="manhanvien">
                                <option value="" selected></option>
                                <?php foreach ($danhsachnhanvien as $item) { ?>
                                    <option value="<?= $item['manhanvien'] ?>">
                                        <?= $item['manhanvien'] . ' - ' . $item['hoten'] ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <input type="hidden" name="old-manv" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-5" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit" form="form-edit-staff" name="submit-edit-staff" value="submit" class="btn btn-primary fs-5">
                        <i class="fa-regular fa-floppy-disk me-2"></i> Lưu
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal delete staff-->
    <div class="modal fade" id="modal-delete-staff" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-3" id="exampleModalLabel">
                        Xóa nhân viên khỏi kế hoạch
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1 class="fs-5">
                        Bạn có chắc xóa nhân viên này khỏi kế hoạch ? (Hành
                        động không thể khôi phục)
                    </h1>
                    <form id="form-delete-staff" action="" method="POST">
                        <input type="hidden" name="manhanvien" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit" form="form-delete-staff" name="submit-delete-staff" value="submit" class="btn btn-danger">
                        Xóa
                    </button>
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

<!-- Chart js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Main JS -->
<script src="../asset/js/main.js"></script>

<script>
    $(document).ready(function() {
        const exampleModal = document.getElementById("modal-delete-staff");
        exampleModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            const manhanvien = button.getAttribute('data-manv');

            const form = exampleModal.querySelector(".modal-body form");
            const input = exampleModal.querySelector(".modal-body form input");

            input.setAttribute('value', manhanvien);
        });

        //
        const editStaffleModal = document.getElementById("modal-plan-edit-staff");
        editStaffleModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            const manhanvien = button.getAttribute('data-manv');
            const tennhanvien = button.getAttribute('data-tennv');
            const dsMaChiTieu = button.querySelectorAll('input[name="machitieu[]"]');
            const dsTenChiTieu = button.querySelectorAll('input[name="tenchitieu[]"]');
            const dsChiTieu = button.querySelectorAll('input[name="chitieu[]"]');

            const form = editStaffleModal.querySelector(".modal-body form");
            const inputOldManv = editStaffleModal.querySelector(".modal-body form input[name='old-manv']");
            const select = editStaffleModal.querySelector(".modal-body select option:first-child");

            select.value = manhanvien;
            inputOldManv.value = manhanvien;
            select.innerText = `${manhanvien} - ${tennhanvien}`;

            let html = [...dsTenChiTieu].map((item, index) => {
                const dsMaChiTieuItem = dsMaChiTieu[index].value;
                const dsChiTieuItem = dsChiTieu[index].value;

                return `<div class="mb-3 mt-4">
                            <label for="${dsMaChiTieuItem}" class="form-label fw-bold fs-5">${item.value}</label>
                            <input type="text" class="form-control fs-5" id="${dsMaChiTieuItem}" value="${dsChiTieuItem}" form="form-edit-staff" name="chitieu[]" />
                        </div>`
            });

            html = html.join('');

            form.insertAdjacentHTML('afterend', html);

        });

        //
        const district = document.querySelector('select[name="makhuvuc"]');
        const department = document.querySelector('select[name="mabophan"]');

        const dataDepartment = <?php echo json_encode($danhsachmabophan) ?>;

        district.onchange = function(e) {
            const value = e.target.value;
            department.length = 0;

            dataDepartment.forEach((item) => {
                if (item.makhuvuc == value) {
                    department.options[department.options.length] = new Option(`${item.mabophan} - ${item.tenbophan}`, item.mabophan)
                }
            })
        }

        //
        <?php foreach ($danhsachchitieu as $item) { ?>
            const <?= $item['machitieu'] ?> = document.getElementById("<?= $item['machitieu'] ?>");

            const <?= $item['machitieu'] ?>Data = <?= json_encode(chitieutheothang($conn, $makehoach, $item['machitieu'])) ?>

            const <?= $item['machitieu'] ?>NewData = <?= $item['machitieu'] ?>Data.map((item) => {
                return Number.parseInt(item);
            });

            var randomColor = Math.floor(Math.random() * 16777215).toString(16);

            new Chart(<?= $item['machitieu'] ?>, {
                type: "line",
                data: {
                    labels: [
                        "Tháng 1",
                        "Tháng 2",
                        "Tháng 3",
                        "Tháng 4",
                        "Tháng 5",
                        "Tháng 6",
                        "Tháng 7",
                        "Tháng 8",
                        "Tháng 9",
                        "Thánh 10",
                        "Tháng 11",
                        "Tháng 12",
                    ],
                    datasets: [{
                        label: "<?= $item['tenchitieu'] ?>",
                        data: <?= $item['machitieu'] ?>NewData,
                        borderWidth: 1,
                        backgroundColor: `#${randomColor}`,
                        borderColor: `#${randomColor}`,
                    }, ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: "Biểu đồ tổng <?= $item['tenchitieu'] ?> qua từng tháng",
                        },
                    },
                },
            });
        <?php } ?>

        $("#evaluate-detail-table-list-staff").DataTable();
    });
</script>

</html>