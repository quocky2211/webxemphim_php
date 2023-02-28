<?php
    require './connectdb/connect.php';
    $con = ketnoi();
    session_start();
    if($_SESSION['username'] == "")
    {
        ?>
        <script>
            document.location = "../login.php";
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang Chủ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

<div class="container" style="margin-top:30px">
  <div class="row">
      <div class="card-columns">
              <div class="card bg-primary">
                <div class="card-body text-center">
                <p class="card-text"><i style="font-size:24px" class="fa">&#xf2c0; </i> Số Người Dùng</p>
                </div>
              </div>

              <div class="card bg-warning">
                <div class="card-body text-center">
                  <p class="card-text"><i style="font-size:24px" class="fa">&#xf1c8; </i> Số Phim</p>
                </div>
              </div>

              <div class="card bg-success">
                <div class="card-body text-center">
                  <p class="card-text"><i style="font-size:24px" class="fa">&#xf0d6; </i> Tương Tác</p>
                </div>
              </div>
            
            </div>
  </div>
      <div class="row">
          <div class="col-sm-4">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Người Dùng</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql01 = "SELECT COUNT(*) FROM `account` WHERE `Role` != 'Admin'";
                  $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
                  $row01 = mysqli_fetch_assoc($result01);
                  $sql02 = "SELECT COUNT(DISTINCT(MaTK)) FROM `nap`;";
                  $result02 = mysqli_query($con,$sql02) or die(mysqli_error($con));
                  $row02 = mysqli_fetch_assoc($result02);
                  $sql03 = "SELECT COUNT(DISTINCT(MaTK)) FROM `binhluan`;";
                  $result03 = mysqli_query($con,$sql03) or die(mysqli_error($con));
                  $row03 = mysqli_fetch_assoc($result03);
                ?>
                <tr>
                  <td>Số Người CMT</td>
                  <td><?php echo $row03['COUNT(DISTINCT(MaTK))']; ?></td>
                </tr>
                <tr>
                  <td>Số Người Nạp</td>
                  <td><?php echo $row02['COUNT(DISTINCT(MaTK))']; ?></td>
                </tr>
                <tr>
                  <td>Số lượng Account</td>
                  <td><?php echo $row01['COUNT(*)']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Phim</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql04 = "SELECT COUNT(*) FROM `phim`";
                  $result04 = mysqli_query($con,$sql04) or die(mysqli_error($con));
                  $row04 = mysqli_fetch_assoc($result04);
                  $sql05 = "SELECT COUNT(*) FROM `chitietthanhtoan`";
                  $result05 = mysqli_query($con,$sql05) or die(mysqli_error($con));
                  $row05 = mysqli_fetch_assoc($result05);
                  $sql06 = "SELECT COUNT(DISTINCT(MaPhim)) FROM `yeuthich`";
                  $result06 = mysqli_query($con,$sql06) or die(mysqli_error($con));
                  $row06 = mysqli_fetch_assoc($result06);
                ?>
                <tr>
                  <td>Số Phim </td>
                  <td><?php echo $row04['COUNT(*)']; ?></td>
                </tr>
                <tr>
                  <td>Số Lượt Mua</td>
                  <td><?php echo $row05['COUNT(*)']; ?></td>
                </tr>
                <tr>
                  <td>Số Phim Được Yêu Thích</td>
                  <td><?php echo $row06['COUNT(DISTINCT(MaPhim))']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-sm-4">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th>Số Bình Luận Đánh Giá</th>
                  <th></th>
                </tr>
              </thead>
                <?php
                  $sql07 = "SELECT COUNT(*) FROM `binhluan`";
                  $result07 = mysqli_query($con,$sql07) or die(mysqli_error($con));
                  $row07 = mysqli_fetch_assoc($result07);
                  $sql08 = "SELECT SUM(LuotLike) FROM `phim`";
                  $result08 = mysqli_query($con,$sql08) or die(mysqli_error($con));
                  $row08 = mysqli_fetch_assoc($result08);
                  $sql09 = "SELECT SUM(LuotView) FROM `phim`";
                  $result09 = mysqli_query($con,$sql09) or die(mysqli_error($con));
                  $row09 = mysqli_fetch_assoc($result09);
                ?>
              <tbody>
                <tr>
                  <td>Số Bình Luận </td>
                  <td><?php echo $row07['COUNT(*)'] ?></td>
                </tr>
                <tr>
                  <td>Số Lượt Like</td>
                  <td><?php echo $row08['SUM(LuotLike)'] ?></td>
                </tr>
                <tr>
                  <td>Số Lượt View</td>
                  <td><?php echo $row09['SUM(LuotView)'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
</div>

<?php
    require './giaodien/footer.php';
  ?>


</body>
</html>
