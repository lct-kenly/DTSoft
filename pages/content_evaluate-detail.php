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
            href="../asset/styles/style_content_evaluate_detail.css"
        />

        <title>Quan Ly Nhan Su</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid p-0">
                <div class="evaluate-detail-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="evaluate-detail-content__header">
                                <h2 class="header__title">
                                    Chi tiết đánh giá kế hoạch
                                </h2>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <p class="fs-4">
                                            <span class="fw-bold"
                                                >Mã kế hoạch:</span
                                            >
                                            <span class="ms-2"
                                                >KH001
                                                <span class="badge bg-danger">
                                                    Chưa đánh giá
                                                </span>
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-center fs-4">
                                            <span class="fw-bold"
                                                >Khu vực:</span
                                            >
                                            <span class="ms-2">Cần Thơ</span>
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p class="text-end fs-4">
                                            <span class="fw-bold"
                                                >Bộ phận:</span
                                            >
                                            <span class="ms-2"
                                                >Phòng kinh doanh</span
                                            >
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        <p class="fs-4">
                                            <span class="fw-bold"
                                                >Thời gian bắt đầu:</span
                                            >
                                            <span class="ms-2"
                                                >01 - 01 - 2023</span
                                            >
                                        </p>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <p class="text-center fs-4">
                                            <span class="fw-bold"
                                                >Thời gian kết thúc dự
                                                kiến:</span
                                            >
                                            <span class="ms-2"
                                                >31 - 12 - 2023</span
                                            >
                                        </p>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <p class="text-end fs-4">
                                            <span class="fw-bold"
                                                >Thời gian kết thúc:</span
                                            >
                                            <span class="ms-2"
                                                >30 - 11 - 2023</span
                                            >
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="evaluate-detail-content__body">
                                <table
                                    id="evaluate-detail-table"
                                    class="table table-bordered display evaluate-detail-content__table-staff"
                                >
                                    <caption class="mt-4 text-center">
                                        Tổng chỉ tiêu đề ra cho kế hoạch
                                    </caption>
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Tên chỉ tiêu</th>
                                            <th scope="col">
                                                Tổng chỉ tiêu cần đạt
                                            </th>
                                            <th scope="col">
                                                Tổng chỉ tiêu đạt được
                                            </th>
                                            <th scope="col">
                                                Mức độ hoàn thành
                                            </th>
                                            <th scope="col">Đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <th>Doanh số</th>
                                            <td>1.400.000.000</td>
                                            <td>1.470.000.000</td>
                                            <td>105%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Xuất hóa đơn</th>
                                            <td>500</td>
                                            <td>500</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Thu hồi công nợ</th>
                                            <td>1.400.000.000</td>
                                            <td>1.400.000.000</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Phát triển khách hàng</th>
                                            <td>100</td>
                                            <td>80</td>
                                            <td>80%</td>
                                            <td>Chưa đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Hỗ trợ khách hàng</th>
                                            <td>2400</td>
                                            <td>1920</td>
                                            <td>80%</td>
                                            <td>Chưa đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Hiểu biết sản phẩm</th>
                                            <td>8</td>
                                            <td>8</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <span class="fw-bold"
                                                    >Đánh giá tổng thể kế hoạch:
                                                </span>
                                                <a
                                                    href=""
                                                    class="btn btn-lg btn-success ms-3"
                                                    >Đạt</a
                                                >
                                                <a
                                                    href=""
                                                    class="btn btn-lg btn-warning text-white ms-3"
                                                    >Chưa đạt</a
                                                >
                                                <a
                                                    href=""
                                                    class="btn btn-lg btn-danger ms-3"
                                                    >Không đạt</a
                                                >
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <table
                                    id="evaluate-detail-table-list-staff"
                                    class="table table-bordered display evaluate-detail-content__table-staff"
                                >
                                    <caption class="mt-4 text-center">
                                        Danh sách nhân viên thuộc kế hoạch
                                    </caption>
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Tên nhân viên</th>
                                            <th scope="col">Tên chỉ tiêu</th>
                                            <th scope="col">
                                                Chỉ tiêu cần đạt
                                            </th>
                                            <th scope="col">
                                                Chỉ tiêu đạt được
                                            </th>
                                            <th scope="col">
                                                Mức độ hoàn thành
                                            </th>
                                            <th scope="col">Đánh giá</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <th>Nguyễn Văn A</th>
                                            <th>Doanh số</th>
                                            <td>700.000.000</td>
                                            <td>770.000.000</td>
                                            <td>110%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn A</th>
                                            <th>Xuất hóa đơn</th>
                                            <td>250</td>
                                            <td>250</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn A</th>
                                            <th>Thu hồi công nợ</th>
                                            <td>700.000.000</td>
                                            <td>700.000.000</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn A</th>
                                            <th>Phát triển khách hàng</th>
                                            <td>50</td>
                                            <td>30</td>
                                            <td>60%</td>
                                            <td>Không đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn A</th>
                                            <th>Hỗ trợ khách hàng</th>
                                            <td>1200</td>
                                            <td>960</td>
                                            <td>80%</td>
                                            <td>Chưa đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn A</th>
                                            <th>Hiểu biết sản phẩm</th>
                                            <td>4</td>
                                            <td>4</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn B</th>
                                            <th>Doanh số</th>
                                            <td>700.000.000</td>
                                            <td>770.000.000</td>
                                            <td>110%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn B</th>
                                            <th>Xuất hóa đơn</th>
                                            <td>250</td>
                                            <td>250</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn B</th>
                                            <th>Thu hồi công nợ</th>
                                            <td>700.000.000</td>
                                            <td>700.000.000</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn B</th>
                                            <th>Phát triển khách hàng</th>
                                            <td>50</td>
                                            <td>30</td>
                                            <td>60%</td>
                                            <td>Không đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn B</th>
                                            <th>Hỗ trợ khách hàng</th>
                                            <td>1200</td>
                                            <td>960</td>
                                            <td>80%</td>
                                            <td>Chưa đạt</td>
                                        </tr>

                                        <tr>
                                            <th>Nguyễn Văn B</th>
                                            <th>Hiểu biết sản phẩm</th>
                                            <td>4</td>
                                            <td>4</td>
                                            <td>100%</td>
                                            <td>Đạt</td>
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
            $("#evaluate-detail-table-list-staff").DataTable();
        });
    </script>
</html>
