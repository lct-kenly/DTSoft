<?php
    require_once('../admin/config.php');
    if(!isset($_SESSION['username'])) {
        header("location: ./login.php");
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
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap"
            rel="stylesheet" 
        />

        <!-- Fontawesome -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />

        <!-- Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />

        <!-- DataTables plugins jquery -->
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"
        />

        <!-- Styles Css -->
        <link rel="stylesheet" href="./asset/styles/reset.css" />
        <link rel="stylesheet" href="./asset/styles/base.css" />
        <link
            rel="stylesheet"
            href="./asset/styles/style_change_password.css"
        />
        <?php
            
            
            if (!isset($_SESSION["Change_pass"])) {
                $_SESSION["Change_pass"] = array();
                $manv = $_GET["manv"];
            }
            
            $error = false;
            $success = false;
            $current_password="";
            $new_password="";
            $confirm_new_password="";

            if (isset($_GET['action'])){

                $manv_check = $_POST['manv_check'];
                $sql_true_password = "SELECT matkhau from taikhoan where manv = '".$manv_check."'";
                $result_true_password= mysqli_query($ketnoi, $sql_true_password);
                $true_password = mysqli_fetch_array($result_true_password);

                $current_password = $_POST['CurrentPassword'];
                $new_password = $_POST['NewPassword'];
                $confirm_new_password = $_POST['ConfirmNewPassword'];
                
                if($true_password['matkhau'] === $current_password){
                    if( $new_password === $confirm_new_password){
                        if($new_password === ""){       
                            $error = "Bạn nhập chưa nhập mật khẩu mới!";
                            $manv = $manv_check;                
                        } else {
                            $change_password = "UPDATE taikhoan SET matkhau='$new_password' WHERE manv = '".$manv_check."'";
                            $result_change_password = mysqli_query($ketnoi,$change_password);
                            $success = "Đổi mật khẩu thành công";
                            $current_password="";
                            $new_password="";
                            $confirm_new_password="";
                            unset($_SESSION['Change_pass']);
                            $manv = $manv_check;
                        }                        
                    }  else{
                            $error = "Bạn nhập sai mật khẩu xác nhận!";
                            $manv = $manv_check;
                        }
                } else {
                    $error = "Bạn nhập sai mật khẩu cũ!";   
                    $manv = $manv_check;               
                }
            }
        ?>

        <title>Quan Ly Nhan Su</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-flud">
                <div class="row header">
                    <h2 class="header__title">Đổi mật khẩu</h2>
                </div>

                <div class="row content">
                <?php if (!empty($error)) { ?> 
                    <div class="notify-msg" id="notify-msg">
                        <?= $error ?> 
                    </div>
                    <?php } elseif (!empty($success)) { ?>
                        <div class="notify-msg" id="notify-msg" >
                    <?= $success ?>. <a href="content_info_staff.php?manv=<?=$manv?>">Trang thông tin cá nhân</a>
                        </div>
                <?php } ?>
                    <form class="form__content" action="content_change_password.php?action=submit" method="POST" >
                        <div class="form-group">
                            <label for="CurrentPassword"
                                >Mật khẩu hiện tại</label
                            >
                            <div class="d-inline position-relative">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="CurrentPassword"
                                    name="CurrentPassword"
                                    placeholder="Nhập mật khẩu hiện tại"
                                    value="<?php echo $current_password; ?>"
                                />                            
                                <span class="btn-show-current-password"><i class="fa-regular fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="NewPassword">Mật khẩu mới</label>
                            <div class="d-inline position-relative">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="NewPassword"
                                    name="NewPassword"
                                    placeholder="Nhập mật khẩu mới"
                                    value="<?php echo $new_password; ?>"
                                    
                                />
                                <span class="btn-show-new-password" ><i class="fa-regular fa-eye"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ConfirmNewPassword">
                                Nhập lại mật khẩu mới</label
                            >
                            <div class="d-inline position-relative">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="ConfirmNewPassword"
                                    name="ConfirmNewPassword"
                                    placeholder="Nhập lại mật khẩu mới"
                                    value="<?php echo $confirm_new_password; ?>"
                                />
                                <span class="btn-show-confirm-new-password"><i class="fa-regular fa-eye"></i></span>
                            </div>
                            <input type="hidden" name="manv_check" value="<?=$manv?>">
                        <button
                            type="submit"
                            class="btn btn-primary btn-change-password"
                        >
                            Đổi mật khẩu
                        </button>
                    </form> 
                </div>
            </div>
        </div>
    </body>
    <script>
        const btnShowCurrentPassword = document.querySelector('.btn-show-current-password');

        btnShowCurrentPassword.onclick = function() {
            const input = document.querySelector('input[name="CurrentPassword"]');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
                btnShowCurrentPassword.querySelector('i').className = 'fa-regular fa-eye-slash';
            } else {
                input.setAttribute('type', 'password')
                btnShowCurrentPassword.querySelector('i').className = 'fa-regular fa-eye';
            }
        }

        const btnShowNewPassword = document.querySelector('.btn-show-new-password');

        btnShowNewPassword.onclick = function() {
            const input = document.querySelector('input[name="NewPassword"]');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
                btnShowNewPassword.querySelector('i').className = 'fa-regular fa-eye-slash';
            } else {
                input.setAttribute('type', 'password')
                btnShowNewPassword.querySelector('i').className = 'fa-regular fa-eye';
            }
        }

        const btnShowConfirmNewPassword = document.querySelector('.btn-show-confirm-new-password');

        btnShowConfirmNewPassword.onclick = function() {
            const input = document.querySelector('input[name="ConfirmNewPassword"]');

            if(input.getAttribute('type') == 'password') {
                input.setAttribute('type', 'text');
                btnShowConfirmNewPassword.querySelector('i').className = 'fa-regular fa-eye-slash';
            } else {
                input.setAttribute('type', 'password')
                btnShowConfirmNewPassword.querySelector('i').className = 'fa-regular fa-eye';
            }
        }
    </script>
</html>
