<?php
    require './Admin/class/SingletonDBConnect.php';
    $instance = SingletonDBConnect::getInstance();
    $con = $instance->getConnection();
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
        <?php //require './GiaoDien/header-with-search.php'; 
        ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>

    <?php
    $sql = "SELECT * FROM `account` WHERE `MaTK` = '$_SESSION[id]'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <h1 class="text-center">Nạp xu</h1>
        <h2 class="text-above" style="font-size: 19px;">Mệnh giá nạp: (1.000VND = 1 xu)</h2>
        <p>Point > 100: Xu Nạp + 10%</p>
        <p>Point > 500: Xu Nạp + 20%</p>
        <p>Point > 1000: Xu Nạp + 50%</p>
        <div class="napxu" style="align-items: center; list-style:none; margin-top: 50px;">
            <li id="bank-tab-normal" class="nav-item" style="margin-right:20px; display:inline-block;">
                <a class="nav-link">
                    <img src="./Admin/file/image/20k.png" style="width:200px; ">
                </a>
            </li>
            <li id="bank-tab-vip" class="nav-item" style="margin-right:20px; display:inline-block;">
                <a class="nav-link">
                    <img src="./Admin/file/image/50k.png" style="width:200px;">
                </a>
            </li>
            <li id="bank-tab-prenium" class="nav-item" style="margin-right:20px; display:inline-block;">
                <a class="nav-link">
                    <img src="./Admin/file/image/100k.png" style="width:200px;">
                </a>
            </li>
        </div>
        <div class="container" style="padding-top:0px;">
            <div class="row profile">
                <div class="col-md-9">
                    <form id="NapForm" action="./xuly/xulynap.php" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="form-group" style="margin-top: 20px;">
                            <label class="col-sm4">Gói đã chọn</label>
                            <div class="col-sm5">
                                <input id="money-bank" type="text" class="form-control money" name="moneybag" required>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 20px;">
                            <label class="col-sm4">Nhập mã thẻ cào</label>
                            <div class="col-sm5">
                                <input id="money-bank" type="text" class="form-control money" name="code">
                            </div>
                            <div class="col-sm5">
                                <input id="money-bank" style="display: none;" type="text" class="form-control money" name="username" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>">
                            </div>
                            <div class="col-sm5">
                                <input id="money-bank" style="display: none;" type="text" class="form-control money" name="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password']; ?>">
                            </div>
                        </div>
                        <button id="NapCard" class="nap_button" type="submit">Nạp Card</button>
                        <button id="NapMoMo" class="nap_button" type="submit">Nạp Momo</button>
                        <button id="NapMoMo_ATM" class="nap_button" type="submit">Nạp Momo ATM</button>
                    </form>
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
<script>
    $("#NapCard").click(function(){
        $("#NapForm").attr('action','./xuly/xulynap.php');
    });

    $("#NapMoMo").click(function(){
        $("#NapForm").attr('action','./xuly/xulythanhtoan_momo.php');
    });

    $("#NapMoMo_ATM").click(function(){
        $("#NapForm").attr('action','./xuly/xulythanhtoan_momo_atm.php');
    });

    $("#bank-tab-normal").click(function(){
        $("#money-bank").attr('value','Normal');
    });

    $("#bank-tab-vip").click(function(){
        $("#money-bank").attr('value','Vip');
    });

    $("#bank-tab-prenium").click(function(){
        $("#money-bank").attr('value','Prenium');
    });
</script>

</html>