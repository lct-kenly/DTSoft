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
                    <div class="col-md-6">
                        <div class="content">
                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Mã nhân viên:</h3>
                                <p class="staff__info-desc">A001</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Họ tên:</h3>
                                <p class="staff__info-desc">Nguyễn Văn A</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Phòng ban:</h3>
                                <p class="staff__info-desc">Hành chính</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Chức vụ:</h3>
                                <p class="staff__info-desc">Nhân viên</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Khu vực:</h3>
                                <p class="staff__info-desc">Cần Thơ</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Ngày sinh:</h3>
                                <p id="changeForm" class="staff__info-desc">
                                    dd/mm/yyyy
                                </p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Giới tính:</h3>
                                <p class="staff__info-desc">Nam</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">
                                    Số điện thoại:
                                </h3>
                                <p id="changeForm" class="staff__info-desc">
                                    1234567890
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="content">
                            <div class="content__staff-img">
                                <img src="../asset/img/1.jpg" alt="avatar" />
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Email:</h3>
                                <a href="#!" class="staff__info-desc">
                                    abc@gmail.com
                                </a>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Tài khoản:</h3>
                                <p class="staff__info-desc">001NVA</p>
                            </div>

                            <div class="content__staff-info">
                                <h3 class="staff__info-title">Mật khẩu:</h3>
                                <p class="staff__info-desc">***********</p>
                            </div>

                            <div class="btn btn-primary content__staff-btn">
                                <a href="/content_change_password.php">
                                    Đổi mật khẩu
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
