<?php
require_once('../admin/config.php');




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
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />

        <!-- Styles Css -->
        <link rel="stylesheet" href="../asset/styles/reset.css" />
        <link rel="stylesheet" href="../asset/styles/base.css" />
        <link rel="stylesheet" href="../asset/styles/styles.css" />

        <!-- Favicon -->
        <link
            rel="apple-touch-icon"
            sizes="57x57"
            href="../asset/favicon/apple-icon-57x57.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="60x60"
            href="../asset/favicon/apple-icon-60x60.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="72x72"
            href="../asset/favicon/apple-icon-72x72.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="../asset/favicon/apple-icon-76x76.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="114x114"
            href="../asset/favicon/apple-icon-114x114.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="120x120"
            href="../asset/favicon/apple-icon-120x120.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="144x144"
            href="../asset/favicon/apple-icon-144x144.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="152x152"
            href="../asset/favicon/apple-icon-152x152.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="../asset/favicon/apple-icon-180x180.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="192x192"
            href="../asset/favicon/android-icon-192x192.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="../asset/favicon/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="96x96"
            href="../asset/favicon/favicon-96x96.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="../asset/favicon/favicon-16x16.png"
        />
        <link rel="manifest" href="../asset/favicon/manifest.json" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta
            name="msapplication-TileImage"
            content="../asset/favicon/ms-icon-144x144.png"
        />
        <meta name="theme-color" content="#ffffff" />

        <title>Quan Ly Nhan Su</title>
    </head>

    <body>
        <div class="wrapper">
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="col-md-12">
                        <!-- Start Header -->
                        <header id="header" class="header">
                            <a href="">
                                <img
                                    src="../asset/img/logo.jpg"
                                    alt="logo"
                                    class="header__logo"
                                />
                            </a>

                            <ul class="header__menu">
                                <li class="header__menu-item header__notify">
                                    <i
                                        class="fa-regular fa-bell header__menu-icon"
                                    ></i>

                                    <!-- Start Notify -->
                                    <div class="header__notify-container">
                                        <ul class="header__notify-list">
                                            <li
                                                class="header__notify-item active"
                                            >
                                                <a
                                                    href=""
                                                    class="header__notify-link"
                                                >
                                                    <span
                                                        class="header__notify-icon"
                                                        ><i
                                                            class="fa-solid fa-envelope"
                                                        ></i
                                                    ></span>
                                                    <div
                                                        class="header__notify-content"
                                                    >
                                                        <h6
                                                            class="header__notify-title"
                                                        >
                                                            Thông báo
                                                        </h6>
                                                        <p
                                                            class="header__notify-des"
                                                        >
                                                            Lorem Ipsum is
                                                            simply dummy text of
                                                            the printing and
                                                            typesetting
                                                            industry. Lorem
                                                            Ipsum has been the
                                                            industry's standard
                                                            dummy text ever
                                                            since the 1500s,
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="header__notify-item">
                                                <a
                                                    href=""
                                                    class="header__notify-link"
                                                >
                                                    <span
                                                        class="header__notify-icon"
                                                        ><i
                                                            class="fa-solid fa-envelope"
                                                        ></i
                                                    ></span>
                                                    <div
                                                        class="header__notify-content"
                                                    >
                                                        <h6
                                                            class="header__notify-title"
                                                        >
                                                            Thông báo
                                                        </h6>
                                                        <p
                                                            class="header__notify-des"
                                                        >
                                                            Lorem Ipsum is
                                                            simply dummy text of
                                                            the printing and
                                                            typesetting
                                                            industry. Lorem
                                                            Ipsum has been the
                                                            industry's standard
                                                            dummy text ever
                                                            since the 1500s,
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li
                                                class="header__notify-item active"
                                            >
                                                <a
                                                    href=""
                                                    class="header__notify-link"
                                                >
                                                    <span
                                                        class="header__notify-icon"
                                                        ><i
                                                            class="fa-solid fa-envelope"
                                                        ></i
                                                    ></span>
                                                    <div
                                                        class="header__notify-content"
                                                    >
                                                        <h6
                                                            class="header__notify-title"
                                                        >
                                                            Thông báo
                                                        </h6>
                                                        <p
                                                            class="header__notify-des"
                                                        >
                                                            Lorem Ipsum is
                                                            simply dummy text of
                                                            the printing and
                                                            typesetting
                                                            industry. Lorem
                                                            Ipsum has been the
                                                            industry's standard
                                                            dummy text ever
                                                            since the 1500s,
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li
                                                class="header__notify-item active"
                                            >
                                                <a
                                                    href=""
                                                    class="header__notify-link"
                                                >
                                                    <span
                                                        class="header__notify-icon"
                                                        ><i
                                                            class="fa-solid fa-envelope"
                                                        ></i
                                                    ></span>
                                                    <div
                                                        class="header__notify-content"
                                                    >
                                                        <h6
                                                            class="header__notify-title"
                                                        >
                                                            Thông báo
                                                        </h6>
                                                        <p
                                                            class="header__notify-des"
                                                        >
                                                            Lorem Ipsum is
                                                            simply dummy text of
                                                            the printing and
                                                            typesetting
                                                            industry. Lorem
                                                            Ipsum has been the
                                                            industry's standard
                                                            dummy text ever
                                                            since the 1500s,
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li
                                                class="header__notify-item active"
                                            >
                                                <a
                                                    href=""
                                                    class="header__notify-link"
                                                >
                                                    <span
                                                        class="header__notify-icon"
                                                        ><i
                                                            class="fa-solid fa-envelope"
                                                        ></i
                                                    ></span>
                                                    <div
                                                        class="header__notify-content"
                                                    >
                                                        <h6
                                                            class="header__notify-title"
                                                        >
                                                            Thông báo
                                                        </h6>
                                                        <p
                                                            class="header__notify-des"
                                                        >
                                                            Lorem Ipsum is
                                                            simply dummy text of
                                                            the printing and
                                                            typesetting
                                                            industry. Lorem
                                                            Ipsum has been the
                                                            industry's standard
                                                            dummy text ever
                                                            since the 1500s,
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>

                                            <li
                                                class="header__notify-item active"
                                            >
                                                <a
                                                    href=""
                                                    class="header__notify-link"
                                                >
                                                    <span
                                                        class="header__notify-icon"
                                                        ><i
                                                            class="fa-solid fa-envelope"
                                                        ></i
                                                    ></span>
                                                    <div
                                                        class="header__notify-content"
                                                    >
                                                        <h6
                                                            class="header__notify-title"
                                                        >
                                                            Thông báo
                                                        </h6>
                                                        <p
                                                            class="header__notify-des"
                                                        >
                                                            Lorem Ipsum is
                                                            simply dummy text of
                                                            the printing and
                                                            typesetting
                                                            industry. Lorem
                                                            Ipsum has been the
                                                            industry's standard
                                                            dummy text ever
                                                            since the 1500s,
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End Notify -->
                                </li>
                                <li class="header__menu-item header__profile">
                                    <!-- Start Profile -->
                                    <a
                                        href="#"
                                        class="header__profile-link btn-change-content"
                                        data_content="../pages/content_info_staff.php"
                                    >
                                        <img
                                            src="../asset/img/avatar-default.jfif"
                                            alt=""
                                            class="header__profile-avatar"
                                        />
                                        <div class="header__profile-info">
                                            <p class="header__profile-name">
                                                Admin
                                            </p>
                                            <span class="header__profile-level"
                                                >Quản trị viên</span
                                            >
                                        </div>

                                        <div class="header__profile-menu">
                                            <div
                                                class="header__profile-menu-heading"
                                            >
                                                <img
                                                    src="../asset/img/avatar-default.jfif"
                                                    alt=""
                                                    class="header__profile-avatar"
                                                />
                                                <p
                                                    class="header__profile-name mt-3"
                                                >
                                                    Admin
                                                </p>
                                            </div>
                                            <ul
                                                class="header__profile-menu-list"
                                            >
                                                <li
                                                    class="header__profile-menu-item"
                                                >
                                                    <a
                                                        href=""
                                                        class="header__profile-menu-link btn-change-content"
                                                        data_content="../pages/content_info_staff.php"
                                                    >
                                                        <i
                                                            class="fa-regular fa-address-card header__profile-menu-icon"
                                                        ></i>
                                                        Thông tin tài khoản
                                                    </a>
                                                </li>

                                                <li
                                                    class="header__profile-menu-item"
                                                >
                                                    <a
                                                        href=""
                                                        class="header__profile-menu-link btn-change-content"
                                                        data_content="../pages/content_change_password.php"
                                                    >
                                                        <i
                                                            class="fa-solid fa-gear header__profile-menu-icon"
                                                        ></i>
                                                        Đổi mật khẩu
                                                    </a>
                                                </li>
                                            </ul>
                                            <div
                                                class="header__profile-menu-footer"
                                            >
                                                <a
                                                    href="../dang-nhap"
                                                    class="header__profile-menu-btn"
                                                >
                                                    <i
                                                        class="fa-solid fa-right-to-bracket header__profile-menu-icon"
                                                    ></i>
                                                    Đăng xuất
                                                </a>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- End Profile -->
                                </li>
                            </ul>
                        </header>
                        <!--  End Header -->
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-md-2">
                        <!-- Start Sidebar -->
                        <div class="sidebar">
                            <ul class="sidebar__list">
                                <li class="sidebar__item active">
                                    <a
                                        href="#"
                                        class="sidebar__link btn-change-content"
                                        data_content="../pages/content_index.php"
                                    >
                                        <span class="sidebar__icon">
                                            <i class="fa-solid fa-house"></i>
                                        </span>
                                        Trang chủ
                                    </a>
                                </li>
                                <li class="sidebar__item">
                                    <a href="#" class="sidebar__link">
                                        <span class="sidebar__icon">
                                            <i class="fa-solid fa-users"></i>
                                        </span>
                                        Nhân viên
                                    </a>

                                    <ul class="sidebar__menu-sub">
                                        <li class="sidebar__menu-sub-item">
                                            <a
                                                href=""
                                                class="sidebar__menu-sub-link btn-change-content"
                                                data_content="../pages/content_list_staff.php"
                                                >Danh sách nhân viên</a
                                            >
                                        </li>

                                        <li class="sidebar__menu-sub-item">
                                            <a
                                                href=""
                                                class="sidebar__menu-sub-link btn-change-content"
                                                data_content="../pages/content_report.php"
                                            >
                                                Báo cáo nhiệm vụ
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar__item">
                                    <a href="#" class="sidebar__link">
                                        <span class="sidebar__icon">
                                            <i
                                                class="fa-solid fa-clipboard-list"
                                            ></i>
                                        </span>
                                        Kế hoạch
                                    </a>

                                    <ul class="sidebar__menu-sub">
                                        <li class="sidebar__menu-sub-item">
                                            <a
                                                href=""
                                                class="sidebar__menu-sub-link btn-change-content"
                                                data_content="../pages/content_plans.php"
                                                >Danh sách kế hoạch</a
                                            >
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar__item">
                                    <a
                                        href="#"
                                        class="sidebar__link btn-change-content"
                                        data_content="../pages/content_evaluate.php"
                                    >
                                        <span class="sidebar__icon">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </span>
                                        Đánh giá
                                    </a>
                                </li>
                                <li class="sidebar__item">
                                    <a
                                        href="#"
                                        class="sidebar__link btn-change-content"
                                        data_content="../pages/content_statistical.php"
                                    >
                                        <span class="sidebar__icon">
                                            <i
                                                class="fa-solid fa-chart-pie"
                                            ></i>
                                        </span>
                                        Thống kê
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Sidebar -->
                    </div>
                    <div class="col-md-10 p-0">
                        <!-- Start Content -->
                        <div class="main-content iframe_size">
                            <iframe
                                id="iframe"
                                src="../pages/content_index.php"
                                width="100%"
                                height="100%"
                                frameborder="0"
                            ></iframe>
                        </div>
                        <!-- End Content  -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap bundle -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"
        ></script>

        <!-- Chart js library -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- Main JS -->
        <script src="../asset/js/main.js"></script>
    </body>
</html>
