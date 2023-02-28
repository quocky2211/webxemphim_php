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
        $id = $_GET['id']; 
    ?>
    <div class="container" style="margin-top:30px">   
        <h2 class="col-sm-6">Áp dụng khuyến mãi</h2>
        <form action="./xuly/xulyapdungKM.php" method="post">
            <div class="form-group col-sm-6">
                <label for="">Loại khuyến mãi:</label>
                <input type="text" class="form-control" id="" placeholder="<?php echo $_GET['id']; ?>" name="MaKhuyenMai" value="<?php echo $id; ?>">
            </div>
            <div class="form-group col-sm-6">
                <label for="">Thể Loại áp dụng:</label>
                <select class="form-control" name="MaTheLoai">
                    <option value="0">Không</option>
                <?php
                    $Show_query = "SELECT * FROM `theloai`";
                    $Show_result = mysqli_query($con,$Show_query) or die(mysqli_error($con));
                    while ($row = mysqli_fetch_assoc($Show_result))
                    {
                        $find_query = "SELECT * FROM `khuyenmai` WHERE `MaKhuyenMai` = '$id'";
                        $find_result = mysqli_query($con,$find_query) or die(mysqli_error($con));
                        $find = mysqli_fetch_assoc($find_result);
                        ?>
                        <option value="<?php echo $row['MaTheLoai']; ?>" <?php if($row['MaTheLoai'] == $find['UseCode']) echo 'SELECTED'  ?>><?php echo $row['TenTheLoai']; ?></option>
                        <?php
                    }
                ?>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='KhuyenMai.php'">Hủy</button>
                <button type="submit" class="btn btn-dark">Áp Dụng</button>
            </div>
        </form>  
    </div>
    <?php
        require './giaodien/footer.php';
    ?>
</body>
</html>