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
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap&subset=vietnamese" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="./web.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
  <title>TTKmovie.net</title>
</head>

<body>
  <div id="scrollPath"></div>
  <div id="progressbar"></div>
  <header class="header">
    <?php require './GiaoDien/header-with-search.php'; ?>
    <?php require './GiaoDien/header_navbar.php'; ?>
  </header>
  <div class="container">

    <!-- Full-width images with number text -->
    <div class="mySlides">

      <img class="banner-img" src="./assets/img/img1.png" style="width:100%;">
    </div>

    <div class="mySlides">

      <img class="banner-img" src="./assets/img/img2.png" style="width:100%">
    </div>

    <div class="mySlides">

      <img class="banner-img" src="./assets/img/img3.jpg" style="width:100%">
    </div>

    <div class="mySlides">

      <img class="banner-img" src="./assets/img/img4.jpg" style="width:100%">
    </div>

    <div class="mySlides">

      <img class="banner-img" src="./assets/img/banner6.png" style="width:100%">
    </div>

    <div class="mySlides">

      <img class="banner-img" src="./assets/img/img5.jpg" style="width:100%">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <div class="row">
      <div class="column">
        <img class="demo cursor" src="./assets/img/img1.png" style="width:100%" onclick="currentSlide(1)" alt="The Woods">
      </div>
      <div class="column">
        <img class="demo cursor" src="./assets/img/img2.png" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
      </div>
      <div class="column">
        <img class="demo cursor" src="./assets/img/img3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Mountains and fjords">
      </div>
      <div class="column">
        <img class="demo cursor" src="./assets/img/img4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
      </div>
      <div class="column">
        <img class="demo cursor" src="./assets/img/banner6.png" style="width:100%" onclick="currentSlide(5)" alt="Nature and sunrise">
      </div>
      <div class="column">
        <img class="demo cursor" src="./assets/img/img5.jpg" style="width:100%" onclick="currentSlide(6)" alt="Snowy Mountains">
      </div>
    </div>
  </div>
  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {
        slideIndex = 1
      }
      if (n < 1) {
        slideIndex = slides.length
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
      captionText.innerHTML = dots[slideIndex - 1].alt;
    }
  </script>
  <!-- AUTOPLAY -->
  <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {
        myIndex = 1
      }
      x[myIndex - 1].style.display = "block";
      setTimeout(carousel, 3000);
    }
  </script>
  <!-- container -->
  <div class="app">
    <div class="container-box">
      <div class="container-box-app">
        <div class="container__heading-box">
          <b>PHIM ????? C??? CHO B???N</b>

          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>
          </span>
        </div>

        <div class="slider owl-carousel">
          <?php
            $sql = "SELECT * FROM `phim` ORDER BY `LuotView` DESC LIMIT 8";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            while($row = mysqli_fetch_assoc($result))
            {
              ?>
                <a href="./xemchitietphim.php?id=<?php echo $row['MaPhim']; ?>" title="The Conjuring 2 (2016)">
                <div class="card">
                  <div class="img">
                    <img src="./Admin/file/image/<?php echo $row['VideoImg'];?>" alt="">
                  </div>
                  <i class="card__icon fas fa-play-circle"></i>
                  <div class="card__ep">
                    <span class="card__ep-name">T???p <?php echo $row['SoTapPhim']; ?></span>
                  </div>
                  <div class="content">
                    <div class="title">
                      Viet Sub</div>
                    <div class="sub-title">
                      <?php echo $row['TenPhim']; ?></div>
                  </div>
                </div>
              </a>
              <?php
            }
        ?>
        </div>
      </div>
      <div class="container-box-app container-box-app--dark">
        <div class="container__heading-box">
          <b>PHIM KHUY???N M??I</b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>
          </span>
        </div>
        <div class="slider owl-carousel">
          <?php
            $sql01 = "SELECT * FROM `phim` WHERE `MaKhuyenMai` IS NOT NULL LIMIT 8";
            $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
            $num01 = mysqli_num_rows($result01);
            if($num01 < 8)
            {
              $sodu = 8 - $num01;
              $sql02 = "SELECT * FROM `phim` WHERE `MaKhuyenMai` IS NULL LIMIT $sodu";
              $result02 = mysqli_query($con,$sql02) or die(mysqli_error($con));
              while($row01 = mysqli_fetch_assoc($result01))
              {
                ?>
                <a href="./xemchitietphim.php?id=<?php echo $row01['MaPhim']; ?>" title="The Conjuring 2 (2016)">
                  <div class="card">
                    <div class="img">
                      <img src="./Admin/file/image/<?php echo $row01['VideoImg'];?>" alt="">
                    </div>
                    <i class="card__icon fas fa-play-circle"></i>
                    <div class="card__ep">
                      <span class="card__ep-name">Full Thuy???t Minh</span>
                    </div>
                    <div class="content">
                      <div class="title">
                        Viet Sub</div>
                      <div class="sub-title">
                        <?php echo $row01['TenPhim']; ?></div>
                    </div>
                  </div>
                </a>
              <?php
              }
              while($row02 = mysqli_fetch_assoc($result02))
              {
                ?>
                <a href="./xemchitietphim.php?id=<?php echo $row02['MaPhim']; ?>" title="The Conjuring 2 (2016)">
                  <div class="card">
                    <div class="img">
                      <img src="./Admin/file/image/<?php echo $row02['VideoImg'];?>" alt="">
                    </div>
                    <i class="card__icon fas fa-play-circle"></i>
                    <div class="card__ep">
                      <span class="card__ep-name">Full Thuy???t Minh</span>
                    </div>
                    <div class="content">
                      <div class="title">
                        Viet Sub</div>
                      <div class="sub-title">
                        <?php echo $row02['TenPhim']; ?></div>
                    </div>
                  </div>
                </a>
              <?php
              }
            }
          ?>
        </div>
      </div>
      <div class="container-box-app">
        <div class="container__heading-box">
          <b>PHIM L??? M???I C???P NH???T</b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>
          </span>
        </div>
        <div class="slider owl-carousel">
          <div class="card">
            <div class="img">
              <img src="./assets/img/film13.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                Qu??i ?????n</div>
              <div class="sub-title">
                Freaky (2020)</div>
            </div>
          </div>

          <div class="card">
            <div class="img">
              <img src="./assets/img/film14.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                Ch?? Ng???a ??en Beauty</div>
              <div class="sub-title">
                Black Beauty (2020)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film2.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                Ti???n B???i, ?????ng ????nh M??u Son ????</div>
              <div class="sub-title">
                Sunbae, Don't Put On That Lipstick (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film3.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                H???nh Ph??c Nh??? C???a Anh</div>
              <div class="sub-title">
                My Little Happiness (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film4.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                T??nh Y??u Ch???n ???? Th???</div>
              <div class="sub-title">
                Lovestruck in the City (2020)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">Full Vietsub</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app container-box-app--dark">
        <div class="container__heading-box">
          <b>PHIM TVB (SCTV9)
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>
          </span>

        </div>
        <div class="slider owl-carousel">

          <div class="card">
            <div class="img">
              <img src="./assets/img/film15.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Ta ch??nh l?? c?? n????ng nh?? th???</div>
              <div class="sub-title">
                I Am Just This Type of Girl (Con G??i L?? Th??? ????)</div>
            </div>
          </div>

          <div class="card">
            <div class="img">
              <img src="./assets/img/film1.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                L??nh v???c</div>
              <div class="sub-title">
                Spirit Realm (The World of Fantasy)</div>
            </div>
          </div>

          <div class="card">
            <div class="img">
              <img src="./assets/img/film2.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Ti???n B???i, ?????ng ????nh M??u Son ????</div>
              <div class="sub-title">
                Sunbae, Don't Put On That Lipstick (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film3.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???nh Ph??c Nh??? C???a Anh</div>
              <div class="sub-title">
                My Little Happiness (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film4.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                T??nh Y??u Ch???n ???? Th???</div>
              <div class="sub-title">
                Lovestruck in the City (2020)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app">
        <div class="container__heading-box">
          <b>TV SHOW
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>
          </span>
        </div>
        <div class="slider owl-carousel">
          <div class="card">
            <div class="img">
              <img src="./assets/img/film16.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 125</span>
            </div>
            <div class="content">
              <div class="title">
                Run BTS!</div>
              <div class="sub-title">
                Run BTS</div>
            </div>
          </div>

          <div class="card">
            <div class="img">
              <img src="./assets/img/film17.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 529 Preview</span>
            </div>
            <div class="content">
              <div class="title">
                Running Man (H??n Qu???c): Th??? Th??ch Th???n T?????ng</div>
              <div class="sub-title">
                Running Man Vietsub</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film18.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 56 Preview</span>
            </div>
            <div class="content">
              <div class="title">
                Delicious Rendezvous</div>
              <div class="sub-title">
                Delicious Rendezvous (2019)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film19.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 10</span>
            </div>
            <div class="content">
              <div class="title">
                Lady Land</div>
              <div class="sub-title">
                Lady Land</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film20.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 12</span>
            </div>
            <div class="content">
              <div class="title">
                Sing or Spin 2</div>
              <div class="sub-title">
                Sing or Spin 2</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app container-box-app--dark">
        <div class="container__heading-box">
          <b>PHIM HO???T H??NH - ANIME
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>

          </span>


        </div>
        <div class="slider owl-carousel">

          <div class="card">
            <div class="img">
              <img src="./assets/img/film21.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 7</span>
            </div>
            <div class="content">
              <div class="title">
                T?? V????ng Truy Th???: Nh???t Th??? Khuynh Th??nh</div>
              <div class="sub-title">
                Be My Wife (Xie Wang Zhui Qi 2)</div>
            </div>
          </div>


          <div class="card">
            <div class="img">
              <img src="./assets/img/film22.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 5</span>
            </div>
            <div class="content">
              <div class="title">
                Tinh H??i K??? S??</div>
              <div class="sub-title">
                Xing Hai Qi Shi (Knights on Debris) (2020)</div>
            </div>
          </div>


          <div class="card">
            <div class="img">
              <img src="./assets/img/film2.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Ti???n B???i, ?????ng ????nh M??u Son ????</div>
              <div class="sub-title">
                Sunbae, Don't Put On That Lipstick (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film3.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???nh Ph??c Nh??? C???a Anh</div>
              <div class="sub-title">
                My Little Happiness (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film4.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                T??nh Y??u Ch???n ???? Th???</div>
              <div class="sub-title">
                Lovestruck in the City (2020)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app">
        <div class="container__heading-box">
          <b>PHIM KINH D???
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>

          </span>
        </div>
        <div class="slider owl-carousel">
          <div class="card">
            <div class="img">
              <img src="./assets/img/film16.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 125</span>
            </div>
            <div class="content">
              <div class="title">
                Run BTS!</div>
              <div class="sub-title">
                Run BTS</div>
            </div>
          </div>

          <div class="card">
            <div class="img">
              <img src="./assets/img/film17.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 529 Preview</span>
            </div>
            <div class="content">
              <div class="title">
                Running Man (H??n Qu???c): Th??? Th??ch Th???n T?????ng</div>
              <div class="sub-title">
                Running Man Vietsub</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film18.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 56 Preview</span>
            </div>
            <div class="content">
              <div class="title">
                Delicious Rendezvous</div>
              <div class="sub-title">
                Delicious Rendezvous (2019)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film19.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 10</span>
            </div>
            <div class="content">
              <div class="title">
                Lady Land</div>
              <div class="sub-title">
                Lady Land</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film20.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 12</span>
            </div>
            <div class="content">
              <div class="title">
                Sing or Spin 2</div>
              <div class="sub-title">
                Sing or Spin 2</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app container-box-app--dark">
        <div class="container__heading-box">
          <b>PHIM H??I H?????C
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>

          </span>


        </div>
        <div class="slider owl-carousel">

          <div class="card">
            <div class="img">
              <img src="./assets/img/film21.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 7</span>
            </div>
            <div class="content">
              <div class="title">
                T?? V????ng Truy Th???: Nh???t Th??? Khuynh Th??nh</div>
              <div class="sub-title">
                Be My Wife (Xie Wang Zhui Qi 2)</div>
            </div>
          </div>


          <div class="card">
            <div class="img">
              <img src="./assets/img/film22.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 5</span>
            </div>
            <div class="content">
              <div class="title">
                Tinh H??i K??? S??</div>
              <div class="sub-title">
                Xing Hai Qi Shi (Knights on Debris) (2020)</div>
            </div>
          </div>


          <div class="card">
            <div class="img">
              <img src="./assets/img/film2.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Ti???n B???i, ?????ng ????nh M??u Son ????</div>
              <div class="sub-title">
                Sunbae, Don't Put On That Lipstick (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film3.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???nh Ph??c Nh??? C???a Anh</div>
              <div class="sub-title">
                My Little Happiness (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film4.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                T??nh Y??u Ch???n ???? Th???</div>
              <div class="sub-title">
                Lovestruck in the City (2020)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app">
        <div class="container__heading-box">
          <b>PHIM T??NH C???M L??NG M???N
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>

          </span>
        </div>
        <div class="slider owl-carousel">
          <div class="card">
            <div class="img">
              <img src="./assets/img/film16.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 125</span>
            </div>
            <div class="content">
              <div class="title">
                Run BTS!</div>
              <div class="sub-title">
                Run BTS</div>
            </div>
          </div>

          <div class="card">
            <div class="img">
              <img src="./assets/img/film17.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 529 Preview</span>
            </div>
            <div class="content">
              <div class="title">
                Running Man (H??n Qu???c): Th??? Th??ch Th???n T?????ng</div>
              <div class="sub-title">
                Running Man Vietsub</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film18.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 56 Preview</span>
            </div>
            <div class="content">
              <div class="title">
                Delicious Rendezvous</div>
              <div class="sub-title">
                Delicious Rendezvous (2019)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film19.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 10</span>
            </div>
            <div class="content">
              <div class="title">
                Lady Land</div>
              <div class="sub-title">
                Lady Land</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film20.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 12</span>
            </div>
            <div class="content">
              <div class="title">
                Sing or Spin 2</div>
              <div class="sub-title">
                Sing or Spin 2</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-box-app container-box-app--dark">
        <div class="container__heading-box">
          <b>PHIM H???C ???????NG
          </b>
          <span>
            <a href="">Xem t???t c???
              <i class="fas fa-angle-right"></i>
            </a>

          </span>


        </div>
        <div class="slider owl-carousel">

          <div class="card">
            <div class="img">
              <img src="./assets/img/film21.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 7</span>
            </div>
            <div class="content">
              <div class="title">
                T?? V????ng Truy Th???: Nh???t Th??? Khuynh Th??nh</div>
              <div class="sub-title">
                Be My Wife (Xie Wang Zhui Qi 2)</div>
            </div>
          </div>


          <div class="card">
            <div class="img">
              <img src="./assets/img/film22.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 5</span>
            </div>
            <div class="content">
              <div class="title">
                Tinh H??i K??? S??</div>
              <div class="sub-title">
                Xing Hai Qi Shi (Knights on Debris) (2020)</div>
            </div>
          </div>


          <div class="card">
            <div class="img">
              <img src="./assets/img/film2.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Ti???n B???i, ?????ng ????nh M??u Son ????</div>
              <div class="sub-title">
                Sunbae, Don't Put On That Lipstick (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film3.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???nh Ph??c Nh??? C???a Anh</div>
              <div class="sub-title">
                My Little Happiness (2021)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film4.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                T??nh Y??u Ch???n ???? Th???</div>
              <div class="sub-title">
                Lovestruck in the City (2020)</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film5.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                ?????o H???i T???c</div>
              <div class="sub-title">
                One Piece</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film6.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                H???u Ph???</div>
              <div class="sub-title">
                Legend Of Fei</div>
            </div>
          </div>
          <div class="card">
            <div class="img">
              <img src="./assets/img/film7.png" alt="">
            </div>
            <i class="card__icon fas fa-play-circle"></i>
            <div class="card__ep">
              <span class="card__ep-name">T???p 6</span>
            </div>
            <div class="content">
              <div class="title">
                Th???t Nghi???p Chuy???n Sinh</div>
              <div class="sub-title">
                Mushoku Tensei: Jobless Reincarnation</div>
            </div>
          </div>
        </div>
      </div>
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
    <div class="sidebar">
      <div class="sidebar__heading">
        <h1>B???NG X???P H???NG</h1>
        <ul class="sidebar__list-btn">
          <li class="sidebar__list-item-btn sidebar__list-item-btn--active">
            <a href="#">196 Phim B???</a>
          </li>
          <li class="sidebar__list-item-btn">
            <a href="#">41 Phim L???</a>
          </li>
          <li class="sidebar__list-item-btn">
            <a href="#">22 Ho???t H??nh</a>
          </li>
        </ul>
      </div>
      <ul class="sidebar__list">
        <li class="sidebar__item">
          <a href="" class="sidebar__item-link">
            <div class="sidebar__img" style="background-image: url(./assets/img/sidebar1.png);background-size: cover;background-position: center;">

            </div>
            <div class="sidebar__item-info">
              <span class="sidebar__item-head">Mr. Queen (C??ng Ch??a Kh?? G???n)</span>
              <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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

                True Beauty-V??? ?????p ????ch Th???c</span>
              <span class="sidebar__item-subhead">2020</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 11 Preview
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
              <span class="sidebar__item-head">Mr. Queen (C??ng Ch??a Kh?? G???n)</span>
              <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Mr. Queen (C??ng Ch??a Kh?? G???n)</span>
              <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Mr. Queen (C??ng Ch??a Kh?? G???n)</span>
              <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Mr. Queen (C??ng Ch??a Kh?? G???n)</span>
              <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Mr. Queen (C??ng Ch??a Kh?? G???n)</span>
              <span class="sidebar__item-subhead">Mr. Queen (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
                </span>
              </div>
            </div>
            <i class="sidebar__item-icon fas fa-play-circle"></i>
          </a>
        </li>
      </ul>
      <div class="sidebar__heading sidebar__heading--has-border">
        <h1>PHIM HAY TR???N B???</h1>
      </div>
      <ul class="sidebar__list sidebar__list--notscrollbar">
        <li class="sidebar__item">
          <a href="" class="sidebar__item-link">
            <div class="sidebar__img" style="background-image: url(./assets/img/sidebar3.png);background-size: cover;background-position: center;">

            </div>
            <div class="sidebar__item-info">
              <span class="sidebar__item-head">N???a L?? ???????ng M???t, N???a L?? ??au Th????ng</span>
              <span class="sidebar__item-subhead">Love Is Sweet</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 36 Thuy???t minh-End
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

                Y??u Nhau ??i, Th???c M???ng Qu??n</span>
              <span class="sidebar__item-subhead">Poisoned Love (2020)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 11 Preview
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
              <span class="sidebar__item-head">Nh?? ?? Ph????ng Phi</span>
              <span class="sidebar__item-subhead">The Blooms at Ruyi Pavilion</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Y???n V??n ????i</span>
              <span class="sidebar__item-subhead">The Legend of Xiao Chuo</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Lang ??i???n H???</span>
              <span class="sidebar__item-subhead">The Majesty Of Wolf (The Wolf)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">Con Tim S???t ????</span>
              <span class="sidebar__item-subhead">Heart of Stone/ Huajai Sila 2019</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">C?? M???c H???m M???t 2019</span>
              <span class="sidebar__item-subhead">Go Go Squid</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">H??? C??nh N??i Anh</span>
              <span class="sidebar__item-subhead">Crash Landing On You (2019)</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">L???y Danh Ngh??a Ng?????i Nh??</span>
              <span class="sidebar__item-subhead">Go Ahead</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
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
              <span class="sidebar__item-head">B???n Trai T??i L?? H??? Ly (C???u V?? H??? Truy???n)</span>
              <span class="sidebar__item-subhead">Tale Of The Nine Tailed</span>

              <div class="sidebar__item-ep">
                <span class="sidebar__item-ep-name">
                  T???p 13 Preview
                </span>
              </div>
            </div>
            <i class="sidebar__item-icon fas fa-play-circle"></i>
          </a>
        </li>
      </ul>
      <div class="sidebar__heading sidebar__heading--has-border">
        <h1>PHIM S???P CHI???U</h1>
      </div>
      <ul class="sidebar__list">
        <li class="sidebar__item2">
          <a href="#" class="sidebar__item2-link">
            <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
            <div class="sidebar__item2-info">
              <div class="sidebar__item2-name">?????nh M???nh: Winx Saga (Ph???n 1)</div>
              <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
            </div>
          </a>

        </li>
        <li class="sidebar__item2">
          <a href="#" class="sidebar__item2-link">
            <img src="./assets/img/Busted-Season-3.jpg" alt="" class="sidebar__item2-img">
            <div class="sidebar__item2-info">
              <div class="sidebar__item2-name">Busted (Ph???n 3)</div>
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
              <div class="sidebar__item2-name">Th???m Y??u - Qu???t Sinh Ho??i Nam (Drama)</div>
              <div class="sidebar__item2-subname">Unrequited Love (2020)</div>
            </div>
          </a>

        </li>
        <li class="sidebar__item2">
          <a href="#" class="sidebar__item2-link">
            <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
            <div class="sidebar__item2-info">
              <div class="sidebar__item2-name">?????nh M???nh: Winx Saga (Ph???n 1)</div>
              <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
            </div>
          </a>

        </li>
        <li class="sidebar__item2">
          <a href="#" class="sidebar__item2-link">
            <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
            <div class="sidebar__item2-info">
              <div class="sidebar__item2-name">?????nh M???nh: Winx Saga (Ph???n 1)</div>
              <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
            </div>
          </a>

        </li>
        <li class="sidebar__item2">
          <a href="#" class="sidebar__item2-link">
            <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
            <div class="sidebar__item2-info">
              <div class="sidebar__item2-name">?????nh M???nh: Winx Saga (Ph???n 1)</div>
              <div class="sidebar__item2-subname">Fate: The Winx Saga (Season 1) (2021)</div>
            </div>
          </a>

        </li>
        <li class="sidebar__item2">
          <a href="#" class="sidebar__item2-link">
            <img src="./assets/img/sidebar13.png" alt="" class="sidebar__item2-img">
            <div class="sidebar__item2-info">
              <div class="sidebar__item2-name">?????nh M???nh: Winx Saga (Ph???n 1)</div>
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
      <p class="par">N??i c???p nh???t nh???ng b??? phim m???i hot nh???t hi???n nay.</p>
    </div>
    <div class="footer__right">
      <span class="footer__right-name">Th??ng Tin</span>
      <ul class="footer__right-list">
        <li class="footer__right-item">
          <a href="#">??i???u kho???n s??? d???ng</a>
        </li>
        <li class="footer__right-item">
          <a href="#">B???n quy???n v?? tr??ch nhi???m n???i dung</a>
        </li>
        <li class="footer__right-item">
          <a href="#">Admin: trankhiem1308@gmai.com</a>
        </li>
        <li class="footer__right-item">
          <a href="#">Li??n h??? QC: ads.movies123@gmail.com</a>
        </li>
      </ul>
    </div>
  </footer>
  <div class="footer1">
    <div class="footer1-left">
      <p>?? 2022 Copyright
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