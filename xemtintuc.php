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
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./web.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <title>TTKmovie.net</title>
    <style>
        .like_btn
        {
            background: blue;
            color: white;
            width: 145px;
            font-size: 20pt;
            margin-top: 10px;
            border-radius: 8px;
            font-weight: bold;
        }
        #LikeCount
        {
            font-size: 20pt;
            color: white;
            margin-left: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div id="scrollPath"></div>
    <div id="progressbar"></div>
    <header class="header">
        <?php require './GiaoDien/header-with-search.php'; ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>
    <div class="container1">
        <ol class="breadcrumb">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" title="Trang chủ" href="./index.php" itemprop="url">
                    <span itemprop="name">Trang chủ</span>
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">

                <a itemprop="item" title="Anime bộ" href="./tintuc.php" itemprop="url">
                    <span itemprop="name">/ Tin tức</span>
                </a>
            </li>
            <li class="active">
                <span>/ Thông tin</span>
            </li>
        </ol>
        <span class="date">Thứ năm, 13/08/2022, 15:06 (GMT+7)</span>
    </div>

    <?php
        $id = $_GET['id']; 
        $sql = "SELECT * FROM `tintuc` WHERE `MaTinTuc` = '$id'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
    ?>
    <div class="detailtintuc" style="color:white">
        <h1 class="Title_tintuc"><?php echo $row['TieuDe']; ?></h1>

        <article class="tintuc_detail">
            <img src="./Admin/file/image/<?php echo $row['AnhTin']; ?>" alt="card__icon fas fa-play-circle" style="display: block; height: 500px; margin-left: auto; margin-right:auto;">
            <p class="normal">
                <?php echo $row['ThongTin']; ?>
            </p>
        </article>
        <div class="ClFx_tintuc">
            <div class="VotesCn_tintuc">
                <div class="Prct_tintuc">
                    <div id="TPVotes" data-percent="95" class="percircle animate gt50" style="font-size: 25px;line-height: 35px;"><span>Đánh giá tin tức:</span>
                        <div class="slice">
                            <div class="bar" style="transform: rotate(342deg);"></div>
                            <div class="fill"></div>
                        </div>
                    </div>
                </div>
                <div class="rating" style="font-size: 40px;width: auto;">
                    <button id="LikeClick" class="like_btn" type="button">LIKE</button>
                    <label id="LikeCount"><?php echo $row['LuotThich']; ?> Lượt thích</label>
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
<script type="text/javascript">
    $(document).ready(function(){
        var MaTinTuc = <?php echo $id; ?>;
        $.post ('./xuly/xulyviewtin.php', {MaTinTuc: MaTinTuc} , function(ReturnData) {
            if(ReturnData == 1)
            {
                console.log("ok");
            }
        })

        $("#LikeClick").click(function(){
            var MaTinTuc = <?php echo $id; ?>;
            $.post ('./xuly/xulyliketin.php', {MaTinTuc: MaTinTuc} , function(ReturnData) {
                var data = jQuery.parseJSON(ReturnData);
                if(data[0] == 1)
                {
                    $("#LikeCount").text(data[1] + " Lượt thích");
                }
            })
        })
    })
</script>
</html>