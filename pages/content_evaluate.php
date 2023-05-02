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
            href="../asset/styles/style_content_evaluate.css"
        />

        <title>Quan Ly Nhan Su</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid p-0">
                <div class="evaluate-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="evaluate-content__header">
                                <h2 class="header__title">Đánh giá kế hoạch</h2>
                                <div class="evaluate-content__fliter">
                                    <div
                                        class="evaluate-content__fliter-form-group"
                                    >
                                        <label
                                            for=""
                                            class="form-label evaluate-content__fliter-label"
                                        >
                                            Khu vực
                                        </label>
                                        <select
                                            class="evaluate-content__filter-select form-select"
                                            aria-label="Default select example"
                                        >
                                            <option selected>
                                                ------ Tất cả ------
                                            </option>
                                            <option value="1">Cần Thơ</option>
                                            <option value="2">Nha Trang</option>
                                        </select>
                                    </div>

                                    <div
                                        class="evaluate-content__fliter-form-group"
                                    >
                                        <label
                                            for=""
                                            class="form-label evaluate-content__fliter-label"
                                        >
                                            Năm
                                        </label>
                                        <input
                                            type="number"
                                            class="form-control evaluate-content__filter-input"
                                            min="1900"
                                            max="2099"
                                            step="1"
                                            value="2023"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div class="evaluate-content__body">
                                <table
                                    id="evaluate-table"
                                    class="table table-bordered display evaluate-content__table-staff"
                                >
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Mã kế hoạch</th>
                                            <th scope="col">Khu vực</th>
                                            <th scope="col">Tên phòng</th>
                                            <th scope="col">
                                                Ngày kết thúc dự kiến
                                            </th>
                                            <th scope="col">Tiến độ</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <th scope="row">KH001</th>
                                            <td>Cần Thơ</td>
                                            <td>Phòng kinh doanh</td>
                                            <td>31 - 12 - 2023</td>
                                            <td class="text-success">
                                                Đã hoàn thành
                                            </td>
                                            <td class="text-danger">
                                                Chưa đánh giá
                                            </td>
                                            <td>
                                                <a
                                                    href="./content_evaluate-detail.php"
                                                >
                                                    Chi tiết
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row">KH002</th>
                                            <td>Cần Thơ</td>
                                            <td>Phòng nhân sự</td>
                                            <td>31 - 12 - 2023</td>
                                            <td class="text-danger">
                                                Chưa hoàn thành
                                            </td>
                                            <td class="text-danger">
                                                Chưa đánh giá
                                            </td>
                                            <td>
                                                <a
                                                    href="./content_evaluate-detail.php"
                                                >
                                                    Chi tiết
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Jquery -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    <!-- Bootstrap bundle -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"
    ></script>

    <!-- DataTables plugins jquery -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>

    <script>
        const tooltipTriggerList = document.querySelectorAll(
            '[data-bs-toggle="tooltip"]'
        );
        const tooltipList = [...tooltipTriggerList].map(
            (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
        );
    </script>

    <script>
        $(document).ready(function () {
            $("#evaluate-table").DataTable();
        });
    </script>
</html>
