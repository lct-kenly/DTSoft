<?php
    require_once('../admin/config.php');
    if(!isset($_SESSION['username'])) {
        header("location: ./login.php");
    }

    

    $disable = "";
 
    $malevel = $chucvu["machucvu"];
    
    $currentBophan = $bophan["mabophan"];

    $Nhansu = substr($currentBophan,0,2);

    if(!($malevel == "C3" || ($Nhansu == "NS" && $malevel == "C2") )){       
        header("location: ..//pages/index.php");
    }
    
    $currentKhuvuc = $bophan["makhuvuc"];
    
    $tenkhuvuc =  $ketnoi->query("SELECT * FROM  `khuvuc` WHERE makhuvuc = '".$currentKhuvuc."'")->fetch_array();
    
    if($malevel == "C1" ){
        $disable = "disabled";
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
    <link rel="stylesheet" href="../asset/styles/style_add_staff.css" />
    <title>Quan Ly Nhan Su</title>

    <?php
    
    $sql_old_staff_id = "SELECT manhanvien from nhanvien";
    $result_old_staff_id = mysqli_query($ketnoi, $sql_old_staff_id);

    $sql_select_staffWork = "SELECT macongviec, tencongviec FROM congviec";
    $result_select_staffWork = mysqli_query($ketnoi,$sql_select_staffWork);

    $sql_select_position = "SELECT machucvu, tenchucvu FROM chucvu";
    $result_select_position = mysqli_query($ketnoi,$sql_select_position);

    $sql_select_department = "SELECT mabophan, tenbophan, khuvuc.tenkhuvuc FROM bophan, khuvuc WHERE bophan.makhuvuc = khuvuc.makhuvuc and bophan.makhuvuc = '".$currentKhuvuc."   '";
    $result_select_department = mysqli_query($ketnoi,$sql_select_department);
    

    if (!isset($_SESSION["add_staff"])) {
        $_SESSION["add_staff"] = array();
    }

    $error = false;
    $success = false;
    $current_StaffID = "";
    $current_StaffName = "";
    $current_staffDateofBirth = "";
    $current_staffPhone = "";
    $current_staffHome = "";
    $current_staffNation = "";
    $current_avatar = "";
    $current_staffEmail = "";
    $current_staffUser = "";
    $current_staffPassword = "";
    $current_time = date("Y-m-d H:i:s");

    if (isset($_GET['action'])) {
        $check = false;

        $current_StaffID = $_POST['staffID'];
        $current_StaffName = $_POST['staffName'];
        $current_staffDateofBirth = $_POST['staffDateofBirth'];
        $current_staffSexual = $_POST['staffSexual'];
        $current_staffPhone = $_POST['staffPhone'];
        $current_staffHome = $_POST['staffHome'];
        $current_staffNation = $_POST['staffNation'];
        $current_staffWork = $_POST['staffWork'];
        $current_staffPosition = $_POST['staffPosition'];
        $current_staffDepartment = $_POST['staffDepartment'];
        $current_staffEmail = $_POST['staffEmail'];
        $current_staffUser = $_POST['staffUser'];
        $current_staffPassword = $_POST['staffPassword'];
        $current_time = date("Y-m-d H:i:s");

        $current_avatar = $_FILES["avatar"]["name"];
        $tempname = $_FILES["avatar"]["tmp_name"];
        $folder = "../asset/img/" . $current_avatar;

        if($_FILES['avatar']['error'] == 0) {
            move_uploaded_file($tempname ,$folder);
        }

        if(empty($current_avatar)) {
            $current_avatar = 'avatar-default.jfif';
        }

        while ($row_old_id = mysqli_fetch_array($result_old_staff_id)) {
            if ($row_old_id['manhanvien'] === $current_StaffID) {
                $check = true;
                break;
            }
        }
        if ($check) {
            $error = "Mã nhân viên đã bị trùng lặp!";
        } else {
            $add_staff = "INSERT INTO nhanvien (manhanvien,hoten,ngaysinh,gioitinh,dantoc,quequan,sodienthoai,hinhanh,macongviec,mabophan)
                                VALUES ('" . $current_StaffID . "', '" . $current_StaffName . "', '" . $current_staffDateofBirth . "', 
                                '" . $current_staffSexual . "', '" . $current_staffNation . "', '" . $current_staffHome . "', 
                                '" . $current_staffPhone . "', '" . $current_avatar . "', '" . $current_staffWork . "', 
                                '" . $current_staffDepartment . "' ) ";
            $add_Position = "INSERT INTO thoigiannhanchuc (manhanvien, machucvu, thoigianbatdau, thoigianketthuc)
                                VALUES ( '" . $current_StaffID . "', '" . $current_staffPosition . "', '" . $current_time . "', '0000-00-00')";

            $add_account = "INSERT INTO taikhoan (manv, tentk, email, matkhau)
                                VALUES ('" . $current_StaffID . "','{$current_staffUser}','{$current_staffEmail}','{$current_staffPassword}')";

            $result_add_staff = mysqli_query($ketnoi, $add_staff);

            if($result_add_staff) {
                $result_add_Position = mysqli_query($ketnoi, $add_Position);
                $result_add_Account = mysqli_query($ketnoi, $add_account);

                if($result_add_staff && $result_add_Position && $result_add_Account) {
                    echo '<script> alert("Thêm nhân viên mới thành công!"); </script>';
                    
                } else {
                    echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
                }
            } else {
                echo '<script> alert("Có lỗi xảy ra, vui lòng thử lại!"); </script>';
            }

            
            $success = "Thêm nhân viên thành công!";
            
            $current_StaffID = "";
            $current_StaffName = "";
            $current_staffDateofBirth = "";
            $current_staffPhone = "";
            $current_staffHome = "";
            $current_staffNation = "";
            $current_avatar = "";
            $current_staffEmail = "";
            $current_staffUser = "";
            $current_staffPassword = "";
            unset($_SESSION['add_staff']);
        }
    }
    ?>
</head>

<body>
    <div class="wrapper">
        <div class="container-flud">
            <div class="row header">
                <h2 class="header__title">Thêm nhân viên</h2>
            </div>
            <form action="content_add_staff.php?action=submit" class="needs-validation" novalidate method="POST" enctype="multipart/form-data">
                <div class="row content">
                    <div class="col-md-6 content__left">
                        <!-- ID -->
                        <div class="input__form">
                            <label for="staffID" class="form-label input__label">Mã nhân viên</label>
                            <input type="text" class="form-control input__value" id="staffID" name="staffID" placeholder="Mã nhân viên" value="<?php echo !empty($current_StaffID) ? $current_staffID : ''?>" required/>
                            <p class="invalid-feedback">Vui lòng nhập trường này!</p>
                        </div>

                        <!-- Name -->
                        <div class="input__form">
                            <label for="staffName" class="form-label input__label">Họ và tên</label>
                            <input type="text" class="form-control input__value" id="staffName" name="staffName" placeholder="Họ và tên" value="<?= $current_StaffName ?>" />
                        </div>

                        <!-- Date of birth -->
                        <div class="input__form">
                            <label for="staffDateofBirth" class="form-label input__label">Ngày sinh</label>
                            <input type="date" class="form-control input__value" id="staffDateofBirth" name="staffDateofBirth" value="<?= $current_staffDateofBirth ?>" />
                        </div>

                        <!-- Sex -->
                        <div class="input__form">
                            <p class="input__label">Giới tính</p>
                            <select class="form-select input__value" name="staffSexual">
                                <option selected>Giới tính</option>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>

                        <!-- Phone Number -->
                        <div class="input__form">
                            <label for="staffPhone" class="form-label input__label">Số điện thoại</label>
                            <input type="text" class="form-control input__value" id="staffPhone" name="staffPhone" value="<?= $current_staffPhone ?>" />
                        </div>

                        <!-- Home -->
                        <div class="input__form">
                            <label for="staffHome" class="form-label input__label">Quê quán</label>
                            <input type="text" class="form-control input__value" id="staffHome" name="staffHome" placeholder="Quê quán" value="<?= $current_staffHome ?>" />
                        </div>

                        <!-- Nation -->
                        <div class="input__form">
                            <label for="staffNation" class="form-label input__label">Dân tộc</label>
                            <input type="text" class="form-control input__value" id="staffNation" name="staffNation" placeholder="Dân tộc" value="<?= $current_staffNation ?>" />
                        </div>

                        <!-- Work -->
                        <div class="input__form">
                            <p class="input__label">Công việc</p>
                            <select class="form-select input__value" name="staffWork">
                            <?php
                                while($row_select_staffWork=mysqli_fetch_array($result_select_staffWork)){                              
                                        echo "<option value=\"".$row_select_staffWork["macongviec"]."\"". $selected_staffWork.">".$row_select_staffWork["macongviec"]." - ".$row_select_staffWork["tencongviec"]."</option>";
                                    }
                            ?>                               
                            </select>
                        </div>

                        <!-- Position -->
                        <div class="input__form">
                            <p class="input__label">Chức vụ</p>
                            <select class="form-select input__value" name="staffPosition">
                            <?php
                                while($row_select_position=mysqli_fetch_array($result_select_position)){                              
                                        echo "<option value=\"".$row_select_position["machucvu"]."\"". $row_select_position.">".$row_select_position["machucvu"]." - ".$row_select_position["tenchucvu"]."</option>";
                                    }
                            ?>                                      
                            </select>
                        </div>

                        <!-- Department -->
                        <div class="input__form">
                            <p class="input__label">Phòng ban</p>
                            <select class="form-select input__value" id="staffDepartment" name="staffDepartment">
                                <?php  ?>
                                <?php  while($row_select_department=mysqli_fetch_array($result_select_department)){ ?>

                                    <option value="<?=$row_select_department['mabophan']?>">
                                        <?=$row_select_department['mabophan'] . ' - ' . $row_select_department['tenbophan'] . ' - ' . $row_select_department['tenkhuvuc']?>
                                    </option>
                                <?php }?>
                                                      
                            </select>
                        </div>

                    </div>

                    <div class="col-md-6 content__right">
                        <!-- Avatar -->
                        <div class="input__form input__avatar">
                            <div class="avatar__input">
                                <img src="../asset/img/avatar-default.jfif" alt="avatar" id="avatar__img" />
                            </div>
                            <input type="file" class="form-control input__value" name="avatar" onchange="readURL(this)" value="<?= $current_avatar ?>" />
                        </div>

                        <!-- Email -->
                        <div class="input__form">
                            <label for="staffEmail" class="form-label input__label">Email</label>
                            <input type="email" class="form-control input__value" id="staffEmail" name="staffEmail" placeholder="Email" value="<?= $current_staffEmail ?>"/>
                            <input type="hidden"  value="<?= $current_staffEmail ?>"/>
                        </div>

                        <!-- Staff Account -->
                        <div class="input__form">
                            <label for="staffUser" class="form-label input__label">Tài khoản</label>
                            <input type="text" class="form-control input__value" id="staffUser" name="staffUser" placeholder="Tài khoản" value="<?= $current_staffUser ?>"/>
                            <input type="hidden" value="<?= $current_staffEmail ?>"/>
                        </div>

                        <div class="input__form">
                            <label for="staffPassword" class="form-label input__label">Mật khẩu</label>
                            <input type="password" class="form-control input__value" id="staffPassword" name="staffPassword" placeholder="Mật khẩu" value="<?= $current_staffPassword ?>" />
                            <span class="btn-show-current-password"><i class="fa-regular fa-eye eyes"></i></span>
                        </div>

                        <!-- Button -->

                        <div class="input__btn">
                            <button class="btn btn-primary add__staf-btn btn_add-staff" type="submit">Thêm nhân viên</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bundle JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#avatar__img")
                    .attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // (() => {
    //     'use strict'

    //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    //     const forms = document.querySelectorAll('.needs-validation')

    //     // Loop over them and prevent submission
    //     Array.from(forms).forEach(form => {
    //         form.addEventListener('submit', event => {
    //             if (!form.checkValidity()) {
    //                 event.preventDefault()
    //                 event.stopPropagation()
    //             }

    //             form.classList.add('was-validated')
    //         }, false)
    //     })
    // })()
</script>

<script>
        const btnShowCurrentPassword = document.querySelector('.btn-show-current-password');

        btnShowCurrentPassword.onclick = function() {
            const input = document.querySelector('input[id="staffPassword"]');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
                btnShowCurrentPassword.querySelector('i').className = 'fa-regular fa-eye-slash';
            } else {
                input.setAttribute('type', 'password')
                btnShowCurrentPassword.querySelector('i').className = 'fa-regular fa-eye';
            }
        }

        const btnShowNewPassword = document.querySelector('.btn-show-new-password');
</script>      

<script>
    const inputStaffID = document.querySelector('input#staffID');
    const inputStaffUser = document.querySelector('input#staffUser');
    const inputStaffEmail = document.querySelector('input#staffEmail');
    const inputStaffUserHidden = document.querySelector('input[name="staffUser"]');
    const inputStaffEmailHidden = document.querySelector('input[name="staffEmail"]');
    const selectStaffDepartment = document.querySelector('select[name="staffDepartment"]');

    function handleUsername() {
        inputStaffUser.value = `${selectStaffDepartment.value}-${inputStaffID.value}`;
        inputStaffUserHidden.value = `${selectStaffDepartment.value}-${inputStaffID.value}`;

        inputStaffEmail.value = `${selectStaffDepartment.value}-${inputStaffID.value}@gmail.com`;
        inputStaffEmailHidden.value = `${selectStaffDepartment.value}-${inputStaffID.value}@gmail.com`;
    }

    inputStaffID.addEventListener('input', handleUsername);
    selectStaffDepartment.addEventListener('change', handleUsername);
</script>
</html>