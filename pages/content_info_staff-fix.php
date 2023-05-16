<?php
include('../admin/config.php');
if (isset($_GET['manv'])) {
    $_SESSION["staff-fix"] = $_GET['manv'];
}



$info = "SELECT nhanvien.manhanvien, hoten, hinhanh, tenbophan, tenchucvu, tenkhuvuc, ngaysinh, gioitinh, sodienthoai, email, tentk, matkhau, thoigiannhanchuc.machucvu, nhanvien.mabophan, bophan.makhuvuc
                    from nhanvien, bophan, chucvu, khuvuc, taikhoan, thoigiannhanchuc
                    WHERE nhanvien.mabophan = bophan.mabophan
                    and nhanvien.manhanvien = thoigiannhanchuc.manhanvien
                    and thoigiannhanchuc.machucvu = chucvu.machucvu
                    and bophan.makhuvuc = khuvuc.makhuvuc
                    and nhanvien.manhanvien = taikhoan.manv
                    and nhanvien.manhanvien = '" . $_SESSION["staff-fix"] . "' ";
$result_info = mysqli_query($ketnoi, $info);
$row_result_info = mysqli_fetch_array($result_info);

$sql_select_position = "SELECT machucvu, tenchucvu FROM chucvu";
$result_select_position = mysqli_query($ketnoi, $sql_select_position);

$sql_select_department = "SELECT mabophan, tenbophan FROM bophan";
$result_select_department = mysqli_query($ketnoi, $sql_select_department);

$sql_select_area = "SELECT makhuvuc, tenkhuvuc FROM khuvuc";
$result_select_area = mysqli_query($ketnoi, $sql_select_area);


if (isset($_POST['button_delete'])) {
    $sql_delete = "DELETE FROM nhanvien WHERE manhanvien = '" . $_SESSION["staff-fix"] . "'";
    $result_delete = mysqli_query($ketnoi, $sql_delete);
    unset($_SESSION["staff-fix"]);
    header('Location: content_info_staff.php');
}

if (isset($_POST['button_save'])) {


    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $filename1 = "AVT_".$_SESSION["staff-fix"].".png";   //$file['name']; // Lấy tên file ảnh
        $filetmp = $file['tmp_name']; // Đường dẫn tạm thời của file
        $destination = '../asset/img/' . $filename1; // Đường dẫn lưu trữ file
      
        // Di chuyển file ảnh vào thư mục lưu trữ
        move_uploaded_file($filetmp, $destination);
      
        //echo "File ảnh đã được tải lên thành công!";
      }



    $hoten = $_POST['staffName'];
    $phongban = $_POST['staffDepartment'];
    $chucvu = $_POST['staffPosition'];
    $khuvuc = $_POST['staffArea'];
    $ngaysinh = $_POST['staffDateofBirth'];
    $gioitinh = $_POST['staffSexual'];
    $sdt = $_POST['staffPhone'];
    $matkhau = $_POST['staffPassword'];


    // $doihoten = "";
    // if($hoten != $result_info['hoten']){
    //     $doihoten = "`hoten`='".$hoten."',";
    // }

    // $doihoten = "";
    // if($hoten != $result_info['hoten']){
    //     $doihoten = "`hoten`='".$hoten."',";
    // }


    $sql_update = "UPDATE `nhanvien` SET `hoten`='".$hoten."',`ngaysinh`='".$ngaysinh."',`gioitinh`='".$gioitinh."',`sodienthoai`='".$sdt."',`mabophan`='".$phongban."',`hinhanh`='".$filename1."'  WHERE  manhanvien = '".$_SESSION["staff-fix"]."'";
    //echo $sql_update;

    $result_update = mysqli_query($ketnoi, $sql_update);
    header('Location: content_info_staff-fix.php?manv='.$_SESSION["staff-fix"]);
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
            <div class="row main">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="content">

                            
                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Mã nhân viên:</h3>
                                <p class="staff__info-desc" name="staffID"><?= $row_result_info["manhanvien"] ?> </p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Họ tên:</h3>
                                <input type="text" class="staff__info-desc" name="staffName" value="<?= $row_result_info["hoten"] ?>">

                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Phòng ban:</h3>
                                <select class="staff__info-desc" name="staffDepartment">
                                    <option selected value="<?= $row_result_info["mabophan"] ?>"><?= $row_result_info["mabophan"] ?> - <?= $row_result_info["tenbophan"] ?></option>
                                    <?php
                                    while ($row_select_department = mysqli_fetch_array($result_select_department)) {
                                        echo "<option value=\"" . $row_select_department["mabophan"] . "\">" . $row_select_department["mabophan"] . " - " . $row_select_department["tenbophan"] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Chức vụ:</h3>
                                <select class="staff__info-desc" name="staffPosition">
                                    <option selected value="<?= $row_result_info["machucvu"] ?>"><?= $row_result_info["machucvu"] ?> - <?= $row_result_info["tenchucvu"] ?></option>
                                    <?php
                                    while ($row_select_position = mysqli_fetch_array($result_select_position)) {
                                        echo "<option value=\"" . $row_select_position["machucvu"] . "\">" . $row_select_position["machucvu"] . " - " . $row_select_position["tenchucvu"] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Khu vực:</h3>
                                <select class="staff__info-desc" name="staffArea">
                                    <option selected value="<?= $row_result_info["makhuvuc"] ?>"><?= $row_result_info["makhuvuc"] ?> - <?= $row_result_info["tenkhuvuc"] ?></option>
                                    <?php
                                    while ($row_select_area = mysqli_fetch_array($result_select_area)) {
                                        echo "<option value=\"" . $row_select_area["makhuvuc"] . "\">" . $row_select_area["makhuvuc"] . " - " . $row_select_area["tenkhuvuc"] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Ngày sinh:</h3>
                                <input type="date" class="staff__info-desc" name="staffDateofBirth" value="<?= $row_result_info["ngaysinh"] ?>">

                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Giới tính:</h3>
                                <select class="staff__info-desc" name="staffSexual">
                                    <option selected><?= $row_result_info["gioitinh"] ?></option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">
                                    Số điện thoại:
                                </h3>
                                <input type="text" class="staff__info-desc" name="staffPhone" value="<?= $row_result_info["sodienthoai"] ?>">

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="content">
                            

                            <div class="content__staff-img">
                                <img src="../asset/img/<?= $row_result_info['hinhanh'] ?>" alt="avatar" />
                            </div>

                            <div class="content__staff-img">
                                <input type="file" name="image"/>
                            </div>


                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Email:</h3>
                                <input type="text" class="staff__info-desc" name="staffEmail" value="<?= $row_result_info["email"] ?>">

                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Tài khoản:</h3>
                                <input type="text" class="staff__info-desc" name="staffUser" value="<?= $row_result_info["tentk"] ?>">

                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Mật khẩu:</h3>
                                <div class="d-inline position-relative">
                                    <input type="password" id="password" name="staffPassword" style="background-color: white; border: none;" class="staff__info-desc" value="<?= $row_result_info["matkhau"] ?>">
                                    <span class="btn-show-password"><i class="fa-regular fa-eye"></i></span>
                                </div>
                            </div>

                            <div class="btn btn-primary content__staff-btn">
                                <button name="button_save">
                                    Lưu thông tin</button>
                            </div>
                            <div class="btn btn-primary content__staff-btn">
                                <button name="button_delete">Xóa nhân viên</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    const btnShowPassword = document.querySelector('.btn-show-password');

    btnShowPassword.onclick = function() {
        const input = document.querySelector('input[id="password"]');

        if (input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text');
            btnShowPassword.querySelector('i').className = 'fa-regular fa-eye-slash';
        } else {
            input.setAttribute('type', 'password')
            btnShowPassword.querySelector('i').className = 'fa-regular fa-eye';

        }
    }
</script>

</html>