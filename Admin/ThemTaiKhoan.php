<?php
    require './connectdb/connect.php';
    $con = ketnoi();
    session_start();
    $_SESSION['username'] == "";
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
  <title>Thêm Tài Khoản</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

<div class="container" style="margin-top:30px">   
    <h2 class="col-sm-6">Thêm Tài Khoản</h2>
    <form action="./xuly/xulythemacc.php" method="post">
        <div class="form-group col-sm-6">
            <label for="">Name:</label>
            <input type="text" class="form-control" id="" placeholder="Name" name="Name">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Username:</label>
            <input type="text" class="form-control" id="" placeholder="Username" name="Username">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Password:</label>
            <input type="text" class="form-control" id="" placeholder="Password" name="Password">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Role:</label>
            <select name="Role" id="" >
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='HeThong.php'">Hủy</button>
            <button type="submit" class="btn btn-dark">Thêm</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
