<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $TieuDe = mysqli_real_escape_string($con,$_POST['TieuDe']);
    $ThongTin = mysqli_real_escape_string($con,$_POST['ThongTin']);
    $AnhTin = mysqli_real_escape_string($con,$_POST['AnhTin']);
    $ThoiGian = date("d/m/Y");

    $Thongtin_authentication_query = "SELECT * FROM `tintuc` WHERE `TieuDe` = '$TieuDe'";
    $Thongtin_authentication_result = mysqli_query($con, $Thongtin_authentication_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($Thongtin_authentication_result);
    if($rowcount > 0)
    {
        ?>
            <script>
                alert('Tiêu đề đã tồn tại');
                location.href = '../ThemTinTuc.php';
            </script>
        <?php
    }
    else
    {
        $insert_query="INSERT INTO `tintuc`(`ThongTin`, `TieuDe`, `AnhTin`, `ThoiGian`, `LuotXem`, `LuotThich`) VALUES ('$ThongTin','$TieuDe','$AnhTin','$ThoiGian',DEFAULT,DEFAULT)";
        $insert_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
        ?>
        <script>
            alert('Thêm thành công');
            location.href = '../TinTuc.php';
        </script>
    <?php
    }
?>