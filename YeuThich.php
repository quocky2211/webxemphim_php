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
    <link rel="stylesheet" href="./Admin/design/anhtable.css" />
    <title>TTKmovie.net</title>
</head>
<style>
    .boderexam1 {
        border-bottom: 2px solid #1100ff;
    }
</style>
<body>
    <div id="scrollPath"></div>
    <div id="progressbar"></div>
    <header class="header">
        <?php //require './GiaoDien/header-with-search.php'; 
        ?>
        <?php require './GiaoDien/header_navbar.php'; ?>
    </header>


    <div class="container">
        <div class="row">
            <h1 class="text-center">Danh Sách yêu thích</h1>
            <div class="col-sm-9">
                <?php
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM `yeuthich` WHERE `MaTK` = '$id'";
                    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $MaPhim = $row['MaPhim'];
                        $sql01 = "SELECT * FROM `phim` WHERE `MaPhim` = '$MaPhim'";
                        $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
                        $row01 = mysqli_fetch_assoc($result01);
                        ?>
                        <div class="col-sm-2 ">
                            <div class="card">
                                <a href="./xemchitietphim.php?id=<?php echo $row['MaPhim']; ?>">
                                    <div class="card-header">
                                        <img class="anh-khuyenmai" src="./assets/img/<?php echo $row01['VideoImg']; ?>" alt="Card image">
                                    </div>
                                </a>
                                <p><strong><?php echo $row01['TenPhim']; ?></strong></p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>


            <div class="col-sm-3">
                
                <h6 class="boderexam1">Quảng Cáo</h6>
                    <div class="card">
                        <a href="">
                            <img class="img-thumbnail" src="./assets/img/zaloPay.jpg" alt="Card image">
                        </a>
                    </div></br>
                    <div class="card">
                        <a href="">
                                <img class="img-thumbnail" src="./assets/img/Shopee15.4.jpg" alt="Card image">
                        </a>
                    </div></br>
                    <div class="card">
                        <a href="">
                                <img class="img-thumbnail" src="./assets/img/Tikiqc.jpg" alt="Card image">
                        </a>
                    </div></br>
                </div>
            
        </div>
    </div>
    <footer class="footer">

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