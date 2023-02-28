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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap&subset=vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/style1.css">
    <script src="./web.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.min.js"></script>
    <title>TTKmovie.net</title>
</head>

<body>
    <div id="scrollPath"></div>
    <div id="progressbar"></div>
    <header class="header">
        <?php //require './GiaoDien/header-with-search.php'; ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>

    <?php
        $sql = "SELECT * FROM `account` WHERE `MaTK` = '$_SESSION[id]'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <h1 class="text-center">Thông tin người dùng</h1>
        <div class="container" style="margin-top: -100px;">
            <div class="row profile">
                <div class="col-md-3">
                    <div class="profile-sidebar">
                        <div class="profile-userpic">
                            <img src="./assets/img/user.png" class="img-responsive" alt="Thông tin cá nhân">
                        </div>
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"><?php echo $row['Name']; ?></div>
                        </div>
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li class="active">
                                    <a href="./thongtincanhan.html">
                                        <i class="glyphicon glyphicon-info-sign"></i>
                                        Cập nhật thông tin cá nhân
                                    </a>
                                </li>
                                <li>
                                    <a href="./LichSuMuaPhim.php">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                        Lịch sử mua phim
                                    </a>
                                </li>
                                <li>
                                    <a href="./YeuThich.php">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                        Danh Sách yêu thích
                                    </a>
                                </li>
                                <li>
                                    <a href="./napxu.php">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                        nạp xu
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group" style="margin-top: 70px;">
                        <label for="username">Tên đăng nhập</label>
                        <input id="username" type="text" class="form-control" name="username" disabled value="<?php echo $row['Username']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input id="password" type="password" class="form-control" name="password" disabled value="<?php echo $row['Password']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">Điểm</label>
                        <label for="contact"><?php echo $row['Point']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="number">Xu Khóa</label>
                        <label for="number"><?php echo $row['XuKhoa']; ?></label>
                    </div>
                    <button class="save_button" onclick="location.href='DoiMatKhau.php'">
                        Đổi mật khẩu
                    </button>
                </div>

            </div>
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