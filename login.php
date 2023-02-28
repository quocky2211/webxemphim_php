<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style2.css">
    <title>Đăng nhập</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Đăng nhập</span>               
                    <form action="" method="post">
                        <div class="input-field">
                            <input required type="text" name="Username" placeholder="Nhập tài khoản của bạn">
                           <i class="uil uil-user"></i>
                        </div>
                       <div class="input-field">
                            <input required class="password" type="password" name="Password" placeholder="Nhập mật khẩu của bạn">
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>
                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck">
                                <label for="logcheck" class="text">Nhớ mật khẩu</label>
                             </div>

                             <a href="ResetPassword.php" class="text">Quên mật khẩu ?</a>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="submit" value="Đăng nhập">
                            <!--<button><a href="index.php">Đăng nhập</a></button>-->
                            <?php 
                                if(isset($_POST['submit']))
                                    require './xuly/xulydangnhap.php'; 
                            ?>
                        </div>
                    </form>               
                    <div class="login-signup">
                        <span class="text">Chưa có tài khoản ?
                            <a href="logup.php" class="text signup-link">Đăng ký</a>
                        </span>
                    </div>
            </div>
        </div>
    </div>
</body>
    <script>
        const container = document.querySelector(".container"),
                pwShowHide = document.querySelectorAll(".showHidePw"),
                pwFields = document.querySelectorAll(".password"),
                signUp = document.querySelector(".signup-link"),
                login = document.querySelector(".login-link");

                pwShowHide.forEach(eyeIcon => {
                    eyeIcon.addEventListener("click", ()=>{
                        pwFields.forEach(pwField =>{
                            if(pwField.type ==="password"){
                                pwField.type = "text";

                                pwShowHide.forEach(icon =>{
                                    icon.classList.replace("uil-eye-slash","uil-eye");
                                })
                            }else{
                                pwField.type = "password";

                                pwShowHide.forEach(icon =>{
                                    icon.classList.replace("uil-eye","uil-eye-slash");
                                })
                            }
                            })
                    })
                })

                signUp.addEvenListener("click", () => {
                    container.classList.add("active");
                });
                login.addEvenListener("click", () => {
                    container.classList.remove("active");
                })
    </script>


</html>