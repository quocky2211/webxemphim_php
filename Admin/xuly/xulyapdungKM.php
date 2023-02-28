<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $MaKhuyenMai = mysqli_real_escape_string($con,$_POST['MaKhuyenMai']);
    $MaTheLoai = mysqli_real_escape_string($con,$_POST['MaTheLoai']);
    if ($MaTheLoai == 0)
    {
        $find_query = "SELECT * FROM khuyenmai WHERE `MaKhuyenMai` = '$MaKhuyenMai'";
        $find_result = mysqli_query($con,$find_query) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($find_result);
        $UseCode = $row['UseCode'];
        
        $update_query = "UPDATE `phim` SET `MaKhuyenMai` = DEFAULT WHERE `MaTheLoai` = '$UseCode'";
        $update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));

        $update_usecode = "UPDATE `khuyenmai` SET `UseCode`= DEFAULT WHERE `MaKhuyenMai` = '$MaKhuyenMai'";
        $updatecode_result = mysqli_query($con,$update_usecode) or die(mysqli_error($con));
    }
    else
    {
        $update_query = "UPDATE `phim` SET `MaKhuyenMai`='$MaKhuyenMai' WHERE `MaTheLoai` = '$MaTheLoai'";
        $update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));

        $update_usecode = "UPDATE `khuyenmai` SET `UseCode`= '$MaTheLoai' WHERE `MaKhuyenMai` = '$MaKhuyenMai'";
        $updatecode_result = mysqli_query($con,$update_usecode) or die(mysqli_error($con));
    }
?>
<script>
    alert("Áp dụng thành công");
    location.href = '../KhuyenMai.php';
</script>