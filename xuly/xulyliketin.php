<?php
    require '../ConnectDB/connect.php';
    require '../Admin/class/QueryBuilder.php';
    $con = ketnoi();
    session_start();

    $MaTinTuc = mysqli_real_escape_string($con,$_POST['MaTinTuc']);
    
    $query = new MysqlQueryBuilder();
    $query01 = $query   ->update("tintuc")
                        ->set("LuotThich","LuotThich + 1")
                        ->where("MaTinTuc","=",$MaTinTuc)
                        ->getSQL();
    $result01 = mysqli_query($con,$query01) or die(mysqli_error($con));

    $query02 = $query   ->select(["LuotThich"])
                        ->from(["tintuc"])
                        ->where("MaTinTuc","=",$MaTinTuc)
                        ->getSQL();
    $result02 = mysqli_query($con,$query02) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result02);
    $LikeCount = $row['LuotThich'];
    echo json_encode([1,$LikeCount]);
?>