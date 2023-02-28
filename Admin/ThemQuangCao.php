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
  <title>Thêm Quảng Cáo</title>
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
    <h2 class="col-sm-6">Thêm Quảng Cáo</h2>
    <form action="./xuly/xulythemquangcao.php" method="post">
        <div class="form-group col-sm-6">
            <label for="">Công ty:</label>
            <input type="text" class="form-control" id="" placeholder="Công Ty" name="CongTy">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Đường dẫn:</label>
            <input type="text" class="form-control" id="" placeholder="Đường Dẫn" name="Link">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Phí quảng cáo:</label>
            <input type="text" class="form-control" id="" placeholder="Thu Nhập" name="ChiPhi">
        </div>
        <div class="form-group col-sm-6">
            <label class="">Banner quảng cáo:</label><br>
            <input type="file" name="Banner" id="" class="item-image-btn">
        </div>
        <div class="form-group col-sm-6">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='QuangCao.php'">Hủy</button>
            <button type="submit" class="btn btn-dark">Thêm</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
