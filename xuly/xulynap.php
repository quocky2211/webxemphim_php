<?php
    require '../Admin/class/SingletonDBConnect.php';
    require '../Admin/class/User.php';
    require '../Admin/class/PaymentTemplateMethod.php';
    require '../Admin/class/Normal.php';
    require '../Admin/class/Prenium.php';
    require '../Admin/class/Vip.php';
    require '../Admin/class/Strategy.php';
    require '../Admin/class/DiscountController.php';
    require '../Admin/class/QueryBuilder.php';

    $instance = SingletonDBConnect::getInstance();
    $con = $instance->getConnection();
    session_start();

    $masp = mysqli_real_escape_string($con,$_POST['moneybag']);
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $User = new User($username,$password);

    if($masp == 'Normal')
    {
        $Normal = new Normal($User,$masp,'Nạp');
        $Normal -> PaymentRequest($Normal);
    }
    else if($masp == 'Vip')
    {
        $Vip = new Vip($User,$masp,'Nạp');
        $Vip -> PaymentRequest($Vip);
    }
    else if($masp == 'Prenium')
    {
        $Prenium = new Prenium($User,$masp,'Nạp');
        $Prenium -> PaymentRequest($Prenium);
    }
  
    ?>
    <script>
        alert("Nạp thành công");
        location.href = '../napxu.php';
    </script>
?>