<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $Name = mysqli_real_escape_string($con,$_POST['Name']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $Role = mysqli_real_escape_string($con,$_POST['Role']);
    $user_authentication_query = "SELECT * FROM `account` WHERE Username = '$Username'";
    $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
    $rowcount = mysqli_num_rows($user_authentication_result);
    if($rowcount > 0)
    {
        ?>
            <script>
                alert('Tài khoản đã tồn tại');
                location.href = '../ThemTaiKhoan.php';
            </script>
        <?php
    }
    else
    {
        $insert_query="INSERT INTO `account`(`Name`, `Username`, `Password`, `Role`, `XuKhoa`,`Point`) VALUES ('$Name','$Username','$Password','$Role',DEFAULT,DEFAULT)";
        $insert_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
        ?>
        <script>
            alert('Thêm thành công');
            location.href = '../HeThong.php';
        </script>
    <?php
    }
?>