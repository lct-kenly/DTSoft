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
        <link rel="stylesheet" href="../asset/styles/style_target-month.css" />
        <title>Quan Ly Nhan Su</title>
    </head>

    <body>
        <div class="container-flud">
            <div class="row row__background">
                <div class="col-12 col-12__background">
                    <div class="row header">
                        <h2 class="header__title">
                            Chỉ tiêu nhân viên theo tháng
                        </h2>
                    </div>
                    <div class="row row__select">
                        <div class="col-12 col-12__select">
                            <div class="row row__select-box">
                                <div class="col-2 col-2__select">
                                    <form action="#">
                                        <div class="select-box">
                                            <label
                                                for="select-box1"
                                                class="label select-box1"
                                                ><span class="label-desc"
                                                    >Mã khu vực</span
                                                >
                                            </label>
                                            <select
                                                id="select-box1"
                                                class="select"
                                            >
                                                <option value="Choice 1">
                                                    Falkland Islands
                                                </option>
                                                <option value="Choice 2">
                                                    Germany
                                                </option>
                                                <option value="Choice 3">
                                                    Neverland
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2 col-2__select">
                                    <form action="#">
                                        <div class="select-box">
                                            <label
                                                for="select-box1"
                                                class="label select-box1"
                                                ><span class="label-desc"
                                                    >Mã bộ phận</span
                                                >
                                            </label>
                                            <select
                                                id="select-box1"
                                                class="select"
                                            >
                                                <option value="Choice 1">
                                                    Falkland Islands
                                                </option>
                                                <option value="Choice 2">
                                                    Germany
                                                </option>
                                                <option value="Choice 3">
                                                    Neverland
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div
                                    class="col-2 col-2__select"
                                    style="float: left"
                                >
                                    <form action="#">
                                        <div class="select-box">
                                            <label
                                                for="select-box1"
                                                class="label select-box1"
                                                ><span class="label-desc"
                                                    >Tháng</span
                                                >
                                            </label>
                                            <select
                                                id="select-box1"
                                                class="select"
                                            >
                                                <option value="Choice 1">
                                                    Falkland Islands
                                                </option>
                                                <option value="Choice 2">
                                                    Germany
                                                </option>
                                                <option value="Choice 3">
                                                    Neverland
                                                </option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2 col-2__search">
                                    <div class="col-2__search-container">
                                        <form action="#">
                                            <button type="submit">Tìm</button>
                                        </form>
                                    </div>
                                </div>
                                <div
                                    class="col-2 col-2__edit"
                                    style="float: right"
                                >
                                    <div class="col-2__edit__container">
                                        <form
                                            action="content_target-month-detail.php"
                                        >
                                            <button
                                                type="submit"
                                                disabled="disabled"
                                            >
                                                Kê Khai
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12__display">
                            <p class="col-12__display__area">Khu vực:</p>
                            <p class="col-12__display__location">Cần Thơ</p>
                            <p class="col-12__display__area">Bộ phận</p>
                            <p class="col-12__display__location">Marketing</p>
                            <p class="col-12__display__area">Tháng:</p>
                            <p class="col-12__display__location">1</p>
                        </div>
                    </div>

                    <div class="row row__detail">
                        <div class="col-12 col-12__detail">
                            <div>
                                <table>
                                    <tr>
                                        <th>Tên nhân viên</th>
                                        <th>Doanh số</th>
                                        <th>Xuất hóa đơn</th>
                                        <th>Thu hồi công nợ</th>
                                        <th>Phát triển KH</th>
                                        <th>Hỗ trợ KH</th>
                                        <th>Hiểu biết sản phẩm</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>Nguyễn Văn A</td>
                                        <td>1000000</td>
                                        <td>200</td>
                                        <td>111</td>
                                        <td>30000</td>
                                        <td>10000</td>
                                        <td>7983</td>
                                        <td>
                                            <a
                                                class="col-12__detail__more"
                                                href="content_target-month-detail.php"
                                                >Chỉnh sửa</a
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nguyễn Văn A</td>
                                        <td>1000000</td>
                                        <td>200</td>
                                        <td>111</td>
                                        <td>30000</td>
                                        <td>10000</td>
                                        <td>7983</td>
                                        <td>
                                            <a
                                                class="col-12__detail__more"
                                                href="content_target-month-detail.php"
                                                >Chỉnh sửa</a
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nguyễn Văn A</td>
                                        <td>1000000</td>
                                        <td>200</td>
                                        <td>111</td>
                                        <td>30000</td>
                                        <td>10000</td>
                                        <td>7983</td>
                                        <td>
                                            <a
                                                class="col-12__detail__more"
                                                href="content_target-month-detail.php"
                                                >Chỉnh sửa</a
                                            >
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
