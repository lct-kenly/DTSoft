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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

        <!-- Styles Css -->
        <link rel="stylesheet" href="../asset/styles/reset.css" />
        <link rel="stylesheet" href="../asset/styles/base.css" />
        <link rel="stylesheet" href="../asset/styles/styles.css" />
        <title>Quan Ly Nhan Su</title>
    </head>
    <body>
        <div class="container-fluid">
            <!-- Content -->
            <div class="row main__login">
                <div class="col-lg-4 main__login_form">
                    <h1 class="main__login_form__header">Quản lý nhân sự</h1>
                    <div class="main__login_form__input">
                        <div class="main__login_form__input_field">
                            <label for="">Tài Khoản</label>
                            <input
                                type="text"
                                class="input"
                                id="taikhoan"
                                required
                                autocomplete="off"
                            />
                        </div>
                        <div class="main__login_form__input_field">
                            <label for="">Mật Khẩu</label>
                            <input
                                type="password"
                                class="input"
                                id="password"
                                required
                            />
                        </div>
                        <div class="main__login_form__input_field">
                            <input
                                type="submit"
                                class="submit-btn"
                                value="Đăng nhập"
                            />
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 main__login_logo"></div>
            </div>
            <!-- End Content -->
        </div>
    </body>
</html>
