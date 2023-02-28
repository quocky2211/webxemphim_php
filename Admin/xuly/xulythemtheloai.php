<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    $TenTheLoai = mysqli_real_escape_string($con,$_POST['TenTheLoai']);

    $sql = "SELECT * FROM `theloai` WHERE `TenTheLoai` = '$TenTheLoai'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        ?>
        <script>
            alert("Thể loại đã tồn tại");
            window.history.back();
        </script>
        <?php
    }
    else
    {
        $sql01 = "INSERT INTO `theloai`(`TenTheLoai`) VALUES ('$TenTheLoai')";
        $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
        ?>
        <script>
            alert("Thêm thành công");
            location.href = '../TheLoai.php';
        </script>
        <?php
    }


?>