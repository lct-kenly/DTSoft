<?php
require_once('../admin/config.php');
if (!isset($_SESSION['username'])) {
    header("location: ../dang-nhap");
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet" />

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- DataTables plugins jquery -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

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
                                <h2 class="header__title ms-0">
                                    Thống kê danh sách nhân viên
                                </h2>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <label for="khuvuc" class="fs-4 fw-bold mb-4">Khu vực</label>
                                    <select
                                        class="statistical-manager-content__filter form-select"
                                        aria-label="Default select example"
                                        id="khuvuc"
                                    >
                                        <option selected value="ALL">
                                            ------ Khu vực -----
                                        </option>
                                        <option value="Đạt">Cần Thơ</option>
                                        <option value="Chưa đạt">
                                            Nha Trang
                                        </option>
                                    </select>
                                </div>

                                <div>
                                    <label for="khuvuc" class="fs-4 fw-bold mb-4">Bộ phận</label>
                                    <select
                                        class="statistical-manager-content__filter form-select"
                                        aria-label="Default select example"
                                        id="bophan"
                                    >
                                        <option selected value="ALL">
                                            ------ Bộ phận -----
                                        </option>
                                        <option value="Đạt">Đạt kết quả</option>
                                        <option value="Chưa đạt">
                                            Chưa đạt kết quả
                                        </option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="khuvuc" class="fs-4 fw-bold mb-4">Trạng thái</label>
                                    <select
                                        class="statistical-manager-content__filter form-select"
                                        aria-label="Default select example"
                                        id="select-statistical"
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
                            </div>
                        </div>

                        <div class="statistical-manager-content__body">
                            <table id="manager-table" class="table table-bordered display statistical-manager-content__table-staff">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Bootstrap bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- Chart js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- DataTables plugins jquery -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<!-- Main JS -->
<script src="../asset/js/main.js"></script>
<script>
    // Lắng nghe sự kiện khi chọn option
    document.getElementById('makhuvuc').addEventListener('change', function() {
        //Lấy giá trị của option đã chọn
        var selectedFruit = this.value;
        // Tạo một đối tượng XMLHttpRequest để gửi yêu cầu đến tập tin PHP xử lý
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Nhận kết quả từ tập tin PHP xử lý
                var result = this.responseText;
                document.getElementById("mabophan").innerHTML = result;
                // In kết quả ra console
                console.log(result);
            }
        };
        // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
        xhttp.open("GET", "content_additional.php?makv=" + selectedFruit + "&chon=bophan", true);
        xhttp.send();
    });


        var bodyTable = document.querySelector(".statistical-manager-content__table-staff tbody");
        var selectBox = document.querySelector("#select-statistical");



    var selectnhanvien_thamgia_kh = document.getElementById("nhanvien_thamgia_kh");
    var selectedValuenhanvien_thamgia_kh = selectnhanvien_thamgia_kh.value;
    var select_mabophan = document.getElementById("mabophan");
    var selectedValue_mabophan = select_mabophan.value;

    if (selectedValuenhanvien_thamgia_kh == "") {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Nhận kết quả từ tập tin PHP xử lý
                var result = this.responseText;
                document.getElementById("nhanvien_thamgia_kh").innerHTML = result;
                // In kết quả ra console
                console.log(result);
            }
        };
        // Gửi yêu cầu đến tập tin PHP xử lý và truyền giá trị của option đã chọn
        xhttp.open("GET", "content_additional.php?mabophan=" + selectedFruit + "&chon=manv_bophan", true);
        xhttp.send();
    }

    //=====================================================================================


    $(document).ready(function() {
        $("#manager-table").DataTable();
    });
</script>

<script>
    var listStaff = [];









    var bodyTable = document.querySelector(
        ".statistical-manager-content__table-staff tbody"
    );
    var selectBox = document.querySelector(
        "#select-statistical"
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


        //=====================================================================================
    // Lắng nghe sự kiện khi chọn option
    document.getElementById('mabophan').addEventListener('change', function() {
        //Lấy giá trị của option đã chọn
        var selectedFruit = this.value;
        // Tạo một đối tượng XMLHttpRequest để gửi yêu cầu đến tập tin PHP xử lý
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Nhận kết quả từ tập tin PHP xử lý
                listStaff = JSON.parse(this.responseText);
                //document.getElementById("mabophan").innerHTML = result;
                // In kết quả ra console
                
                //alert(result);
                bodyTable.innerHTML = render(listStaff);
                //console.log(result);
            }
        };

        var selectmabophan = document.getElementById("mabophan");
        var selectedValuemabophan = selectmabophan.value;
        var selectmakhuvuc = document.getElementById("makhuvuc");
        var selectedValuemakhuvuc = selectmakhuvuc.value;

        var linkget = "content_additional.php?makhuvuc_thongke=" + selectedValuemakhuvuc + "&mabophan_thongke=" + selectedValuemabophan;
        xhttp.open("GET", linkget, true);
        xhttp.send();



    });


    

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

    var mamau1 = randomNumber = Math.floor(Math.random() * 255) + 1;
    var mamau2 = randomNumber = Math.floor(Math.random() * 255) + 1;
    var mamau3 = randomNumber = Math.floor(Math.random() * 255) + 1;
    var mamau4 = randomNumber = Math.floor(Math.random() * 255) + 1;
    var mamau5 = randomNumber = Math.floor(Math.random() * 255) + 1;
    var mamau6 = randomNumber = Math.floor(Math.random() * 255) + 1;

    const data = {
        labels: ["Chưa đạt", "Đạt"],
        datasets: [{
            label: "Số lượng nhân viên",
            data: [tongNhanVienChuaDat, tongNhanVienDat],
            backgroundColor: ["rgb(" + mamau1 + ", " + mamau2 + ", " + mamau3 + ")", "rgb(" + mamau4 + ", " + mamau5 + ", " + mamau6 + ")"],
            hoverOffset: 4,
        }, ],
        datasets: [{
            label: "Số lượng nhân viên",
            data: [12, 12],
            backgroundColor: ["rgb(" + mamau1 + ", " + mamau2 + ", " + mamau3 + ")", "rgb(" + mamau4 + ", " + mamau5 + ", " + mamau6 + ")"],
            hoverOffset: 4,
        }, ],
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
    $(document).ready(function() {
        $("#manager-table").DataTable();
    });
</script>

</html>