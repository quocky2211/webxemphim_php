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
  <title>Chi tiết Tin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./design/anhtable.css"/>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

<div class="container" style="margin-top:30px">
  <div class="row">
        <?php
            $id = $_GET['id'];
            $show_query = "SELECT * FROM `tintuc` WHERE `MaTinTuc` = '$id'";
            $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));
            $rows = mysqli_fetch_assoc($show_result);
        ?>
        <div class="anh col-sm-12 mb-3">
            <img src="./file/image/<?php echo $rows['AnhTin']; ?>" class="trailer" alt="Chưa có ảnh" > 
        </div>
        
        <div class="col-sm-12" >
            <h2 class="Tenphim"><?php echo $rows['TieuDe']; ?></h2>
              <p ><label class="label-title">Thời Gian:</label><label ><?php echo $rows['ThoiGian']; ?></label></p>
              <p ><label class="label-title">Lượt Xem:</label><label ><?php echo $rows['LuotXem']; ?></label></p>
              <p ><label class="label-title">Lượt Thích:</label><label ><?php echo $rows['LuotThich']; ?></label></p>
              <p ><label class="label-title">Thông tin:</label><label ><?php echo $rows['ThongTin']; ?></label></p>
        </div>
     
        <div class="col-sm-12 mb-3">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='TinTuc.php'">Hủy</button>
            <button type="submit" class="btn btn-dark" onclick="document.location='SuaTinTuc.php?id=<?php echo $id; ?>'">Sửa</button>
        </div>
  </div>
</div>
    

<?php
    require './giaodien/footer.php';
  ?>


</body>
</html>

