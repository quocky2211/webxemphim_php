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
  <title>Thêm Số Tập</title>
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
      $show_query = "SELECT * FROM `phim` WHERE MaPhim = '$id'";
      $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));
      $row = mysqli_fetch_assoc($show_result);
  ?>
<div class="container" style="margin-top:30px">   
    <h2 class="col-sm-6">Thêm Số Tập</h2>
    <form action="./xuly/xulythemtapphim.php" method="post">
        <div class="form-group col-sm-6">
            <label for="">Mã Phim :</label>
            <input type="text" class="form-control" id="" placeholder="Tên Phim" name="MaPhim" value="<?php echo $id; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Tên Phim :</label>
            <input type="text" class="form-control" id="" placeholder="Tên Phim" value="<?php echo $row['TenPhim']; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Số Tập:</label>
            <input type="text" class="form-control" id="" placeholder="Số Tập" name="ThuTu">
        </div>
        <div class="form-group col-sm-6">
            <label class="">File:</label><br>
            <input type="file" name="FilePhim" id="" class="item-image-btn">
        </div>
        <div class="form-group col-sm-6">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='ChitietSoTap.php?id=<?php echo $_GET['id']; ?>'">Hủy</button>
            <button type="submit" class="btn btn-dark">Thêm</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
