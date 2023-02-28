<?php
    require '../ConnectDB/connect.php';

    $con = ketnoi();
    session_start();
    $MaPhim = $_POST['MaPhim'];  
    $SoTienThanhToan = $_POST['SoXu']; 
    $NgayThanhToan = date("d/m/Y");
    $MaTK = $_SESSION['id'];

    $sql01 = "SELECT * FROM `account` WHERE `MaTK` = '$MaTK'";
    $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
    $row = mysqli_fetch_assoc($result01);
    $XuHienCo = $row['XuKhoa'];

    if($XuHienCo >= $SoTienThanhToan)
    {
        $sql02 = "INSERT INTO `thanhtoan`(`NgayThanhToan`,`SoTienThanhToan`,`TrangThai`) VALUES ('$NgayThanhToan','$SoTienThanhToan',DEFAULT)";
        $result02 = mysqli_query($con,$sql02) or die(mysqli_error($con));

        $sql03 = "SELECT MAX(MaThanhToan) FROM `thanhtoan`";
        $result03 = mysqli_query($con,$sql03) or die(mysqli_error($con));
        $row03 = mysqli_fetch_assoc($result03);
        $MaThanhToan = $row03['MAX(MaThanhToan)'];

        $sql04 = "INSERT INTO `chitietthanhtoan`(`MaThanhToan`, `MaTK`, `MaPhim`) VALUES ('$MaThanhToan','$MaTK','$MaPhim')";
        $result04 = mysqli_query($con,$sql04) or die(mysqli_error($con));

        $XuMoi = $XuHienCo - $SoTienThanhToan;
        $sql05 = "UPDATE `account` SET `XuKhoa`='$XuMoi' WHERE `MaTK` = '$MaTK'";
        $result05 = mysqli_query($con,$sql05) or die(mysqli_error($con));

        echo json_encode(1);
    }
    else
    {
        echo json_encode(0);
    }

   //echo json_encode([$MaPhim,$SoTienThanhToan,$NgayThanhToan,$MaTK,$XuHienCo]);
?>