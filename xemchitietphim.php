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
    <script src="/web.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>TTKmovie.net</title>
</head>

<body>
    <div id="scrollPath"></div>
    <div id="progressbar"></div>
    <header class="header">
        <?php require './GiaoDien/header-with-search.php'; ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>
    <?php
        $MaPhim = $_GET['id'];
        $sql = "SELECT * FROM `phim` WHERE MaPhim = '$MaPhim'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);

        $sql01 = "SELECT * FROM `theloai` WHERE `MaTheLoai` = $row[MaTheLoai]";
        $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
        $row01 = mysqli_fetch_assoc($result01);
    ?>
    <div class="container1">
        <ol class="breadcrumb">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" title="Trang chủ" href="index.php" itemprop="url">
                    <span itemprop="name">Trang chủ</span>
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" title="Shounen" href="theloai.php?id=<?php echo $row['MaTheLoai']; ?>" itemprop="url">
                    <span itemprop="name">/ <?php echo $row01['TenTheLoai'] ?></span>
                </a>
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" title="Phim The Conjuring 2" itemprop="url">
                    <span itemprop="name">/ <?php echo $row['TenPhim']; ?></span>
                </a>
            </li>
            <li class="active">
                <span>/ Thông tin</span>
            </li>
        </ol>
    </div>

    <div class="detail">
        <h1 class="Title1"><?php echo $row['TenPhim']; ?></h1>

        <div class="Image">

            <figure class="Objf"><img width="300" height="460" src="./assets/img/<?php echo $row['VideoImg']; ?>" alt="The Conjuring 2 - The Conjuring 2" /></figure>

            <a href="./xemphim.php?id=<?php echo $row['MaPhim']; ?>&ep=1"><i class="TpMvPlay AAIco-play_arrow show"></i></a>

            <?php 
                if ($row['GiaMua'] == 0)
                {
                    ?>
                    <a id="ViewVideo" class="watch_button_more" title="<?php echo $row['TenPhim']; ?>">Xem phim </a>
                    <?php
                }
                else
                {
                    if(isset($_SESSION['id']))
                    {
                        $sql02 = "SELECT * FROM `chitietthanhtoan` WHERE `MaTK` = $_SESSION[id] AND `MaPhim` = $MaPhim";
                        $result02 = mysqli_query($con,$sql02) or die(mysqli_error($con));
                        if(mysqli_num_rows($result02) != 0)
                        {
                            ?>
                            <a id="ViewVideo" class="watch_button_more" title="<?php echo $row['TenPhim']; ?>">Xem phim </a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a class="buy_button_more" title="<?php echo $row['TenPhim']; ?>" href="./thanhtoan.php?id=<?php echo $row['MaPhim']; ?>">Mua phim </a>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <a class="buy_button_more" title="<?php echo $row['TenPhim']; ?>" onclick="NoLogin()">Mua phim </a>
                        <?php
                    }
                }
            ?>
            
        </div>

        <div class="Description">
            <h4 class="thongtin">Thông tin phim:</h4>
            <li><span>Giá:</span> <?php if($row['GiaMua'] == 0) echo 'FREE'; else echo $row['GiaMua']." xu"; ?></li>
            <li><span>Thể loại:</span>
                <a href="./theloai.php?id=<?php echo $row['MaTheLoai']; ?>"><strong style="font-weight: normal;"><?php echo $row01['TenTheLoai']; ?></strong></a>
            </li>
            <li><span>Năm phát hành:</span> <?php echo $row['NamPhatHanh']; ?></li>
            <li><span>Số tập:</span> <?php echo $row['SoTapPhim']; ?></li>
            <li><span>Ngôn Ngữ:</span> Vietsub</li>
            <li style="max-height: 200px; overflow-y: scroll;">
                <h3 style="font-size: inherit; line-height: inherit;">Giới thiệu phim <?php echo $row['TenPhim']; ?>: </h3>
                <div>
                    <p><?php echo $row['MoTa']; ?>.</p>
                </div>
            </li>
            <div class="ClFx">
                <div class="VotesCn">
                    <div class="Prct">
                        <div id="TPVotes" data-percent="95" class="percircle animate gt50"><span>Đánh giá phim:</span>
                            <div class="slice">
                                <div class="bar" style="transform: rotate(342deg);"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                        <i class="rating__star fa fa-star-o"></i>
                    </div>
                    <script>
                        const ratingStars = [...document.getElementsByClassName("rating__star")];

                        function executeRating(stars) {
                            const starClassActive = "rating__star fa fa-solid fa-star";
                            const starClassInactive = "rating__star fa fa-star-o";
                            const starsLength = stars.length;
                            let i;
                            stars.map((star) => {
                                star.onclick = () => {
                                    i = stars.indexOf(star);

                                    if (star.className === starClassInactive) {
                                        for (i; i >= 0; --i) stars[i].className = starClassActive;
                                    } else {
                                        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                                    }
                                };
                            });
                        }
                        executeRating(ratingStars);
                    </script>
                </div>

            </div>

        </div>

    </div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#ViewVideo").click(function(){
            var MaPhim = <?php echo $MaPhim; ?>;
            $.post ('./xuly/xulyview.php', {MaPhim: MaPhim} , function(ReturnData) {
                if(ReturnData == 1)
                {
                    location.href = "./xemphim.php?id=<?php echo $MaPhim; ?>&ep=1";
                }
            })
        })
    })
</script>
<script>
    function NoLogin()
    {
        alert("Bạn phải đăng nhập để sử dụng chức năng này");
        location.href = 'login.php';
    }
</script>
</html>