<?php
    require './ConnectDB/connect.php';
    $con = ketnoi();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style2.css">
    <title>Đăng ký</title>
</head>
<body>

    <div class="container">
        <div class="forms">
                <!------------------------------ Đăng ký ----------------------------->
                <div class="form login">
                    <span class="title">Đăng ký</span>                    
                        <form action="" method="post">
                            <div class="input-field">
                                <input required type="text" name="Name" placeholder="Nhập tên của bạn">
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input required type="text" name="Username" placeholder="Nhập tài khoản của bạn">
                                <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input required class="password" name="Password" type="password" placeholder="Nhập mật khẩu của bạn">
                                <i class="uil uil-lock icon"></i>            
                            </div>
                            <div class="input-field">
                                <input required class="password" name="CheckPassword" type="password" placeholder="Nhập lại mật khẩu của bạn">
                                <i class="uil uil-lock icon"></i>
                                <i class="uil uil-eye-slash showHidePw"></i>
                            </div>
                            <div class="checkbox-text">
                                <div class="checkbox-content">
                                    <input type="checkbox" id="logCheck">
                                    <label for="logcheck" class="text">Nhớ mật khẩu</label>
                                 </div>                                 
                            </div>
                            <div class="input-field button">
                                <input type="submit" name="submit" value="Đăng ký">
                                <?php 
                                    if(isset($_POST['submit']))
                                        require './xuly/xulydangky.php'; 
                                ?>
                            </div>
                        </form>                    
                        <div class="login-signup">
                            <span class="text">Đã có tài khoản ?
                                <a href="login.php" class="text login-link">Đăng nhập</a>
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