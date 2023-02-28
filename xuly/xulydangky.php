<?php
    //get data 
    $Name = mysqli_real_escape_string($con, $_POST['Name']);
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $CheckPassword = mysqli_real_escape_string($con,$_POST['CheckPassword']);
    //check email
    $user_authentication_query = "SELECT * FROM account WHERE Username = '$Username'";
    $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
    $rows_fetched = mysqli_num_rows($user_authentication_result);
    if($rows_fetched == 0)
    {
        //check password
        if($CheckPassword != $Password)
        {
            ?>
            <script>
                alert("Mật khẩu nhập lại chưa đúng");
            </script>
            <?php
        }
        else
        {
            $Role = "User";
            $Insert_NewAccount_Query = "INSERT INTO `account`(`Name`, `Username`, `Password`, `Role`, `XuKhoa`,`Point`) VALUES ('$Name','$Username','$Password',DEFAULT,DEFAULT,DEFAULT)";
            $Insert_NewAccount_Result = mysqli_query($con,$Insert_NewAccount_Query) or die(mysqli_error($con));
            ?>
            <script>
                alert("Đăng ký thành công");
                document.location = "./login.php";
            </script>
            <?php
        }
    }
    else
    {
        ?>
        <script>
            alert("Tài khoản đã được sử dụng");
        </script>
        <?php
    }
?>