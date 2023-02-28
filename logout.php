<?php
    require './ConnectDB/connect.php';
    $con = ketnoi();
    session_start();
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['active'] = 'none';
?>
<script>
    alert('Đăng xuất thành công');
    document.location = "./index.php";
</script>