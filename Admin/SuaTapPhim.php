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
  <title>Sửa Tập Phim</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

  <?php
      $id = $_GET['id'];
      $MaPhim = $_GET['target'];
      $show_query = "SELECT * FROM `tapphim` WHERE MaTapPhim = '$id'";
      $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));
      $row = mysqli_fetch_assoc($show_result);
  ?>
<div class="container" style="margin-top:30px">   
    <h2 class="col-sm-6">Sửa Tập Phim</h2>
    <form action="./xuly/xulysuatapphim.php" method="post">
        <input style="display: none;" type="text" name="id" value="<?php echo $id; ?>">
        <input style="display: none;" type="text" name="MaPhim" value="<?php echo $MaPhim; ?>">
        <div class="form-group col-sm-6">
            <label for="">Số tập:</label>
            <input type="text" class="form-control" id="" placeholder="Tên Phim" name="ThuTu" value="<?php echo $row['ThuTu']; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">File:</label>
            <input type="file" required name="FilePhim" id="" class="item-image-btn">
            <br>
            <label for="">File hiện tại: <?php echo $row['FilePhim']; ?></label>
        </div>
        <div class="form-group col-sm-6">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='ChiTietSoTap.php?id=<?php echo $MaPhim; ?>'">Hủy</button>
            <button type="submit" class="btn btn-dark">Sửa</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
