<?php
    require '../ConnectDB/connect.php';
    require '../Admin/class/QueryBuilder.php';
    $con = ketnoi();
    session_start();

    $MaPhim = mysqli_real_escape_string($con,$_POST['MaPhim']);

    $query = new MysqlQueryBuilder();
    $query01 = $query   ->update("phim")
                        ->set("LuotView","LuotView + 1")
                        ->where("MaPhim","=",$MaPhim)
                        ->getSQL();
    $result = mysqli_query($con,$query01) or die(mysqli_error($con));

    echo json_encode(1);
?>