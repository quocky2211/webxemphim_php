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
  <title>Phim</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="./design/anhtable.css"/>
  <script src="./java/delitem.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

  <?php
    require './giaodien/navi_bar.php';
  ?>

<div class="container" style="margin-top:30px">
    
  <div class="row">
        
        <div class=col-sm-12>
            <p class="h3">Danh Sách Phim</p>
        </div>
        <div class="col-sm-12 mb-3" >
            <button class="btn btn-dark" onclick="document.location='ThemPhim.php'">Thêm Phim</button>
        </div>
        <div class="col-sm-12 input-group mb-3">
          <input id="Search-txt" type="text" class="form-control" placeholder="Nhập Tên Phim">
          <div class="input-group-append">
            <button class="btn btn-success" type="submit">Tìm Kiếm</button>  
          </div>
        </div>
    <div class=col-sm-12>  
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Mã</th>
            <th class="book-col-2">Ảnh </th>
            <th>Tên Phim</th>
            <th>Thể Loại </th>
            <th>Số Tập Phim</th>
            <th>Lượt Xem</th>
            <th>Lượt Thích</th>
            <th>Giá</th>
            <th>Thao Tác</th>
          </tr>
        </thead>
        <tbody id="ttbody">
          <?php 
              require './xuly/xulyshowphim.php';  
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
<script>
    $(document).ready(function(){
      $("#Search-txt").keyup(function(){
          var search = $("#Search-txt").val();
          var DropdownResult = $(this).siblings("#ttbody");
          var Place = "Phim";
          if(search != "") 
          {
              $.get("./xuly/search.php",{TuKhoa: search, Place: Place}).done(function(ReturnData){ 
                  document.getElementById("ttbody").innerHTML = ReturnData;                 
              });
          }
          else
          {
            $.get("./xuly/search.php",{TuKhoa: "", Place: Place}).done(function(ReturnData){ 
                  document.getElementById("ttbody").innerHTML = ReturnData;                 
              });
          }
      })
  })
</script>
</html>
