<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $MaTK = mysqli_real_escape_string($con,$_POST['MaTK']);
    $Name = mysqli_real_escape_string($con,$_POST['Name']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $Role = mysqli_real_escape_string($con,$_POST['Role']);

    $duplicate_check_query = "SELECT * FROM `account` WHERE Username = '$Username' AND MaTK != '$MaTK'";
    $duplicate_check_result = mysqli_query($con,$duplicate_check_query) or die(mysqli_error($con));
    if (mysqli_num_rows($duplicate_check_result) > 0)
    {
        ?>
        <script>
            alert("Tài khoản đã được sử dụng");
            location.href = '../HeThong.php';
        </script>
        <?php
    }
    else
    {
        $update_query = "UPDATE `account` SET `Name`='$Name',`Username`='$Username',`Password`='$Password',`Role`='$Role' WHERE MaTK = '$MaTK'";
        $update_result = mysqli_query($con,$update_query) or die(mysqli_error($con));
        ?>
        <script>
            alert("Sửa thành công");
            location.href = '../HeThong.php';
        </script>
        <?php
    }

?>