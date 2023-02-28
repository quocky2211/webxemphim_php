<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $MaPhim =  mysqli_real_escape_string($con,$_POST['id']);
    $TenPhim = mysqli_real_escape_string($con,$_POST['TenPhim']);
    $NamPhatHanh = mysqli_real_escape_string($con,$_POST['NamPhatHanh']);
    $Trailer = mysqli_real_escape_string($con,$_POST['Trailer']);
    $VideoImg = mysqli_real_escape_string($con,$_POST['VideoImg']);
    $GiaMua =  mysqli_real_escape_string($con,$_POST['GiaMua']);
    $MaTheLoai = mysqli_real_escape_string($con,$_POST['MaTheLoai']);
    $MoTa = mysqli_real_escape_string($con,$_POST['MoTa']);

    $phim_authentication_query = "SELECT * FROM `phim` WHERE TenPhim = '$TenPhim' AND MaPhim != '$MaPhim'";
    $phim_authentication_result = mysqli_query($con,$phim_authentication_query) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($phim_authentication_result);
    if($rows_fetched == 0)
    {
        if ($VideoImg == "" && $Trailer == "")
        {
            $update_query = "UPDATE `phim` SET `TenPhim`='$TenPhim',`MoTa`='$MoTa',`NamPhatHanh`='$NamPhatHanh',`MaTheLoai`='$MaTheLoai',`GiaMua`='$GiaMua' WHERE `MaPhim`='$MaPhim'";
            $update_result = mysqli_query($con,$update_query);
            ?>
            <script>
                alert('Sửa thành công');
                location.href = '../ChiTietPhim.php?id=<?php echo $MaPhim; ?>&note=&code=0';
            </script>
            <?php
        }
        else if ($VideoImg == "")
        {
            $update_query = "UPDATE `phim` SET `TenPhim`='$TenPhim',`MoTa`='$MoTa',`Trailer`='$Trailer',`NamPhatHanh`='$NamPhatHanh',`MaTheLoai`='$MaTheLoai',`GiaMua`='$GiaMua' WHERE `MaPhim`='$MaPhim'";
            $update_result = mysqli_query($con,$update_query);
            ?>
            <script>
                alert('Sửa thành công');
                location.href = '../ChiTietPhim.php?id=<?php echo $MaPhim; ?>&note=&code=0';
            </script>
            <?php
        }
        else if ($Trailer == "")
        {
            $update_query = "UPDATE `phim` SET `TenPhim`='$TenPhim',`VideoImg`='$VideoImg',`MoTa`='$MoTa',`NamPhatHanh`='$NamPhatHanh',`MaTheLoai`='$MaTheLoai',`GiaMua`='$GiaMua' WHERE `MaPhim`='$MaPhim'";
            $update_result = mysqli_query($con,$update_query);
            ?>
            <script>
                alert('Sửa thành công');
                location.href = '../ChiTietPhim.php?id=<?php echo $MaPhim; ?>&note=&code=0';
            </script>
            <?php
        }
        else
        {
            $update_query = "UPDATE `phim` SET `TenPhim`='$TenPhim',`VideoImg`='$VideoImg',`MoTa`='$MoTa',`Trailer`='$Trailer',`NamPhatHanh`='$NamPhatHanh',`MaTheLoai`='$MaTheLoai',`GiaMua`='$GiaMua' WHERE `MaPhim`='$MaPhim'";
            $update_result = mysqli_query($con,$update_query);
            ?>
            <script>
                alert('Sửa thành công');
                location.href = '../ChiTietPhim.php?id=<?php echo $MaPhim; ?>&note=&code=0';
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert('Phim đã tồn tại');
            location.href = '../ChiTietPhim.php?id=<?php echo $MaPhim; ?>&note=&code=0';
        </script>
        <?php
    }
?>