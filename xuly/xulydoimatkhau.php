<?php
    require '../ConnectDB/connect.php';
    $con = ketnoi();
    session_start();

    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $OldPassword = mysqli_real_escape_string($con,$_POST['OldPassword']);
    $NewPassword = mysqli_real_escape_string($con,$_POST['NewPassword']);
    $ReEnterPassword = mysqli_real_escape_string($con,$_POST['ReEnterPassword']);

    //Validation
    if ($NewPassword != $ReEnterPassword)
    {
        ?>
        <script>
            alert("Mật khẩu nhập lại chưa đúng");
            location.href = '../DoiMatKhau.php';
        </script>
        <?php
    }
    else
    {
        $sql = "SELECT * FROM `account` WHERE `MaTK` = '$_SESSION[id]'";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($result);
        if ($OldPassword != $row['Password'])
        {
            ?>
            <script>
                alert("Sai mật khẩu");
                location.href = '../DoiMatKhau.php';
            </script>
            <?php
        }
        else
        {
            $sql01 = "UPDATE `account` SET `Name`='$Name',`Password`='$NewPassword' WHERE `MaTK` = '$_SESSION[id]'";
            $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
            ?>
            <script>
                alert("Đổi thành công");
                location.href = '../thongtincanhan.php';
            </script>
            <?php
        }
    }
?>