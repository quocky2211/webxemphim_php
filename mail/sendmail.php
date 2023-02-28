<?php   
    /*require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aiwebmail9@gmail.com';                     //SMTP username
        $mail->Password   = 'ddut nowp nryp yksh';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('aiwebmail9@gmail.com', 'Mailer');

        $mail->addAddress('rokota98@gmail.com');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('aiwebmail9@gmail.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Test Mail';
        $mail->Body    = 'Content test mail <b>6 Num!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }*/
?>

<?php
    require '../ConnectDB/connect.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    $con = ketnoi();
    $address = $_POST['Email'];
    $username = $_POST['Username'];
    
    $sql = "SELECT * FROM `account` WHERE `Username` = '$username'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($result) > 0)
    {
        $sql01 = "UPDATE `account` SET `Password`='123456' WHERE `Username`= '$username'";
        $result01 = mysqli_query($con,$sql01) or die(mysqli_error($con));
        //Create a new PHPMailer instance
        $mail = new PHPMailer();
        
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        
        //Enable SMTP debugging
        //SMTP::DEBUG_OFF = off (for production use)
        //SMTP::DEBUG_CLIENT = client messages
        //SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        //Use `$mail->Host = gethostbyname('smtp.gmail.com');`
        //if your network does not support SMTP over IPv6,
        //though this may cause issues with TLS
        
        //Set the SMTP port number:
        // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
        // - 587 for SMTP+STARTTLS
        $mail->Port = 465;
        
        //Set the encryption mechanism to use:
        // - SMTPS (implicit TLS on port 465) or
        // - STARTTLS (explicit TLS on port 587)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'aiwebmail9@gmail.com';
        
        //Password to use for SMTP authentication
        $mail->Password = 'ddut nowp nryp yksh';
        
        //Set who the message is to be sent from
        //Note that with gmail you can only use your account address (same as `Username`)
        //or predefined aliases that you have configured within your account.
        //Do not use user-submitted addresses in here
        $mail->setFrom('aiwebmail9@gmail.com', 'Mailer');
        
        //Set an alternative reply-to address
        //This is a good place to put user-submitted addresses
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        
        //Set who the message is to be sent to
        $mail->addAddress($address);
        $mail->addCC('aiwebmail9@gmail.com');
        
        //Set the subject line
        $mail->Subject = 'Password Reset From TTKMovie';
        
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->Body = 'New Password is 123456 Please change your password for more secure';
    
        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';
        
        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');
        
        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            ?>
            <script>
                alert("Reset Password thành công");
                location.href = '../login.php';
            </script>
            <?php
            //echo 'Message sent!';
        } 
    }
    else
    {
        ?>
        <script>
            alert("Sai Username");
            location.href = '../ResetPassword.php';
        </script>
        <?php
    }
      
?>