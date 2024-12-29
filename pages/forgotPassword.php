<?php
include "../commons/DB_connector.php";
require_once "../commons/Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<style>

    .register-button {
        display: inline-block;
        padding: 12px 24px;
        background-color: #4CAF50;
        color: white;
        text-align: center;
        font-size: 18px;
        border-radius: 4px;
        text-decoration: none;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.25);
    }

    .register-button:hover {
        background-color: #3e8e41;
        cursor: pointer;
    }
    .register-label {
        display: block;
        margin-bottom: 16px;
        font-size: 20px;
        color: #555;
    }
</style>
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpEmail/PHPMailer/src/Exception.php';
require '../phpEmail/PHPMailer/src/PHPMailer.php';
require '../phpEmail/PHPMailer/src/SMTP.php';
if (isset($_POST['resetPassword'])){
    $mailer= new PHPMailer(true);
    $recipient = htmlspecialchars(stripslashes(trim($_POST['resetEmail'])));
    $code = rand(100000,999999);
    global $DB_Connector;

    $readUser = "SELECT Email, ID FROM user_profile";
    $readUserQuery = $DB_Connector->query($readUser);
    $notRegistered ="<h1 style='color: red' class='register-label'> You are not Registered</h1>";
    while ($findEmail = mysqli_fetch_assoc($readUserQuery)){
        if ($recipient == $findEmail['Email']){
            $notRegistered= null;
            if (session_status() === PHP_SESSION_NONE) {
                @session_start();
            }
            $_SESSION['f_ID']=$findEmail['ID'];
        }
    }

    if ($notRegistered ==null) {

//Writing the generated code into database
        $write="UPDATE user_profile set Verification_code='$code' WHERE Email='$recipient'";
        $DB_Connector->query($write);

        $read = "SELECT * FROM user_profile WHERE Email='$recipient'";
        $readQuery = $DB_Connector->query($read);
        $row = mysqli_fetch_assoc($readQuery);
        $FirstName = $row['First_Name'];
        $LastName = $row['Last_Name'];

        try {

            $mailer->isSMTP();
            $mailer->Host = 'smtp.gmail.com';
            $mailer->SMTPAuth = true;
            $mailer->Username = 'python3.birhanu@gmail.com';
            $mailer->Password = 'aaamexgdgzygzgje';
            $mailer->SMTPSecure = 'ssl';
            $mailer->Port = '465';

            $mailer->setFrom('python3.birhanu@gmail.com');

            $mailer->addAddress($recipient);

            $mailer->isHTML(true);

            $mailer->Subject = 'RESET PASSWORD';
            $mailer->Body = "<p> Hello " . $FirstName . " " . $LastName . "<br> You request a password reset.<br> Your verification code is<br><br><h1 style='color: red;'> $code </h1><br> If you didn't request a password reset IGNORE this message</p>";

            $mailer->send();
            header("Location: verifyCode.php");
        } catch (\Exception $ex){
            echo "<script> alert('Something Went wrong, check your connection')</script>";
        }
    }

}
?>


<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>REAL STATE</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../CSS/checkout.css">
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css"/>
</head>
<body>
<div class="container" align="center">
    <main style="width: 50%; text-align: center">
        <h2 class="title">Forgot Password</h2>
        <div class="account-detail">
            <div class="billing-detail">
                <?php
                if (isset($notRegistered)){
                    echo $notRegistered.PHP_EOL;
                    echo "<a class='register-button' href='register.php'>Register</a>";
                }
                ?>
                <form class="checkout-form" action="forgotPassword.php" method="post">
                    <div class="form-group">
                        <label for="email" align="left">Enter your email</label>
                        <input type="email" id="email" name="resetEmail" required>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="submit" id="login" name="resetPassword" value="RESET">
                    </div>
                </form>
            </div>
        </div>
    </main> <!-- Main Area -->
</div>


</body>
<?php require_once "../commons/footer.php";?>
</html>