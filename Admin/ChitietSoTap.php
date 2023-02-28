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
  <title>Chi tiết số Tập</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./design/anhtable.css"/>
  <script src="./java/delitem.js"></script>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

<div class="container" style="margin-top:30px">
    
  <div class="row">
        
    <div class=col-sm-12>
        <p class="h3">Danh Sách Tập Phim</p>
    </div>
    <div class="col-sm-12 mb-3" >
        <button class="btn btn-dark" onclick="document.location='ThemSoTap.php?id=<?php echo $_GET['id']; ?>'">Thêm Tập</button>
    </div>
    <div class=col-sm-12>  
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Mã</th>
            <th>Tập</th>
            <th>File</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
              require './xuly/xulyshowtapphim.php';
          ?>
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

