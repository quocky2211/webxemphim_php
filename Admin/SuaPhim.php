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
  <title>Sửa Phim</title>
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
    $show_query = "SELECT * FROM `phim` WHERE `MaPhim` = '$id'";
    $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($show_result);
?>
<div class="container" style="margin-top:30px">   
    <h2 class="col-sm-6">Sửa Phim</h2>
    <form action="./xuly/xulysuaphim.php" method="post">
        <input style="display: none;" type="text" name="id" value="<?php echo $id; ?>">
        <div class="form-group col-sm-6">
            <label for="">Tên Phim:</label>
            <input type="text" required class="form-control" id="" placeholder="Tên Phim" name="TenPhim" value="<?php echo $row['TenPhim']; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Thể Loại :</label>
            <select class="form-control" name="MaTheLoai" required>
                <?php
                    $Show_query = "SELECT * FROM `theloai`";
                    $Show_result = mysqli_query($con,$Show_query) or die(mysqli_error($con));
                    while ($row01 = mysqli_fetch_assoc($Show_result))
                    {
                        ?>
                        <option value="<?php echo $row01['MaTheLoai']; ?>" <?php if($row01['MaTheLoai'] == $row['MaTheLoai']) echo 'SELECTED'  ?>><?php echo $row01['TenTheLoai']; ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="">Năm Phát Hành:</label>
            <input type="text" required class="form-control" id="" placeholder="Năm Phát Hành" name="NamPhatHanh" value="<?php echo $row['NamPhatHanh']; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Giá:</label>
            <input type="text" class="form-control" id="" placeholder="Giá" name="GiaMua" value="<?php echo $row['GiaMua']; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Mô Tả:</label>
            <input type="text" class="form-control" id="" placeholder="Mô Tả" name="MoTa" value="<?php echo $row['MoTa']; ?>">
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
            <button type="reset" class="btn btn-danger" onclick="document.location='ChiTietPhim.php?id=<?php echo $_GET['id']; ?>&note=&code=0'">Hủy</button>
            <button type="submit" class="btn btn-dark">Sửa</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
