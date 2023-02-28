<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $MaKhuyenMai = mysqli_real_escape_string($con,$_POST['MaKhuyenMai']);
    $PhanTram = mysqli_real_escape_string($con,$_POST['PhanTram']);

    $KM_authentication_query = "SELECT * FROM `khuyenmai` WHERE MaKhuyenMai = '$MaKhuyenMai'";
    $KM_authentication_result = mysqli_query($con, $KM_authentication_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($KM_authentication_result);
    if ($rowcount > 0)
    {
        ?>
        <script>
            alert('Mã Khuyến mãi đã tồn tại');
            location.href = '../ThemKhuyenMai.php';
        </script>
        <?php
    }
    else
    {
        $insert_query = "INSERT INTO `khuyenmai`(`MaKhuyenMai`, `PhanTram`,`UseCode`) VALUES ('$MaKhuyenMai','$PhanTram',DEFAULT)";
        $insert_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
        ?>
        <script>
            alert('Thêm thành công');
            location.href = '../KhuyenMai.php';
        </script>
        <?php
    }
?>