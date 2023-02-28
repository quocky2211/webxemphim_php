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
  <title>Sửa Tài Khoản</title>
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
  <?php
     $id = $_GET['id'];
     $show_query = "SELECT * FROM `account` WHERE MaTK = '$id'";
     $show_result = mysqli_query($con,$show_query) or die(mysqli_error($con));
     $row = mysqli_fetch_assoc($show_result);
  ?>

<div class="container" style="margin-top:30px">   
    <h2 class="col-sm-6">Sửa Tài Khoản</h2>
    <form action="./xuly/xulysuaacc.php" method="post">
        <div class="form-group col-sm-6">
            <label for="">Name:</label>
            <input type="text" required class="form-control" id="" placeholder="Name" name="Name" value="<?php echo $row['Name']; ?>">
            <input type="text" name="MaTK" value="<?php echo $id; ?>" style="display:none;">
        </div>
        <div class="form-group col-sm-6">
            <label for="">UserName:</label>
            <input type="text" required class="form-control" id="" placeholder="UserName" name="Username" value="<?php echo $row['Username']; ?>">
        </div>
        <div class="form-group col-sm-6">
            <label for="">Password:</label>
            <input type="password" required class="form-control" id="" placeholder="Password" name="Password" value="<?php echo $row['Password']; ?>" >
        </div>
        <div class="form-group col-sm-6">
            <label for="">Role:</label>
            <select name="Role" id="" >
                <option value="User" <?php if($row['Role'] == "User") echo "SELECTED";?>>User</option>
                <option value="Admin" <?php if($row['Role'] == "Admin") echo "SELECTED";?>>Admin</option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <button name="reset" type="reset" class="btn btn-danger" onclick="document.location='HeThong.php'">Hủy</button>
            <button type="submit" class="btn btn-dark">Sửa</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
