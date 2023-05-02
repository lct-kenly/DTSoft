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
        <link rel="stylesheet" href="../asset/styles/reset.css" />
        <link rel="stylesheet" href="../asset/styles/base.css" />
        <link
            rel="stylesheet"
            href="../asset/styles/style_change_password.css"
        />

        <title>Quan Ly Nhan Su</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-flud">
                <div class="row header">
                    <h2 class="header__title">Đổi mật khẩu</h2>
                </div>

                <div class="row content">
                    <form class="form__content">
                        <div class="form-group">
                            <label for="CurrentPassword"
                                >Mật khẩu hiện tại</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="CurrentPassword"
                                placeholder="Nhập mật khẩu hiện tại"
                            />
                        </div>
                        <div class="form-group">
                            <label for="NewPassword">Mật khẩu mới</label>
                            <input
                                type="password"
                                class="form-control"
                                id="NewPassword"
                                placeholder="Nhập mật khẩu mới"
                            />
                        </div>

                        <div class="form-group">
                            <label for="ConfirmNewPassword">
                                Nhập lại mật khẩu mới</label
                            >
                            <input
                                type="password"
                                class="form-control"
                                id="ConfirmNewPassword"
                                placeholder="Nhập lại mật khẩu mới"
                            />
                        </div>
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
</html>
