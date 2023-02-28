<?php
    require './connectdb/connect.php';
    $con = ketnoi();
    session_start();
    if($_SESSION['username'] == "")
    {
        ?>
        <script>
            document.location = "../login.php";
        </script>
        <?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hệ thống</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./design/anhtable.css"/>
    <script src="./java/Switch.js"></script>
    <script src="./java/delitem.js"></script>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-sm-6">
            <p><label class="label-title">Tài Khoản:</label><label><?php echo $_SESSION['username']; ?></label></p>
            <p><label class="label-title">Mật Khẩu:</label><label><?php echo $_SESSION['password']; ?></label></p>
            <p><label class="label-title">Họ Tên:</label><label><?php echo $_SESSION['name']; ?></label></p>
            <p><label class="label-title">Xu Khóa:</label><label><?php echo$_SESSION['xukhoa']; ?></label></p>
                <div class="form-group ">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                        Đổi mật khẩu
                    </button>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                        Sửa thông tin
                    </button>
                </div>
                <div class="form-group ">
                    <button class="btn btn-primary" style="width:22.3%" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">DS Tài khoản</button>
                    <button type="submit" class="btn btn-danger" style="width:23%" onclick="location.href='../logout.php'">Đăng Xuất</button>
                </div>
        
            <div class="collapse" id="collapseExample1">
                <div class="card card-body">
                    <form action="/action_page.php">
                        <div class="form-group ">
                            <label for="">Mật khẩu cũ:</label>
                            <input type="text" class="form-control" id="" placeholder="Mật khẩu cũ" name="passcu">
                        </div>
                        <div class="form-group ">
                            <label for="">Mật khẩu mới:</label>
                            <input type="text" class="form-control" id="" placeholder="Mật khẩu mới" name="passmoi">
                        </div>
                        <div class="form-group ">
                            <label for="">Xác Nhận mật khẩu mới:</label>
                            <input type="text" class="form-control" id="" placeholder="Xác Nhận mật khẩu mới" name="confirmpass">
                        </div>
                        <div class="form-group ">
                            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='HeThong.php'">Hủy</button>
                            <button type="submit" class="btn btn-dark">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
                </br>
            <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                    <form action="/action_page.php">
                        <div class="form-group ">
                            <label for="">Họ Tên:</label>
                            <input type="text" class="form-control" id="" placeholder="Mật khẩu cũ" name="passcu">
                        </div>
                        <div class="form-group ">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" id="" placeholder="Mật khẩu mới" name="passmoi">
                        </div>
                        <div class="form-group ">
                            <label for="">SĐT:</label>
                            <input type="text" class="form-control" id="" placeholder="Mật khẩu mới" name="passmoi">
                        </div>
                        <div class="form-group ">
                            <label for="">Địa chỉ:</label>
                            <input type="text" class="form-control" id="" placeholder="Xác Nhận mật khẩu mới" name="confirmpass">
                        </div>
                        <div class="form-group ">
                            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='HeThong.php'">Hủy</button>
                            <button type="submit" class="btn btn-dark">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
        <div class="col-sm-6 collapse" id="collapseExample">
        </br>
                <button type="button" class="btn btn-dark mb-3" onclick="document.location='ThemTaiKhoan.php'">Thêm Tài Khoản</button>
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>Mã</th>
                    <th>UserName</th>
                    <th>Role</th>
                    <th>Thao Tác</th>
                </tr>
                </thead>
                <tbody>
                    <?php require './xuly/xulyshowuser.php';  ?>
                </tbody>
            </table>  
        </div>
    </div>
</div>

<?php
    require './giaodien/footer.php';
  ?>


</body>
</html>
