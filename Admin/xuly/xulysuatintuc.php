<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $id = mysqli_real_escape_string($con,$_POST['id']);
    $TieuDe = mysqli_real_escape_string($con,$_POST['TieuDe']);
    $ThongTin = mysqli_real_escape_string($con,$_POST['ThongTin']);
    $AnhTin = mysqli_real_escape_string($con,$_POST['AnhTin']);

    if($TieuDe == "" || $ThongTin == "")
    {
        ?>
            <script>
                alert('Sai cú pháp');
                location.href = '../TinTuc.php';
            </script>
        <?php
    }
    else
    {
        $Thongtin_authentication_query = "SELECT * FROM `tintuc` WHERE `TieuDe` = '$TieuDe' AND `MaTinTuc` != '$id'";
        $Thongtin_authentication_result = mysqli_query($con, $Thongtin_authentication_query) or die(mysqli_error($con));
        $rowcount = mysqli_num_rows($Thongtin_authentication_result);
        if($rowcount > 0)
        {
            ?>
                <script>
                    alert('Tiêu đề đã tồn tại');
                    location.href = '../TinTuc.php';
                </script>
            <?php
        }
        else
        {
            if($AnhTin == "")
            {
                $update_query="UPDATE `tintuc` SET `ThongTin`='$ThongTin',`TieuDe`='$TieuDe' WHERE `MaTinTuc` = '$id'";
                $update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));
            }
            else
            {
                $update_query="UPDATE `tintuc` SET `ThongTin`='$ThongTin',`TieuDe`='$TieuDe',`AnhTin`='$AnhTin' WHERE `MaTinTuc` = '$id'";
                $update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));
            }
            ?>
            <script>
                alert('Sửa thành công');
                location.href = '../TinTuc.php';
            </script>
        <?php
        }
    }
?>