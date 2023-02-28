<?php
    require './Admin/class/SingletonDBConnect.php';
    require './Admin/class/User.php';
    require './Admin/class/PaymentTemplateMethod.php';
    require './Admin/class/Normal.php';
    require './Admin/class/Prenium.php';
    require './Admin/class/Vip.php';
    require './Admin/class/Strategy.php';
    require './Admin/class/DiscountController.php';
    require './Admin/class/QueryBuilder.php';
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn thanh toán</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style type="text/css">
        body
        {
            background:#f2f2f2;
        }

        .payment
        {
            border:1px solid #f2f2f2;
            height:280px;
            border-radius:20px;
            background:#fff;
        }
        .payment_header
        {
            background:rgba(255,102,0,1);
            padding:20px;
            border-radius:20px 20px 0px 0px;
            
        }
    
        .check
        {
            margin:0px auto;
            width:50px;
            height:50px;
            border-radius:100%;
            background:#fff;
            text-align:center;
        }
        
        .check i
        {
            vertical-align:middle;
            line-height:50px;
            font-size:30px;
        }

        .content 
        {
            text-align:center;
        }

        .content  h1
        {
            font-size:25px;
            padding-top:25px;
        }

        .content a
        {
            width:200px;
            height:35px;
            color:#fff;
            border-radius:30px;
            padding:5px 10px;
            background:rgba(255,102,0,1);
            transition:all ease-in-out 0.3s;
        }

        .content a:hover
        {
            text-decoration:none;
            background:#000;
        }
    
    </style>
</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto mt-5">
            <div class="payment">
                <div class="payment_header">
                <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                </div>
                <div class="content">
                <h1>Nạp thành công !</h1>
                <p>Cảm ơn quý khách đã quan tâm đến TTKMovie!</p>
                <a href="index.php">Go to Home</a>
                </div>         
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<?php
    if(isset($_GET['partnerCode']))
    {
        $amount = $_GET['amount'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $User = new User($username,$password);

        if($amount == 20000)
        {
            $Normal = new Normal($User,$amount,'Nạp');
            $Normal -> PaymentRequest($Normal);
        }
        else if($amount == 50000)
        {
            $Vip = new Vip($User,$amount,'Nạp');
            $Vip -> PaymentRequest($Vip);
        }
        else if($amount == 100000)
        {
            $Prenium = new Prenium($User,$amount,'Nạp');
            $Prenium -> PaymentRequest($Prenium);
        }
    }
?>