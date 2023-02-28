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
<?php
    $id = $_GET['id'];
    $show_query = "SELECT * FROM `theloai` WHERE MaTheLoai = '$id'";
    $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));   
    $row = mysqli_fetch_assoc($show_result)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $row['TenTheLoai']; ?></title>
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
            $show_query01 = "SELECT * FROM `phim` WHERE MaTheLoai = '$id'";
            $show_result01 = mysqli_query($con,$show_query01) or die(mysqli_error($con));  
            while ($row01 = mysqli_fetch_assoc($show_result01))
            {
                ?>
                <div class="col-sm-3 mb-3">
                    <div class="card">
                        <a href="./ChiTietPhim.php?id=<?php echo $row01['MaPhim']; ?>&note=TL&code=<?php echo $id; ?>">
                        <div class="card-header">
                            <img class="card-img-top anh-khuyenmai" src="./file/image/<?php echo $row01['VideoImg']; ?>" alt="Card image" >
                        </div>
                        </a>
                        <div class="card-body"><?php echo $row01['TenPhim']; ?></div>  
                    </div>
                </div>
                <?php
            }
        ?>        
    </div>
</div>
</br>
<?php
    require './giaodien/footer.php';
  ?>


</body>
</html>
