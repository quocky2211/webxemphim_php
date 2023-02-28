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
  <title>Thêm Phim</title>
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

<div class="container" style="margin-top:30px">   
    <h2 class="col-sm-6">Thêm Phim</h2>
    <form action="./xuly/xulythemphim.php" method="post">
        <div class="form-group col-sm-6">
            <label for="">Tên Phim:</label>
            <input type="text" required class="form-control" id="" placeholder="Tên Phim" name="TenPhim">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Thể Loại:</label>
            <input type="text" required class="form-control" id="" placeholder="Thể loại" name="TenTheLoai">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Năm Phát Hành:</label>
            <input type="text" required class="form-control" id="" placeholder="Năm Phát Hành" name="NamPhatHanh">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Giá:</label>
            <input type="text" class="form-control" id="" placeholder="Giá" name="GiaMua">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Mô Tả:</label>
            <input type="text" class="form-control" id="" placeholder="Mô Tả" name="MoTa">
        </div>
        <div class="form-group col-sm-6">
            <label class="">Trailer:</label><br>
            <input type="file" name="Trailer" id="" class="item-image-btn">
        </div>
        <div class="form-group col-sm-6">
            <label class="">Ảnh bìa:</label><br>
            <input type="file" name="VideoImg" id="" class="item-image-btn">
        </div>
        <div class="form-group col-sm-6">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='Phim.php'">Hủy</button>
            <button type="submit" class="btn btn-dark">Thêm</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
