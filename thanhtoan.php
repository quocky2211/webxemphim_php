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
            
        </div>

        <div class="Description">
            <h4 class="thongtin">Thông tin phim:</h4>
            <li><span>Giá:</span> <?php if($row['GiaMua'] == 0) echo 'FREE'; else { echo $row['GiaMua']." xu"; $SoXu = $row['GiaMua']; }?></li>
            <li><span>Thể loại:</span><?php echo $row01['TenTheLoai']; ?></li>
            <li><span>Năm phát hành:</span> <?php echo $row['NamPhatHanh']; ?></li>
            <li><span>Số tập:</span> <?php echo $row['SoTapPhim']; ?></li>
            <li><span>Ngôn Ngữ:</span> Vietsub</li>
            <li style="max-height: 200px; overflow-y: scroll;">
                <h3 style="font-size: inherit; line-height: inherit;">Giới thiệu phim <?php echo $row['TenPhim']; ?>: </h3>
                <div>
                    <p><?php echo $row['MoTa']; ?>.</p>
                </div>
            </li>
            <button id="BuyPhim" class="buy_button" style="width:auto;height:auto;font-size:30px;">
                        Thanh toán
            </button>
        </div>
        <div class="img" style="margin-left:970px;">
            <img src="./assets/img/Shopee15.4.jpg" alt="" style="width:470px;margin-top:-250px;">
        </div>
        <div class="img" style="margin-left:970px;">
            <img src="./assets/img/Shopee15.4.jpg" alt="" style="width:470px;">
        </div>
        <div class="img" style="margin-left:970px;">
            <img src="./assets/img/Shopee15.4.jpg" alt="" style="width:470px;">
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $("#BuyPhim").click(function(){            
            if(confirm("Bạn có muốn thanh toán cho phim này ?"))
            {
                var MaPhim = <?php echo $MaPhim; ?>;
                var SoXu = <?php echo $SoXu; ?>;
                $.post ('./xuly/xulymuaphim.php', {MaPhim: MaPhim, SoXu: SoXu} , function(ReturnData) {
                    if(ReturnData == 1)
                    {
                        alert("Thanh toán thành công");
                        location.href = "./xemchitietphim.php?id=<?php echo $MaPhim; ?>";
                    }
                    else
                    {
                        alert("Số xu không đủ");
                    }
                })
            }
            return false;           
        })
    })
</script>
</html>