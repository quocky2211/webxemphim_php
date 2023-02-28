<?php
    require '../ConnectDB/connect.php';
    require '../Admin/class/QueryBuilder.php';
    $con = ketnoi();
    session_start();

    $MaPhim = mysqli_real_escape_string($con,$_POST['MaPhim']);
    $MaTK = mysqli_real_escape_string($con,$_POST['MaTK']);

    $find_query = "SELECT * FROM `yeuthich` WHERE `MaTK` = '$MaTK' AND `MaPhim` = '$MaPhim'";
    $find_result = mysqli_query($con,$find_query) or die(mysqli_error($con));
    $num = mysqli_num_rows($find_result);
    if($num > 0)
    {
        echo json_encode(0);
    }
    else
    {
        $sql = "INSERT INTO `yeuthich`(`MaPhim`, `MaTK`) VALUES ('$MaPhim','$MaTK')";
        $result = mysqli_query($con,$sql) or die(mysqli_error($con));
        
        $query = new MysqlQueryBuilder();
        $query02 = $query   ->update("phim")
                            ->set("LuotLike","LuotLike + 1")
                            ->where("MaPhim","=",$MaPhim)
                            ->getSQL();
        $result01 = mysqli_query($con,$query02) or die(mysqli_error($con));
        echo json_encode(1);
    }
?>