<?php
include('../admin/config.php');

$disable = "";
 
$malevel = $chucvu["machucvu"];

if($malevel == "C1" ){
    $disable = "disabled";
}

$sql_list_staff = "SELECT nhanvien.manhanvien, hoten, tenchucvu, email, sodienthoai, quequan, hinhanh
                                from nhanvien, taikhoan, thoigiannhanchuc, chucvu
                                where nhanvien.manhanvien = taikhoan.manv
                                    and nhanvien.manhanvien = thoigiannhanchuc.manhanvien
                                    and thoigiannhanchuc.machucvu = chucvu.machucvu
                                    and thoigiannhanchuc.thoigianketthuc = '0000-00-00'
                                    ";
$result_list_staff = mysqli_query($ketnoi, $sql_list_staff);
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

    <!-- Styles Css -->
    <link rel="stylesheet" href="../asset/styles/reset.css" />
    <link rel="stylesheet" href="../asset/styles/base.css" />
    <link rel="stylesheet" href="../asset/styles/styles.css" />
    <link rel="stylesheet" href="../asset/styles/style_staff.css" />
    <title>Quan Ly Nhan Su</title>



</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="header__staff">
                    <h2 class="header__title">Danh sách nhân viên</h2>
                    <?php if($disable == "") { ?>
                    <div class="header__staff_btn">
                        <a href="content_add_staff.php" class="btn__add-staff" >
                            Thêm nhân viên
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="container-flud staff">
                    <div class="row staff__list">
                        <?php
                        while ($row_list_staff = mysqli_fetch_array($result_list_staff)) {
                            echo
                            "<div class=\"col-md-3\">
                                            <div class=\"staff__list_items\">
                                                <div class=\"row staff__list_item\">
                                                    <img
                                                    class=\"staff__img\"
                                                    src=\"../asset/img/" . $row_list_staff['hinhanh'] . "\"
                                                    alt=\"staff avatar\"
                                                />
                                                    <a class=\"staff__name\" href=\"content_info_staff-fix.php?manv=" . $row_list_staff['manhanvien'] . "\">" . $row_list_staff['hoten'] . "</a>
                                                    <p class=\"staff__ID\">
                                                        " . $row_list_staff['manhanvien'] . " - " . $row_list_staff['tenchucvu'] . "
                                                    </p>
                                                </div>
                                                <div class=\"row staff__list_desc\">
                                                    <a href=\"#!\" class=\"staff__mail\">
                                                        <i
                                                            class=\"staff__icons fa-regular fa-envelope\"
                                                        >
                                                        </i>
                                                        " . $row_list_staff['email'] . "
                                                    </a>
                                                    <p class=\"staff__phone\">
                                                        <i
                                                            class=\"staff__icons fa-solid fa-phone\"
                                                        ></i>
                                                        " . $row_list_staff['sodienthoai'] . "
                                                    </p>
                                                    <p class=\"staff__address\">
                                                        <i
                                                            class=\"staff__icons fa-solid fa-location-dot\"
                                                        ></i>
                                                        " . $row_list_staff['quequan'] . "
                                                    </p>
                                                </div>

                                            
                                            </div>
                                        </div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>