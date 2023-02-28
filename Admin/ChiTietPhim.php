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
  <title>Chi tiết Phim</title>
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
        $id=$_GET['id'];
        $noteplace = $_GET['note']; 
        $notecode = $_GET['code'];
        $CTBook_show_query = "select * from phim where MaPhim=$id";
        $CTBook_show_result = mysqli_query($con, $CTBook_show_query) or die(mysqli_error($con));
        while($row= mysqli_fetch_assoc($CTBook_show_result))
        {
          $theloai_show_query = "select * from `theloai` where MaTheLoai=".$row['MaTheLoai']."";
          $theloai_show_result = mysqli_query($con, $theloai_show_query) or die(mysqli_error($con));
          $row01 = mysqli_fetch_assoc($theloai_show_result);
          ?>
          <div class="anh col-sm-4">
              <img src="./file/image/<?php echo $row['VideoImg']; ?>" class="trailer" alt="Cinque Terre" > 
          </div>
          
          <div class="trailer col-sm-8" >
              <video src="./file/trailer/<?php echo $row['Trailer']; ?>" class="trailer" alt="Cinque Terre" controls  > </video>
          </div>
      
          <div class="col-sm-12">
              <h2 class="Tenphim"><?php echo $row['TenPhim']; ?></h2>
          
                  <p ><label class="label-title">Thể loại:</label><label ><?php echo $row01['TenTheLoai']; ?></label></p>
                  <p ><label class="label-title">Năm phát hành:</label><label ><?php echo $row['NamPhatHanh']; ?></label></p>
                  <p ><label class="label-title">Số tập:</label><label ><?php echo $row['SoTapPhim']; ?></label></p>
                  <p ><label class="label-title">Trị giá:</label><label ><?php echo $row['GiaMua']; ?></label></p>
                  <p ><label class="label-title">Mô tả:</label><label ><?php echo $row['MoTa']; ?></label></p>

          </div>
        <?php
        }
      ?>
        <div class="col-sm-12 mb-3">
          <?php
              if($noteplace == 'TL')
              {
                ?>
                <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='XemTheLoai.php?id=<?php echo $notecode; ?>'">Hủy</button>
                <?php
              }
              else if($noteplace == 'KM')
              {
                ?>
                <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='XemKhuyenMai.php?id=<?php echo $notecode; ?>'">Hủy</button>
                <?php  
              }
              else
              {
                ?>
                <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='Phim.php'">Hủy</button>
                <button type="submit" class="btn btn-dark" onclick="document.location='SuaPhim.php?id=<?php echo $id; ?>'">Sửa</button>
                <?php  
              }
          ?>

        </div>
  </div>
</div>
    

<?php
    require './giaodien/footer.php';
  ?>


</body>
</html>

