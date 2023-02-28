<?php
    require '../ConnectDB/connect.php';
    require '../Admin/class/QueryBuilder.php';
    $con = ketnoi();
    session_start();

    $MaTinTuc = mysqli_real_escape_string($con,$_POST['MaTinTuc']);

    $query = new MysqlQueryBuilder();
    $query01 = $query   ->update("tintuc")
                        ->set("LuotXem","LuotXem + 1")
                        ->where("MaTinTuc","=",$MaTinTuc)
                        ->getSQL();
    $result = mysqli_query($con,$query01) or die(mysqli_error($con));

    echo json_encode(1);
?>