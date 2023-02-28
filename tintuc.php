<?php
    require './ConnectDB/connect.php';
    $con = ketnoi();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./web.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <title>TTKmovie.net</title>
</head>

<body>
    <div id="scrollPath"></div>
    <div id="progressbar"></div>
    <header class="header">
        <?php require './GiaoDien/header-with-search.php'; ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>
    <!-- container -->
    <div class="container"></div>
    <div class="app">
        <div class="container-box">
            <div class="container__heading-box">
                <b>TIN TỨC NỔI BẬT</b>
            </div>
            <?php
                $sql = "SELECT * FROM `tintuc`";
                $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                while ($row = mysqli_fetch_assoc($result))
                {
                    ?>
                    <div class="container-box-app container-box-app--dark" style="margin-top: 40px;">
                        <a href="./xemtintuc.php?id=<?php echo $row['MaTinTuc']; ?>" title="The Conjuring 2 (2016)" style="text-decoration: none; color: #ffff;">
                            <div class="card">
                                <img src="./Admin/file/image/<?php echo $row['AnhTin']; ?>" style="height: 240px ;">
                                <div class="content">
                                    <div class="title">
                                        Tin mới</div>
                                    <div class="sub-title">
                                        Tin tổng hợp</div>
                                </div>
                            </div>
                            <div class="tintuc">
                                <h3><?php echo $row['TieuDe']; ?></h3>
                                <p><?php echo $row['ThongTin']; ?>
                                <p>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            ?>
        </div>
        <div class="sidebar">
            <div class="sidebar__heading">
                <h1>BẢNG XẾP HẠNG</h1>
                <ul class="sidebar__list-btn">
                    <li class="sidebar__list-item-btn sidebar__list-item-btn--active">
                        <a href="#">196 Phim Bộ</a>
                    </li>
                    <li class="sidebar__list-item-btn">
                        <a href="#">41 Phim Lẻ</a>
                    </li>
                    <li class="sidebar__list-item-btn">
                        <a href="#">22 Hoạt Hình</a>
                    </li>
                </ul>
            </div>
            <ul class="sidebar__list">
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar1.png);background-size: cover;background-position: center;">

                        </div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Mr. Queen (Công Chúa Khó Gần)</span>
                            <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar2.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">

                                True Beauty-Vẻ Đẹp Đích Thực</span>
                            <span class="sidebar__item-subhead">2020</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 11 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <img src="./assets/img/sidebar1.png" alt="" class="sidebar__img">
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Mr. Queen (Công Chúa Khó Gần)</span>
                            <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <img src="./assets/img/sidebar2.png" alt="" class="sidebar__img">
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Mr. Queen (Công Chúa Khó Gần)</span>
                            <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <img src="./assets/img/sidebar1.png" alt="" class="sidebar__img">
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Mr. Queen (Công Chúa Khó Gần)</span>
                            <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <img src="./assets/img/sidebar1.png" alt="" class="sidebar__img">
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Mr. Queen (Công Chúa Khó Gần)</span>
                            <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <img src="./assets/img/sidebar1.png" alt="" class="sidebar__img">
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Mr. Queen (Công Chúa Khó Gần)</span>
                            <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
            </ul>
            <div class="sidebar__heading sidebar__heading--has-border">
                <h1>PHIM HAY TRỌN BỘ</h1>
            </div>
            <ul class="sidebar__list sidebar__list--notscrollbar">
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar3.png);background-size: cover;background-position: center;">

                        </div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Nửa Là Đường Mật, Nửa Là Đau Thương</span>
                            <span class="sidebar__item-subhead">Love Is Sweet</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 36 Thuyết minh-End
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar4.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">

                                Yêu Nhau Đi, Thực Mộng Quân</span>
                            <span class="sidebar__item-subhead">Poisoned Love (2020)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 11 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar5.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Như Ý Phương Phi</span>
                            <span class="sidebar__item-subhead">The Blooms at Ruyi Pavilion</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar6.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Yến Vân Đài</span>
                            <span class="sidebar__item-subhead">The Legend of Xiao Chuo</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar7.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Lang Điện Hạ</span>
                            <span class="sidebar__item-subhead">The Majesty Of Wolf (The Wolf)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar8.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Con Tim Sắt Đá</span>
                            <span class="sidebar__item-subhead">Heart of Stone/ Huajai Sila 2019</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar9.png);background-position: top;background-size: cover;"></div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Cá Mực Hầm Mật 2019</span>
                            <span class="sidebar__item-subhead">Go Go Squid</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar10.png);background-size: cover;background-position: center;">

                        </div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Hạ Cánh Nơi Anh</span>
                            <span class="sidebar__item-subhead">Crash Landing On You (2019)</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar11.png);background-size: cover;background-position: center;">

                        </div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Lấy Danh Nghĩa Người Nhà</span>
                            <span class="sidebar__item-subhead">Go Ahead</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
                <li class="sidebar__item">
                    <a href="" class="sidebar__item-link">
                        <div class="sidebar__img" style="background-image: url(./assets/img/sidebar12.png);background-size: cover;background-position: center;">

                        </div>
                        <div class="sidebar__item-info">
                            <span class="sidebar__item-head">Bạn Trai Tôi Là Hồ Ly (Cửu Vĩ Hồ Truyện)</span>
                            <span class="sidebar__item-subhead">Tale Of The Nine Tailed</span>

                            <div class="sidebar__item-ep">
                                <span class="sidebar__item-ep-name">
                                    Tập 13 Preview
                                </span>
                            </div>
                        </div>
                        <i class="sidebar__item-icon fas fa-play-circle"></i>
                    </a>
                </li>
            </ul>
            <div class="sidebar__heading sidebar__heading--has-border">
                <h1>PHIM SẮP CHIẾU</h1>
            </div>
            <ul class="sidebar__list">
                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Định Mệnh: Winx Saga (Phần 1)</div>
                            <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/Busted-Season-3.jpg" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Busted (Phần 3)</div>
                            <div class="sidebar__item2-subname">Busted (Season 3) (2020)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar14.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Times</div>
                            <div class="sidebar__item2-subname">Times (2021)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar15.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Thầm Yêu - Quất Sinh Hoài Nam (Drama)</div>
                            <div class="sidebar__item2-subname">Unrequited Love (2020)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Định Mệnh: Winx Saga (Phần 1)</div>
                            <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Định Mệnh: Winx Saga (Phần 1)</div>
                            <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Định Mệnh: Winx Saga (Phần 1)</div>
                            <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
                        </div>
                    </a>
                </li>

                <li class="sidebar__item2">
                    <a href="#" class="sidebar__item2-link">
                        <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
                        <div class="sidebar__item2-info">
                            <div class="sidebar__item2-name">Định Mệnh: Winx Saga (Phần 1)</div>
                            <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__left">
            <div class="header__logo-text">
                <b>TTKmovie</b>
                <span>NET</span>
            </div>
            <p class="par">Nơi cập nhật những bộ phim mới hot nhất hiện nay.</p>
        </div>
        <div class="footer__right">
            <span class="footer__right-name">Thông Tin</span>
            <ul class="footer__right-list">
                <li class="footer__right-item">
                    <a href="#">Điều khoản sử dụng</a>
                </li>
                <li class="footer__right-item">
                    <a href="#">Bản quyền và trách nhiệm nội dung</a>
                </li>
                <li class="footer__right-item">
                    <a href="#">Admin: trankhiem1308@gmai.com</a>
                </li>
                <li class="footer__right-item">
                    <a href="#">Liên hệ QC: ads.movies123@gmail.com</a>
                </li>
            </ul>
        </div>
    </footer>
    <div class="footer1">
        <div class="footer1-left">
            <p>© 2022 Copyright
                <a href="#">
                    <b class="ft-name">TTKmovie.net</b>
                </a>
                . All Rights reserved.
            </p>
        </div>
        <div class="footer1-right">
            <a href="#">Back to top
                <i class="footer1-right__icon fas fa-angle-up"></i>
            </a>

        </div>
    </div>
</body>
</html>