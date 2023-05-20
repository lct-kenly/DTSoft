<?php
    require_once('../admin/config.php');
    if(!isset($_SESSION['username'])) {
        header("location: ./login.php");
    }

    $evaluates = array();
    $index = 1;

    // $title = '';
    // switch($macv) {
    //     case 'C1': '';
    // }

    if($macv == 'C1') {

        $sql_evaluate = "SELECT kehoachgiaoviec.makehoach, bophan.tenbophan, khuvuc.tenkhuvuc, thoigianbatdau, thoigiandukien
                         FROM kehoachgiaoviec, chitietkehoach, bophan, khuvuc
                         WHERE chitietkehoach.makehoach = kehoachgiaoviec.makehoach AND kehoachgiaoviec.mabophan = bophan.mabophan AND kehoachgiaoviec.makhuvuc = khuvuc.makhuvuc AND chitietkehoach.manhanvien = '{$profile['manhanvien']}'
                         GROUP BY kehoachgiaoviec.makehoach";
    } else {

        $sql_evaluate = "SELECT makehoach, bophan.tenbophan, khuvuc.tenkhuvuc, thoigianbatdau, thoigiandukien
            FROM kehoachgiaoviec, bophan, khuvuc
            WHERE kehoachgiaoviec.mabophan = bophan.mabophan AND kehoachgiaoviec.makhuvuc = khuvuc.makhuvuc";
    }



    
    
    $result_evaluate = $conn->query($sql_evaluate);

    if($result_evaluate->num_rows > 0) {
        while($row = $result_evaluate->fetch_assoc()) {
            
            $evaluates[] = $row;
        }  
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
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />

        <!-- Data Tables -->
        <link
            rel="stylesheet"
            href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"
        />

        <!-- Styles Css -->
        <link rel="stylesheet" href="../asset/styles/reset.css" />
        <link rel="stylesheet" href="../asset/styles/base.css" />
        <link rel="stylesheet" href="../asset/styles/style_plans.css" />
        <title>Quan Ly Nhan Su</title>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-flud">
                <div class="row header">
                    <h2 class="header__title">Danh sách kế hoạch</h2>
                </div>

                <!-- Table -->
                <div class="row content">
                    <div class="content__table">
                        <table
                            id="table__plans"
                            class="table table-striped display"
                        >
                            <thead class="table__title">
                                <tr>
                                    <th class="table__header" scope="col">
                                        STT
                                    </th>
                                    <th class="table__header" scope="col">
                                        Mã kế hoạch
                                    </th>
                                    <th class="table__header" scope="col">
                                        Bộ phận
                                    </th>
                                    <th class="table__header" scope="col">
                                        Khu vực
                                    </th>
                                    <th class="table__header" scope="col">
                                        Ngày bắt đầu
                                    </th>
                                    <th class="table__header" scope="col">
                                        Ngày kết thúc dự kiến
                                    </th>
                                    <th class="table__header" scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody class="table__content">
                                <?php foreach ($evaluates as $item) {?>
                                    <tr>
                                        <th class="table__desc" scope="row"><?=$index?></th>
                                        <td class="table__desc"><?=$item['makehoach']?></td>
                                        <td class="table__desc"><?=$item['tenbophan']?></td>
                                        <td class="table__desc"><?=$item['tenkhuvuc']?></td>
                                        <td class="table__desc"><?=$item['thoigianbatdau']?></td>
                                        <td class="table__desc"><?=$item['thoigiandukien']?></td>
                                        <td class="table__desc">
                                            <a
                                                href="content_plan-detail.php?makehoach=<?=$item['makehoach']?>"
                                                class="table__plan-detail"
                                            >
                                                Chi tiết</a
                                            >
                                        </td>
                                    </tr>
                                <?php $index++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Button -->
                <?php if($macv != 'C1' && substr($bophan['tenbophan'], 0, 2) == 'NS' && strpos($bophan['tenbophan'], 'Nhân sự')){ ?>
                    <div class="row add__btn btn btn-primary">
                        <a href="content_plan-add.php" class="add__plans"
                            >Thêm Kế Hoạch</a
                        >
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>

    <!-- JS -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#table__plans").DataTable();
        });
    </script>
</html>
