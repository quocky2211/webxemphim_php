<?php
    require '../ConnectDB/connect.php';
    $con = ketnoi();
    session_start();

    $MaPhim = mysqli_real_escape_string($con,$_POST['MaPhim']);
    $MaTK = mysqli_real_escape_string($con,$_POST['MaTK']);
    $Cmt = mysqli_real_escape_string($con,$_POST['Cmt']);

    $sql = "INSERT INTO `binhluan`(`ThongTinBL`, `MaPhim`, `MaTK`) VALUES ('$Cmt','$MaPhim','$MaTK')";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    
    echo json_encode(1);
?>