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
            href="../asset/styles/style_content_statistical.css"
        />

        <title>Quan Ly Nhan Su</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid p-0">
                <!-- Thống kê level trưởng phòng -->
                <div class="statistical-manager-content">
                    <div class="row m-0">
                        <div class="col-md-12">
                            <div class="statistical-manager-content__header">
                                <h2 class="header__title">
                                    Thống kê danh sách nhân viên phòng kinh
                                    doanh
                                </h2>
                                <select
                                    class="statistical-manager-content__filter form-select"
                                    aria-label="Default select example"
                                >
                                    <option selected value="ALL">
                                        ------ Tất cả -----
                                    </option>
                                    <option value="Đạt">Đạt kết quả</option>
                                    <option value="Chưa đạt">
                                        Chưa đạt kết quả
                                    </option>
                                </select>
                            </div>

                            <div class="statistical-manager-content__body">
                                <table
                                    id="manager-table"
                                    class="table table-bordered display statistical-manager-content__table-staff"
                                >
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Mã nhân viên</th>
                                            <th scope="col">Họ tên</th>
                                            <th scope="col">Chức vụ</th>
                                            <th scope="col">Mã kế hoạch</th>
                                            <th scope="col">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle"></tbody>
                                </table>

                                <div class="statistical-manager-content__chart">
                                    <div class="row">
                                        <div class="offset-md-4 col-md-4">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thống kê level nhân viên -->
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="main-content">
                            <h4 class="title">Thống kê hoạt động phòng kinh doanh </h4>

                        </div>
                    </div>
                </div> -->
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

    <!-- Chart js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- DataTables plugins jquery -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>
    <script>
        $(document).ready(function () {
            $("#manager-table").DataTable();
        });
    </script>

    <script>
        const listStaff = [
            {
                MANV: "NV001",
                HOTEN_NV: "Nguyễn Văn A",
                TEN_CV: "Quản lý",
                MAKEHOACH: "KH001",
                TRANG_THAI: "Đạt",
            },
            {
                MANV: "NV002",
                HOTEN_NV: "Nguyễn Văn B",
                TEN_CV: "Nhân viên",
                MAKEHOACH: "KH002",
                TRANG_THAI: "Chưa đạt",
            },
            {
                MANV: "NV003",
                HOTEN_NV: "Nguyễn Văn C",
                TEN_CV: "Nhân viên",
                MAKEHOACH: "KH003",
                TRANG_THAI: "Đạt",
            },
            {
                MANV: "NV004",
                HOTEN_NV: "Nguyễn Văn D",
                TEN_CV: "Nhân viên",
                MAKEHOACH: "KH004",
                TRANG_THAI: "Chưa đạt",
            },
            {
                MANV: "NV005",
                HOTEN_NV: "Nguyễn Văn E",
                TEN_CV: "Nhân viên",
                MAKEHOACH: "KH005",
                TRANG_THAI: "Chưa đạt",
            },
        ];

        const bodyTable = document.querySelector(
            ".statistical-manager-content__table-staff tbody"
        );
        const selectBox = document.querySelector(
            ".statistical-manager-content__filter"
        );

        const render = (arrData) => {
            const html = arrData.map((item, index) => {
                return `
                    <tr>
                        <th scope="row">${index + 1}</th>
                        <td>${item.MANV}</td>
                        <td>${item.HOTEN_NV}</td>
                        <td>${item.TEN_CV}</td>
                        <td>${item.MAKEHOACH}</td>
                        <td>${item.TRANG_THAI}</td>
                    </tr>
                `;
            });

            return html.join("");
        };

        bodyTable.innerHTML = render(listStaff);

        selectBox.addEventListener("change", (e) => {
            if (e.target.value === "ALL") {
                bodyTable.innerHTML = render(listStaff);
            } else {
                const newArrListStaff = listStaff.filter((item) => {
                    return item.TRANG_THAI === e.target.value;
                });

                bodyTable.innerHTML = render(newArrListStaff);
            }
        });

        let tongNhanVienDat = 0;
        let tongNhanVienChuaDat = 0;

        listStaff.forEach((item) => {
            if (item.TRANG_THAI === "Đạt") {
                tongNhanVienDat++;
            } else {
                tongNhanVienChuaDat++;
            }
        });

        const ctx = document.getElementById("myChart");

        const data = {
            labels: ["Chưa đạt", "Đạt"],
            datasets: [
                {
                    label: "Số lượng nhân viên",
                    data: [tongNhanVienChuaDat, tongNhanVienDat],
                    backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
                    hoverOffset: 4,
                },
            ],
            datasets: [
                {
                    label: "Số lượng nhân viên",
                    data: [5, 12],
                    backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
                    hoverOffset: 4,
                },
            ],
        };

        new Chart(ctx, {
            type: "pie",
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Tỉ lệ nhân viên hoàn thành kế hoạch",
                    },
                },
            },
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#manager-table").DataTable();
        });
    </script>
</html>
