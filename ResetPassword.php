<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style2.css">
    <title>Reset Mật Khẩu</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Update</span>               
                    <form action="./mail/sendmail.php" method="post">
                        <div class="input-field">
                            <input required type="text" name="Username" placeholder="Nhập tài khoản của bạn">
                           <i class="uil uil-user"></i>
                        </div>
                       <div class="input-field">
                            <input required class="password" type="email" name="Email" placeholder="Nhập email của bạn">
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="submit" value="Cập nhật">                            
                        </div>
                    </form>               
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