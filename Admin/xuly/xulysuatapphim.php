<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $id = mysqli_real_escape_string($con,$_POST['id']);
    $MaPhim = mysqli_real_escape_string($con,$_POST['MaPhim']);
    $FilePhim = mysqli_real_escape_string($con,$_POST['FilePhim']);
    $ThuTu = mysqli_real_escape_string($con,$_POST['ThuTu']);

    $Thongtin_authentication_query = "SELECT * FROM `tapphim` WHERE `MaPhim` = '$MaPhim' AND `ThuTu` = '$ThuTu' AND `MaTapPhim` != '$id'";
    $Thongtin_authentication_result = mysqli_query($con, $Thongtin_authentication_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($Thongtin_authentication_result);
    if($rowcount > 0)
    {
        ?>
            <script>
                alert('Tập phim này đã tồn tại');
                location.href = '../SuaTapPhim.php?id=<?php echo $id; ?>&target=<?php echo $MaPhim; ?>';
            </script>
        <?php
    }
    else
    {
        $Update_query = "UPDATE `tapphim` SET `FilePhim`='$FilePhim',`ThuTu`='$ThuTu' WHERE `MaTapPhim`='$id'";
        $Update_result = mysqli_query($con,$Update_query) or die (mysqli_error($con));

        ?>
        <script>
            alert('Sửa thành công');
            location.href = '../ChiTietSoTap.php?id=<?php echo $MaPhim; ?>';
        </script>
    <?php
    }
?>