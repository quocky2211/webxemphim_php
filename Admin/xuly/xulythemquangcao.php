<?php
    require '../connectdb/connect.php';
    $con = ketnoi();
    session_start();

    $Banner = mysqli_real_escape_string($con,$_POST['Banner']);
    $Link = mysqli_real_escape_string($con,$_POST['Link']);
    $ChiPhi = mysqli_real_escape_string($con,$_POST['ChiPhi']);
    $CongTy = mysqli_real_escape_string($con,$_POST['CongTy']);

    $insert_qc_query = "INSERT INTO `quangcao`(`Banner`, `CongTy`, `Link`, `ChiPhi`, `ThuNhap`) VALUES ('$Banner','$CongTy','$Link','$ChiPhi',DEFAULT)";
    $insert_qc_result = mysqli_query($con,$insert_qc_query) or die(mysqli_error($con));

    ?>
    <script>
        alert("Thêm thành công");
        location.href = '../QuangCao.php';
    </script>
    <?php
?>