<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thêm Thể Loại</title>
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
    <h2 class="col-sm-6">Thêm Thể Loại</h2>
    <form action="./xuly/xulythemtheloai.php" method="post">
        <div class="form-group col-sm-6">
            <label for="">Tên Thể Loại:</label>
            <input type="text" class="form-control" id="" placeholder="Tên Thể Loại" name="TenTheLoai">
        </div>
        <div class="form-group col-sm-6">
            <button type="submit" class="btn btn-dark">Thêm</button>
        </div>
    </form>
   
</div>

    <?php
    require './giaodien/footer.php';
    ?>


</body>
</html>
