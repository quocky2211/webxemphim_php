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
  <title>Chi tiết</title>
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
        $show_query = "SELECT * FROM `tapphim` JOIN `phim` ON phim.MaPhim = tapphim.MaPhim WHERE MaTapPhim = '$id'";
        $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($show_result);
    ?>

    <div class="container" style="margin-top:30px"> 
        <h2 class="col-sm-6"><?php echo $row['TenPhim']; ?> | Tập <?php echo $row['ThuTu']; ; ?></h2>
        <video src="./file/trailer/<?php echo $row['FilePhim']; ?>" style="width:100%;" class="trailer" alt="Cinque Terre" controls > </video>
    </div>
        
    <?php
        require './giaodien/footer.php';
    ?>


</body>
</html>