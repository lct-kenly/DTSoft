<?php
require_once('../admin/config.php');
if (!isset($_SESSION['username'])) {
    header("location: ./login.php");
}

if (!isset($_GET['manv'])) {
    $_SESSION["staff-fix"] = $profile['manhanvien'];
}

if (isset($_GET['manv'])) {
    $_SESSION["staff-fix"] = $_GET['manv'];
}

$info = "SELECT nhanvien.manhanvien, hoten, hinhanh, tenbophan, tenchucvu, tenkhuvuc, ngaysinh, gioitinh, sodienthoai, email, tentk, matkhau 
            from nhanvien, bophan, chucvu, khuvuc, taikhoan, thoigiannhanchuc
            WHERE nhanvien.mabophan = bophan.mabophan
            and nhanvien.manhanvien = thoigiannhanchuc.manhanvien
            and thoigiannhanchuc.machucvu = chucvu.machucvu
            and bophan.makhuvuc = khuvuc.makhuvuc
            and nhanvien.manhanvien = taikhoan.manv
            and nhanvien.manhanvien = '" . $_SESSION["staff-fix"] . "' ";

$result_info = mysqli_query($ketnoi, $info);
$row_result_info = mysqli_fetch_array($result_info);

if (isset($_POST['button_save'])) {


    if (isset($_FILES['image'])) {
        $avatar = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "../asset/img/" . $avatar;

		move_uploaded_file($tempname ,$folder);
    }

    $sdt = $_POST['staffPhone'];

    $sql_update = "UPDATE `nhanvien` SET `sodienthoai`='" . $sdt . "', `hinhanh`='" . $avatar . "'  WHERE  manhanvien = '" . $_SESSION["staff-fix"] . "'";
    //echo $sql_update;

    $result_update = mysqli_query($ketnoi, $sql_update);

    $profile['hinh_anh'] = $avatar;

    echo "<script>";
    if ($result_update) {
        echo "alert(\"Cập nhật thành công\");";
    } else {
        echo "alert(\"Cập nhật không thành công\");";
    }
    echo "window.location = \"content_info_staff.php?manv=" . $_SESSION["staff-fix"] . "\"; ";
    echo "</script>";
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

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/style_info_staff.css" />
    <title>Quan Ly Nhan Su</title>
</head>

<body>
    <div class="wrapper staff_info">
        <div class="container-flud">
            <div class="row header">
                <h2 class="header__title">Thông tin nhân viên</h2>
            </div>

            <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="content p-4">
                                <div class="row">
                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Mã nhân viên:</label>
                                            <input class="form-control fs-5" name="manv" value="<?= $row_result_info["manhanvien"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Họ tên:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["hoten"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Chức vụ:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["tenchucvu"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Khu vực:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["tenkhuvuc"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Phòng ban:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["tenbophan"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Ngày sinh:</label>
                                            <input id="changeForm" class="form-control fs-5" value="<?= $row_result_info["ngaysinh"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Giới tính:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["gioitinh"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">
                                                Số điện thoại:
                                            </label>
                                            <input type="text" class="form-control fs-5" name="staffPhone" value="<?= $row_result_info["sodienthoai"] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Email:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["email"] ?>" readonly disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div class="mb-3">
                                            <label class="form-label fs-5 fw-bold">Tài khoản:</label>
                                            <input class="form-control fs-5" value="<?= $row_result_info["tentk"] ?>" readonly disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary fs-4 me-4" name="button_save">Lưu thông tin</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="content">
                                <div class="text-center grid-image">
                                    <img src="../asset/img/<?= $row_result_info['hinhanh'] ?>" alt="avatar" class="staff-avatar" />
                                </div>

                                <div class="upload-avatar">
                                    <label for="avatar"><i class="fa-solid fa-upload"></i> Upload Image</label>
                                    <input id="avatar" type="file" name="image" />
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- DataTables plugins jquery -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>

    <script>
        const inputFile = document.querySelector('input#avatar');
        const gridImage = document.querySelector('.grid-image');

        uploadFile(inputFile, gridImage);
    </script>
</body>

</html>