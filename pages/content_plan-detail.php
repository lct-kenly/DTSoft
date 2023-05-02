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
                                <h2 class="header__title">Chi tiết kế hoạch</h2>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <p class="fs-4">
                                            <span class="fw-bold"
                                                >Mã kế hoạch:</span
                                            >
                                            <span class="ms-2"
                                                >KH001
                                                <span class="badge bg-danger">
                                                    Đang tiến hành
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

                                    <div class="col-md-12 mt-4">
                                        <p class="fs-4">
                                            <span class="fw-bold"
                                                >Mô tả kế hoạch:</span
                                            >
                                            <span class="ms-2"
                                                >Lorem Ipsum chỉ đơn giản là một
                                                đoạn văn bản giả, được dùng vào
                                                việc trình bày và dàn trang phục
                                                vụ cho in ấn.
                                            </span>
                                        </p>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <button
                                            class="btn btn-info text-white fs-5"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-plan-edit"
                                        >
                                            <i
                                                class="fa-regular fa-pen-to-square me-2"
                                            ></i>
                                            Chỉnh sửa kế hoạch
                                        </button>

                                        <button
                                            class="btn btn-primary text-white fs-5 ms-4 js-add-staff"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modal-plan"
                                        >
                                            <i
                                                class="fa-solid fa-plus me-2"
                                            ></i>
                                            Thêm nhân viên
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="evaluate-detail-content__body">
                                <table
                                    id="evaluate-detail-table-list-staff"
                                    class="table table-bordered display evaluate-detail-content__table-staff"
                                >
                                    <caption class="mt-4 text-center">
                                        Danh sách nhân viên thuộc kế hoạch
                                    </caption>
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Mã nhân viên</th>
                                            <th scope="col">Tên nhân viên</th>
                                            <th scope="col">Doanh số</th>
                                            <th scope="col">Xuất hóa đơn</th>
                                            <th scope="col">Thu hồi công nợ</th>
                                            <th scope="col">
                                                Phát triển khách hàng
                                            </th>
                                            <th scope="col">
                                                Hỗ trợ khách hàng
                                            </th>
                                            <th scope="col">
                                                Hiểu biết sản phẩm
                                            </th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                        <tr>
                                            <th>NV001</th>
                                            <th>Nguyễn Văn A</th>
                                            <th>700.000.000</th>
                                            <td>250</td>
                                            <td>700.000.000</td>
                                            <td>50</td>
                                            <td>1200</td>
                                            <td>4</td>
                                            <td>
                                                <button
                                                    class="btn btn-info text-white fs-5 js-edit-staff"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-plan"
                                                >
                                                    <i
                                                        class="fa-regular fa-pen-to-square"
                                                    ></i>
                                                </button>
                                                <button
                                                    class="btn btn-danger fs-5"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-staff"
                                                >
                                                    <i
                                                        class="fa-regular fa-trash-can"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>NV002</th>
                                            <th>Nguyễn Văn B</th>
                                            <th>700.000.000</th>
                                            <td>250</td>
                                            <td>700.000.000</td>
                                            <td>50</td>
                                            <td>1200</td>
                                            <td>4</td>
                                            <td>
                                                <button
                                                    class="btn btn-info text-white fs-5 js-edit-staff"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-plan"
                                                >
                                                    <i
                                                        class="fa-regular fa-pen-to-square"
                                                    ></i>
                                                </button>
                                                <button
                                                    class="btn btn-danger fs-5"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-staff"
                                                >
                                                    <i
                                                        class="fa-regular fa-trash-can"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>NV003</th>
                                            <th>Nguyễn Văn C</th>
                                            <th>700.000.000</th>
                                            <td>250</td>
                                            <td>700.000.000</td>
                                            <td>50</td>
                                            <td>1200</td>
                                            <td>4</td>
                                            <td>
                                                <button
                                                    class="btn btn-info text-white fs-5 js-edit-staff"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-plan"
                                                >
                                                    <i
                                                        class="fa-regular fa-pen-to-square"
                                                    ></i>
                                                </button>
                                                <button
                                                    class="btn btn-danger fs-5"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-staff"
                                                >
                                                    <i
                                                        class="fa-regular fa-trash-can"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>NV004</th>
                                            <th>Nguyễn Văn D</th>
                                            <th>700.000.000</th>
                                            <td>250</td>
                                            <td>700.000.000</td>
                                            <td>50</td>
                                            <td>1200</td>
                                            <td>4</td>
                                            <td>
                                                <button
                                                    class="btn btn-info text-white fs-5 js-edit-staff"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-plan"
                                                >
                                                    <i
                                                        class="fa-regular fa-pen-to-square"
                                                    ></i>
                                                </button>
                                                <button
                                                    class="btn btn-danger fs-5"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modal-delete-staff"
                                                >
                                                    <i
                                                        class="fa-regular fa-trash-can"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th
                                                class="fw-bold text-center"
                                                colspan="2"
                                            >
                                                Tổng chỉ tiêu cần đạt
                                            </th>
                                            <th class="fw-bold text-center">
                                                2.800.000.000
                                            </th>
                                            <td class="fw-bold text-center">
                                                1000
                                            </td>
                                            <td class="fw-bold text-center">
                                                2.800.000.000
                                            </td>
                                            <td class="fw-bold text-center">
                                                200
                                            </td>
                                            <td class="fw-bold text-center">
                                                4800
                                            </td>
                                            <td class="fw-bold text-center">
                                                16
                                            </td>
                                        </tr>
                                        <tr>
                                            <th
                                                class="fw-bold text-center"
                                                colspan="2"
                                            >
                                                Tổng chỉ tiêu đã đạt (4 tháng)
                                            </th>
                                            <th class="fw-bold text-center">
                                                1.000.000.000
                                            </th>
                                            <td class="fw-bold text-center">
                                                350
                                            </td>
                                            <td class="fw-bold text-center">
                                                1.000.000.000
                                            </td>
                                            <td class="fw-bold text-center">
                                                70
                                            </td>
                                            <td class="fw-bold text-center">
                                                1600
                                            </td>
                                            <td class="fw-bold text-center">
                                                6
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="row my-4">
                                    <div class="col-md-12">
                                        <h4 class="text-center fs-3 fw-bold">
                                            Biểu đồ theo dõi chỉ tiêu theo tháng
                                        </h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pe-4">
                                        <canvas id="revenue"></canvas>
                                    </div>
                                    <div class="col-md-6 ps-4">
                                        <canvas id="bill"></canvas>
                                    </div>

                                    <div class="col-md-6 my-4 pe-4">
                                        <canvas id="debt"></canvas>
                                    </div>
                                    <div class="col-md-6 my-4 ps-4">
                                        <canvas id="new-customer"></canvas>
                                    </div>

                                    <div class="col-md-6 my-4 pe-4">
                                        <canvas id="support-customer"></canvas>
                                    </div>
                                    <div class="col-md-6 my-4 ps-4">
                                        <canvas id="products"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal plan edit-->
        <div
            class="modal fade"
            id="modal-plan-edit"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="exampleModalLabel">
                            Chỉnh sửa thông tin kế hoạch
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3 mt-4">
                                <label
                                    for="MAKH"
                                    class="form-label fw-bold fs-5 fw-bold fs-5"
                                    >Mã kế hoạch</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="MAKH"
                                    value="KH001"
                                />
                            </div>
                            <div class="mb-3 mt-4">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label fw-bold fs-5 fw-bold fs-5"
                                    >Thời gian</label
                                >
                                <div class="d-flex align-items-center">
                                    <input
                                        type="date"
                                        class="form-control fs-5"
                                    />
                                    <span class="mx-4">Đến</span>
                                    <input
                                        type="date"
                                        class="form-control fs-5"
                                    />
                                </div>
                            </div>
                            <div class="mb-3 mt-4">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label fw-bold fs-5 fw-bold fs-5"
                                    >Mã khu vực</label
                                >
                                <select
                                    class="form-select fs-5"
                                    aria-label="Default select example"
                                >
                                    <option value="1">NT - Nha Trang</option>
                                    <option value="2">CT - Cần Thơ</option>
                                </select>
                            </div>

                            <div class="mb-3 mt-4">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label fw-bold fs-5 fw-bold fs-5"
                                    >Mã bộ phận</label
                                >
                                <select
                                    class="form-select fs-5"
                                    aria-label="Default select example"
                                >
                                    <option value="1">KD - Kinh doanh</option>
                                    <option value="2">MKT - Marketing</option>
                                    <option value="3">NS - Nhân sự</option>
                                </select>
                            </div>

                            <div class="mb-3 mt-4">
                                <label
                                    for="exampleInputPassword1"
                                    class="form-label fw-bold fs-5 fw-bold fs-5"
                                    >Mô tả</label
                                >
                                <textarea
                                    name=""
                                    id=""
                                    cols="30"
                                    rows="10"
                                    class="form-control fs-5"
                                ></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary fs-5"
                            data-bs-dismiss="modal"
                        >
                            Hủy
                        </button>
                        <button type="button" class="btn btn-primary fs-5">
                            <i class="fa-regular fa-floppy-disk me-2"></i> Lưu
                            lại
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit staff / add staff-->
        <div
            class="modal fade"
            id="modal-plan"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="exampleModalLabel">
                            Chỉnh sửa chỉ tiêu nhân viên
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3 mt-4">
                                <label
                                    for="MANV"
                                    class="form-label fw-bold fs-5"
                                    >Mã nhân viên</label
                                >
                                <select
                                    class="form-select fs-5"
                                    aria-label="Default select example"
                                >
                                    <option value="2">
                                        NV001 - Nguyễn Văn A
                                    </option>
                                    <option value="3">
                                        NV002 - Nguyễn Văn A
                                    </option>
                                    <option value="3">
                                        NV003 - Nguyễn Văn A
                                    </option>
                                    <option value="3">
                                        NV004 - Nguyễn Văn A
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3 mt-4">
                                <label for="DT" class="form-label fw-bold fs-5"
                                    >Doanh thu</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="DT"
                                    value="700000000"
                                />
                            </div>

                            <div class="mb-3 mt-4">
                                <label for="XHD" class="form-label fw-bold fs-5"
                                    >Xuất hóa đơn</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="XHD"
                                    value="250"
                                />
                            </div>

                            <div class="mb-3 mt-4">
                                <label
                                    for="THCN"
                                    class="form-label fw-bold fs-5"
                                    >Thu hồi công nợ</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="THCN"
                                    value="700000000"
                                />
                            </div>

                            <div class="mb-3 mt-4">
                                <label
                                    for="PTKH"
                                    class="form-label fw-bold fs-5"
                                    >Phát triển khách hàng</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="PTKH"
                                    value="100"
                                />
                            </div>

                            <div class="mb-3 mt-4">
                                <label
                                    for="HTKH"
                                    class="form-label fw-bold fs-5"
                                    >Hỗ trợ khách hàng</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="HTKH"
                                    value="1200"
                                />
                            </div>

                            <div class="mb-3 mt-4">
                                <label
                                    for="HBSP"
                                    class="form-label fw-bold fs-5"
                                    >Hiểu biết sản phẩm</label
                                >
                                <input
                                    type="text"
                                    class="form-control fs-5"
                                    id="HBSP"
                                    value="4"
                                />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary fs-5"
                            data-bs-dismiss="modal"
                        >
                            Hủy
                        </button>
                        <button type="button" class="btn btn-primary fs-5">
                            <i class="fa-regular fa-floppy-disk me-2"></i> Lưu
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal delete staff-->
        <div
            class="modal fade"
            id="modal-delete-staff"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-3" id="exampleModalLabel">
                            Xóa nhân viên khỏi kế hoạch
                        </h1>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <h1 class="fs-5">
                            Bạn có chắc xóa nhân viên này khỏi kế hoạch ? (Hành
                            động không thể khôi phục)
                        </h1>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Hủy
                        </button>
                        <button type="button" class="btn btn-danger">
                            Xóa
                        </button>
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

    <!-- Chart js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Main JS -->
    <script src="../asset/js/main.js"></script>

    <script>
        const exampleModal = document.getElementById("modal-plan");
        exampleModal.addEventListener("show.bs.modal", (event) => {
            // Button that triggered the modal
            const button = event.relatedTarget;
            const modalTitle = exampleModal.querySelector(".modal-title");
            const modalBodyInput =
                exampleModal.querySelector(".modal-body input");

            if (button.matches(".js-add-staff")) {
                modalTitle.textContent = "Thêm nhân viên vào kế hoạch";
            } else {
                modalTitle.textContent = "Chỉnh sửa chỉ tiêu nhân viên";
            }
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#evaluate-detail-table-list-staff").DataTable();
        });
    </script>

    <script>
        const revenue = document.getElementById("revenue");
        const bill = document.getElementById("bill");
        const dept = document.getElementById("dept");
        const newCustomer = document.getElementById("new-customer");
        const supportCustomer = document.getElementById("support-customer");
        const products = document.getElementById("products");

        new Chart(revenue, {
            type: "line",
            data: {
                labels: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Thánh 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                datasets: [
                    {
                        label: "Doanh thu",
                        data: [250000000, 200000000, 250000000, 300000000],
                        borderWidth: 1,
                        backgroundColor: "#22c55e",
                        borderColor: "#22c55e",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Biểu đồ tổng doanh thu qua từng tháng",
                    },
                },
            },
        });

        new Chart(bill, {
            type: "line",
            data: {
                labels: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Thánh 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                datasets: [
                    {
                        label: "Xuất hóa đơn",
                        data: [90, 71, 90, 99],
                        borderWidth: 1,
                        backgroundColor: "#164e63",
                        borderColor: "#164e63",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Biểu đồ tổng hóa đơn xuất qua từng tháng",
                    },
                },
            },
        });

        new Chart(debt, {
            type: "line",
            data: {
                labels: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Thánh 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                datasets: [
                    {
                        label: "Thu hồi công nợ",
                        data: [250000000, 200000000, 250000000, 300000000],
                        borderWidth: 1,
                        backgroundColor: "#06b6d4",
                        borderColor: "#06b6d4",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Biểu đồ tổng thu hồi công nợ qua từng tháng",
                    },
                },
            },
        });

        new Chart(newCustomer, {
            type: "line",
            data: {
                labels: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Thánh 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                datasets: [
                    {
                        label: "Phát triển khách hàng",
                        data: [20, 15, 15, 30],
                        borderWidth: 1,
                        backgroundColor: "#8b5cf6",
                        borderColor: "#8b5cf6",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Biểu đồ tổng khách hàng mới qua từng tháng",
                    },
                },
            },
        });

        new Chart(supportCustomer, {
            type: "line",
            data: {
                labels: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Thánh 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                datasets: [
                    {
                        label: "Hỗ trợ khách hàng",
                        data: [400, 450, 300, 450],
                        borderWidth: 1,
                        backgroundColor: "#f43f5e",
                        borderColor: "#f43f5e",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Biểu đồ tổng khách hàng đã hỗ trợ qua từng tháng",
                    },
                },
            },
        });

        new Chart(products, {
            type: "line",
            data: {
                labels: [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Thánh 10",
                    "Tháng 11",
                    "Tháng 12",
                ],
                datasets: [
                    {
                        label: "Hiểu biết sản phẩm",
                        data: [2, 1, 1, 2],
                        borderWidth: 1,
                        backgroundColor: "#eab308",
                        borderColor: "#eab308",
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    title: {
                        display: true,
                        text: "Biểu đồ tổng doanh thu của kế hoạch qua từng tháng",
                    },
                },
            },
        });
    </script>
</html>
