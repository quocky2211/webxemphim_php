<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $TenPhim = mysqli_real_escape_string($con,$_POST['TenPhim']);
    $NamPhatHanh = mysqli_real_escape_string($con,$_POST['NamPhatHanh']);
    $Trailer = mysqli_real_escape_string($con,$_POST['Trailer']);
    $VideoImg = mysqli_real_escape_string($con,$_POST['VideoImg']);
    $GiaMua =  mysqli_real_escape_string($con,$_POST['GiaMua']);
    $TenTheLoai = mysqli_real_escape_string($con,$_POST['TenTheLoai']);
    $MoTa = mysqli_real_escape_string($con,$_POST['MoTa']);

    if($TenPhim == "" || $TenTheLoai == "" || $NamPhatHanh == "")
    {
        ?>
        <script>
            alert('Vui lòng điền đầy đủ thông tin');
            location.href = '../ThemPhim.php';
        </script>
        <?php
    }
    else
    {
        $phim_authentication_query = "SELECT * FROM `phim` WHERE TenPhim = '$TenPhim'";
        $phim_authentication_result = mysqli_query($con,$phim_authentication_query) or die(mysqli_error($con));
        $rows_fetched = mysqli_num_rows($phim_authentication_result);
        if($rows_fetched == 0)
        {
            $theloai_authentication_query = "SELECT * FROM `theloai` WHERE `TenTheLoai` = '$TenTheLoai'";
            $theloai_authentication_result =mysqli_query($con,$theloai_authentication_query) or die(mysqli_error($con));
            $rows_fetched01 = mysqli_num_rows($theloai_authentication_result);
            $rows01 = mysqli_fetch_assoc($theloai_authentication_result);
            if ($rows_fetched01 > 0)
            {
                if ($GiaMua == "")
                {
                    $GiaMua = 0;
                }
                if ($MoTa == "")
                {
                    $MoTa = "Chưa có mô tả nào!";
                }            
                $MaTheLoai = $rows01['MaTheLoai'];
                $insert_query = "INSERT INTO `phim`(`TenPhim`, `VideoImg`, `MoTa`, `Trailer`, `NamPhatHanh`, `MaTheLoai`, `SoTapPhim`, `GiaMua`,`MaKhuyenMai`,`LuotLike`,`LuotView`) VALUES ('$TenPhim','$VideoImg','$MoTa','$Trailer','$NamPhatHanh','$MaTheLoai',DEFAULT,'$GiaMua',DEFAULT,DEFAULT,DEFAULT)";
                $insert_result = mysqli_query($con,$insert_query);
                ?>
                <script>
                    alert('Thêm thành công');
                    location.href = '../Phim.php';
                </script>
                <?php
            }
            else
            {
                ?>
                <script>
                    alert('Thể loại chưa tồn tại');
                    location.href = '../ThemPhim.php';
                </script>
                <?php
            }
        }
        else
        {
            ?>
            <script>
                alert('Phim đã tồn tại');
                location.href = '../ThemPhim.php';
            </script>
            <?php
        }
    }
?>