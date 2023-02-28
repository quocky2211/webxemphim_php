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
</head>

<body>
  <div id="scrollPath"></div>
  <div id="progressbar"></div>
  <header class="header">
    <?php require './GiaoDien/header-with-search.php'; ?>
    <?php require './GiaoDien/header_navbar.php'; ?>
  </header>
  <?php
    $MaTheLoai = $_GET['id'];
    $sql = "SELECT *  FROM `phim`, `theloai` WHERE phim.`MaTheLoai` = '$MaTheLoai' AND theloai.`MaTheLoai` = '$MaTheLoai'";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
  ?>
  <div class="container1">
    <ol class="breadcrumb">
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" title="Trang chủ" href="./index.php" itemprop="url">
          <span itemprop="name">Trang chủ</span>
        </a>
      </li>
      <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        <a itemprop="item" title="Shounen" href="./index.php?<?php echo $MaTheLoai; ?>" itemprop="url">
          <span itemprop="name">/ <?php echo $row['TenTheLoai']; ?></span>
        </a>
      </li>
    </ol>
  </div>
  <div class="app">
    <div class="container-box1">
      <div class="container__heading-box">
        <b><?php echo $row['TenTheLoai']; ?></b>
      </div>
      <?php
        if (($num % 5) != 0)
        {
            $Max_Row = ($num / 5) + 1;
        }
        else
        {
            $Max_Row = $num / 5;
        }        
        $start_id = 0;
        for ($i = 1; $i <= $Max_Row; $i++)
        {
          $sql01 = "SELECT * FROM `phim` WHERE phim.`MaTheLoai` = '$MaTheLoai' LIMIT $start_id, 5";
          $result01 = mysqli_query($con, $sql01) or die(mysqli_error($con));
          $num01 = mysqli_num_rows($result);
          if ($num01 != 0)
          {
            ?>
            <ul class="container-box-app1">
              <?php
              while ($row01 = mysqli_fetch_assoc($result01))
              {
                ?>
                <li class="phim">
                  <a href="./xemchitietphim.php?id=<?php echo $row01['MaPhim']; ?>" title="<?php echo $row01['TenPhim']; ?>">
                    <div class="card">
                      <div class="img">
                        <img src="./assets/img/<?php echo $row01['VideoImg'] ?>" alt="card__icon fas fa-play-circle" style="height: 240px ;font-style: none;">
                      </div>
                      <div class="content">
                        <div class="title">
                          <?php echo $row01['TenPhim']; ?></div>
                      </div>
                    </div>
                  </a>
                </li>
                <?php
                $start_id = $row01['MaPhim'];
              }
              ?>
            </ul>
            <?php
          }
        }
        
      ?>
      <script>
        $('.slider').owlCarousel({

          items: 2,
          loop: true,

          responsive: {
            600: {
              items: 5.5
            }
          }
        });
        owl.on('mousewheel', '.owl-stage', function(e) {
          if (e.deltaY > 0) {
            owl.trigger('next.owl');
          } else {
            owl.trigger('prev.owl');
          }
          e.preventDefault();
        });
      </script>
      <script type="text/javascript">
        let progress = document.getElementById('progressbar');
        let totalHeight = document.body.scrollHeight - window.innerHeight;
        window.onscroll = function() {
          let progressHeight = (window.pageYOffset / totalHeight) * 100;
          progress.style.height = progressHeight + "%";
        }
      </script>
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