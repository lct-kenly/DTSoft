<?php
    require_once('../admin/config.php');
    require_once('../lib/helper.php');

    if (!isset($_SESSION['username'])) {
        header("location: ../dang-nhap");
    }

    $khu_vuc = get_all_db($conn, 'khuvuc');
    $bo_phan = get_all_db($conn, 'bophan');
    $cong_viec_chuyen_mon = get_all_db($conn, 'congviec');

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

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/style_content_statistical.css" />

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
                                <label for="makhuvuc" class="fs-4 fw-bold mb-4">Khu vực</label>
                                <select class="statistical-manager-content__filter form-select" aria-label="Default select example" id="makhuvuc">
                                    <option selected value="ALL">
                                        ------ Tất cả -----
                                    </option>
                                    <?php foreach ($khu_vuc as $item) { ?>

                                        <option value="<?= $item['makhuvuc'] ?>">
                                            <?= $item['tenkhuvuc']; ?>
                                        </option>

                                    <?php  } ?>
                                </select>
                            </div>

                            <div>
                                <label for="mabophan" class="fs-4 fw-bold mb-4">Bộ phận</label>
                                <select class="statistical-manager-content__filter form-select" aria-label="Default select example" name="mabophan" id="mabophan">
                                    <option selected value="ALL">
                                            ------ Tất cả -----
                                    </option>
                                    <?php foreach ($bo_phan as $item) { ?>

                                    <option value="<?= $item['mabophan'] ?>">
                                        <?= $item['tenbophan']; ?>
                                    </option>

                                    <?php  } ?>
                                </select>
                            </div>

                            <div>
                                <label for="macongviec" class="fs-4 fw-bold mb-4">Công việc chuyên môn</label>
                                <select class="statistical-manager-content__filter form-select" aria-label="Default select example" id="macongviec">
                                    <option selected value="ALL">
                                        ------ Tất cả -----
                                    </option>
                                    <?php foreach ($cong_viec_chuyen_mon as $item) { ?>

                                        <option value="<?= $item['macongviec'] ?>">
                                            <?= $item['tencongviec']; ?>
                                        </option>

                                    <?php  } ?>
                                </select>
                            </div>
                        </div>

                        <div class="statistical-manager-content__body">
                            <table id="manager-table" class="table table-bordered align-middle display statistical-manager-content__table-staff">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="align-middle" scope="col">STT</th>
                                        <th class="align-middle" scope="col">Mã nhân viên</th>
                                        <th class="align-middle" scope="col">Họ tên</th>
                                        <th class="align-middle" scope="col">Chức vụ</th>
                                        <th class="align-middle" scope="col">Công việc</th>
                                        <th class="align-middle" scope="col">Khu vực</th>
                                        <th class="align-middle" scope="col">Bộ phận</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                </tbody>
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
        
        
    </script>

    <script>

        const selectKhuvuc = $('#makhuvuc');
        const selectBophan = $('#mabophan');
        const textSelectBophan = selectBophan.text();
        const selectCongviec = $('#macongviec');

        const tableBody = $('#manager-table tbody');


        const render = ((data) => {
            let html = data.map((item, index) => {
                return `<tr>
                            <td>${index + 1}</td>
                            <td>
                                <a href="content_info_staff-fix.php?manv=${item.manhanvien}">${item.manhanvien}</a>
                            </td>
                            <td>${item.hoten}</td>
                            <td>${item.tenchucvu}</td>
                            <td>${item.tencongviec}</td>
                            <td>${item.tenkhuvuc}</td>
                            <td>${item.tenbophan}</td>
                        </tr>`
            });


            tableBody.html(html.join(''));


        });



        const changeData = () => {
            $.ajax({
                    url: 'content_statistical-2_ajax.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        makhuvuc: selectKhuvuc.val(),
                        mabophan: selectBophan.val(),
                        macongviec: selectCongviec.val(),
                    },
                }).done(function (response) {

                    console.log(response);

                    if(response.bophan.length > 0) {

                        if(mabophan.value === 'ALL') {
                            mabophan.length = 1;
                        } else {
                            mabophan.length = 2;
                            mabophan.options[1] = new Option(mabophan.value, textSelectBophan);

                            mabophan.selectedIndex = 2;
                        }

                        response.bophan.forEach((item, index) => {
                            mabophan.options[mabophan.options.length] = new Option(item.tenbophan, item.mabophan);
                        })
                    }

                    render(response.nhanvien);

                    $("#manager-table").DataTable();
                })
        }
        
        $(document).ready(changeData);
        $(selectKhuvuc).change(changeData);
        $(selectBophan).change(changeData);
        $(selectCongviec).change(changeData);
    </script>
</body>

</html>