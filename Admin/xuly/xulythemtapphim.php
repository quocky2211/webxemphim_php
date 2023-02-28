<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $MaPhim = mysqli_real_escape_string($con,$_POST['MaPhim']);
    $ThuTu = mysqli_real_escape_string($con,$_POST['ThuTu']);
    $FilePhim = mysqli_real_escape_string($con,$_POST['FilePhim']);

    $check_dup_query = "SELECT * FROM `tapphim` WHERE MaPhim = '$MaPhim' AND ThuTu = '$ThuTu'";
    $check_dup_result = mysqli_query($con,$check_dup_query) or die(mysqli_error($con));
    if(mysqli_num_rows($check_dup_result) > 0)
    {
        ?>
        <script>
            alert("Tập phim đã tồn tại");
            location.href = '../ChitietSoTap.php?id=<?php echo $MaPhim; ?>';
        </script>
        <?php
    }
    else
    {
        $insert_tap_query = "INSERT INTO `tapphim`(`FilePhim`, `ThuTu`, `MaPhim`) VALUES ('$FilePhim','$ThuTu','$MaPhim')";
        $insert_tap_result = mysqli_query($con,$insert_tap_query) or die(mysqli_error($con));

        $update_sotap_query = "UPDATE `phim` SET `SoTapPhim`=`SoTapPhim` + 1 WHERE `MaPhim` = '$MaPhim'";
        $update_sotap_result = mysqli_query($con,$update_sotap_query) or die(mysqli_error($con));

        ?>
        <script>
            alert("Thêm thành công");
            location.href = '../ChitietSoTap.php?id=<?php echo $MaPhim; ?>';
        </script>
        <?php
    }
?>