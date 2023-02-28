<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    $place = $_GET['place'];
    $id = $_GET['id'];
    switch($place)
    {
        case 'Phim':
        {
            $Delete_Phim_Query = "DELETE FROM `phim` WHERE MaPhim = '$id'";
            $Delete_Phim_Result = mysqli_query($con,$Delete_Phim_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../Phim.php';
            </script>
            <?php
            break;
        }
        case 'KhuyenMai':
        {
            $Delete_Khuyenmai_Query = "DELETE FROM `khuyenmai` WHERE MaKhuyenMai = '$id'";
            $Delete_Khuyenmai_Result = mysqli_query($con,$Delete_Khuyenmai_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../KhuyenMai.php';
            </script>
            <?php
            break;
        }
        case 'TinTuc':
        {
            $Delete_TinTuc_Query = "DELETE FROM `tintuc` WHERE MaTinTuc = '$id'";
            $Delete_TinTuc_Result = mysqli_query($con,$Delete_TinTuc_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../TinTuc.php';
            </script>
            <?php
            break;
        }
        case 'Account':
        {   
            $Delete_Acc_Query = "DELETE FROM `account` WHERE MaTK = '$id'";
            $Delete_Acc_Result = mysqli_query($con,$Delete_Acc_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../Hethong.php';
            </script>
            <?php
            break;
        }
        case 'TapPhim':
        {   
            $find_query = "SELECT * FROM `tapphim` WHERE MaTapPhim = '$id'";
            $find_result = mysqli_query($con,$find_query) or die(mysqli_error($con));
            $row = mysqli_fetch_assoc($find_result);
            $MaPhim = $row['MaPhim'];

            $Delete_TapPhim_Query = "DELETE FROM `tapphim` WHERE MaTapPhim = '$id'";
            $Delete_TapPhim_Result = mysqli_query($con,$Delete_TapPhim_Query) or die(mysqli_error($con));

            $Update_TapPhim_query = "UPDATE `phim` SET `SoTapPhim`=`SoTapPhim` - 1 WHERE `MaPhim` = '$MaPhim'";
            $Update_TapPhim_result = mysqli_query($con,$Update_TapPhim_query) or die(mysqli_error($con));

            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../ChitietSoTap.php?id=<?php echo $MaPhim; ?>';
            </script>
            <?php
            break;
        }
        case 'QuangCao':
        {
            $Delete_QC_Query = "DELETE FROM `quangcao` WHERE MaQC = '$id'";
            $Delete_QC_Result = mysqli_query($con,$Delete_QC_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                document.location = '../QuangCao.php';
            </script>
            <?php
            break;
        }
        case 'BinhLuan':
        {
            $sql = "DELETE FROM `binhluan` WHERE `MaBL` = '$id'";
            $result = mysqli_query($con,$sql) or die(mysqli_error($con));
            ?>
            <script>
                alert("Xóa thành công");
                window.history.back()
            </script>
            <?php
            break;
        }
    }
?>