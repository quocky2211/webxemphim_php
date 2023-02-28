<?php
    require './Admin/class/SingletonDBConnect.php';
    require './Admin/class/User.php';
    require './Admin/class/UserProxy.php';
    require './Admin/class/QueryBuilder.php';
    //Get connect from singleton
    $instance = SingletonDBConnect::getInstance();
    $con = $instance->getConnection();
    //New Login with Proxy
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);

    function clientCode(UserInterFace $UserInterFace)
    {
        $UserInterFace->Login();
    }

    $User = new User($Username,$Password);
    $Proxy = new UserProxy($User);
    clientCode($Proxy);
?>