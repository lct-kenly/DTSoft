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

        <!-- JS -->
        <link
            class="jsbin"
            href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
            rel="stylesheet"
            type="text/css"
        />
        <script
            class="jsbin"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
        ></script>
        <script
            class="jsbin"
            src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
        ></script>

        <!-- Styles Css -->
        <link rel="stylesheet" href="../asset/styles/reset.css" />
        <link rel="stylesheet" href="../asset/styles/base.css" />
        <link rel="stylesheet" href="../asset/styles/style_add_staff.css" />
        <title>Quan Ly Nhan Su</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-flud">
                <div class="row header">
                    <h2 class="header__title">Thêm nhân viên</h2>
                </div>

                <div class="row content">
                    <div class="col-md-6 content__left">
                        <!-- ID -->
                        <div class="input__form">
                            <label for="staffID" class="form-label input__label"
                                >Mã nhân viên</label
                            >
                            <input
                                type="text"
                                class="form-control input__value"
                                id="staffID"
                                placeholder="Mã nhân viên"
                            />
                        </div>

                        <!-- Name -->
                        <div class="input__form">
                            <label
                                for="staffName"
                                class="form-label input__label"
                                >Họ và tên</label
                            >
                            <input
                                type="text"
                                class="form-control input__value"
                                id="staffName"
                                placeholder="Họ và tên"
                            />
                        </div>

                        <!-- Date of birth -->
                        <div class="input__form">
                            <label
                                for="staffDateofBirth"
                                class="form-label input__label"
                                >Ngày sinh</label
                            >
                            <input
                                type="date"
                                class="form-control input__value"
                                id="staffDateofBirth"
                            />
                        </div>

                        <!-- Sex -->
                        <div class="input__form">
                            <p class="input__label">Giới tính</p>
                            <select class="form-select input__value">
                                <option selected>Giới tính</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>

                        <!-- Phone Number -->
                        <div class="input__form">
                            <label
                                for="staffPhone"
                                class="form-label input__label"
                                >Số diện thoại</label
                            >
                            <input
                                type="text"
                                class="form-control input__value"
                                id="staffPhone"
                            />
                        </div>

                        <!-- Position -->
                        <div class="input__form">
                            <p class="input__label">Chức vụ</p>
                            <select class="form-select input__value">
                                <option selected>Chức vụ</option>
                                <option value="1">Trưởng phòng</option>
                                <option value="2">Phó phòng</option>
                                <option value="3">Nhân viên</option>
                            </select>
                        </div>

                        <!-- Department -->
                        <div class="input__form">
                            <p class="input__label">Phòng ban</p>
                            <select class="form-select input__value">
                                <option selected>Phòng ban</option>
                                <option value="1">Nhân sự</option>
                                <option value="2">Kế toán</option>
                                <option value="3">Lập trình</option>
                                <option value="4">Tester</option>
                                <option value="5">Hổ trợ khách hàng</option>
                            </select>
                        </div>

                        <!-- Places -->
                        <div class="input__form">
                            <p class="input__label">Khu vực</p>
                            <select class="form-select input__value">
                                <option selected>Khu vực</option>
                                <option value="1">Hồ Chí Minh</option>
                                <option value="2">Nha Trang</option>
                                <option value="3">Cần Thơ</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 content__right">
                        <!-- Avatar -->
                        <div class="input__form input__avatar">
                            <div class="avatar__input">
                                <img src="#" alt="avatar" id="avatar__img" />
                            </div>
                            <input
                                type="file"
                                class="form-control input__value"
                                onchange="readURL(this);"
                            />
                        </div>

                        <!-- Email -->
                        <div class="input__form">
                            <label
                                for="staffEmail"
                                class="form-label input__label"
                                >Email</label
                            >
                            <input
                                type="email"
                                class="form-control input__value"
                                id="staffEmail"
                                placeholder="Email"
                            />
                        </div>

                        <!-- Staff Account -->
                        <div class="input__form">
                            <label
                                for="staffUser"
                                class="form-label input__label"
                                >Tài khoản</label
                            >
                            <input
                                type="text"
                                class="form-control input__value"
                                id="staffUser"
                                placeholder="Tài khoản"
                            />
                        </div>

                        <div class="input__form">
                            <label
                                for="staffPassword"
                                class="form-label input__label"
                                >Mật khẩu</label
                            >
                            <input
                                type="password"
                                class="form-control input__value"
                                id="staffPassword"
                                placeholder="Mật khẩu"
                            />
                        </div>

                        <!-- Button -->
                        <div class="input__btn">
                            <div class="btn btn-primary add__staf-btn">
                                Thêm nhân viên
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#avatar__img")
                        .attr("src", e.target.result)
                        .width(245)
                        .height(300);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>
