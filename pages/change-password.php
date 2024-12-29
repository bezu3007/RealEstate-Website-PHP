<?php include "../functions/loginSession.php"; ?>
<?php require_once "../commons/Header.php";
    include "../commons/DB_connector.php";
?>
<?php
global $DB_Connector;
$username = $_SESSION['user_details']['username'];
$read_DB = "SELECT * from user_profile where username='$username'";
$ReadQuery = mysqli_query($DB_Connector, $read_DB);
$Account  = mysqli_fetch_assoc($ReadQuery);


if (isset($_POST['update_pass'])){
    $oldPass = trim(htmlspecialchars(stripslashes($_POST['old_password'])));
    $newPass = trim(htmlspecialchars(stripslashes($_POST['new_password'])));
    $confirmPass = trim(htmlspecialchars(stripslashes($_POST['confirm_password'])));
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; // REGEX password validation expression

    if (password_verify($oldPass, $Account['Password'])){
        $missing_requirements = array();

        // Password must contain at least one lowercase letter, one uppercase letter, one digit, and be at least 8 characters long
        if (!preg_match('/[a-z]/', $newPass)) {
            $missing_requirements[] = '<h3 style="color: red"><ul><li>a lowercase letter</li></ul></h3> ';
        }
        if (!preg_match('/[A-Z]/', $newPass)) {
            $missing_requirements[] = '<h3 style="color: red"><ul><li>an uppercase letter</li></ul></h3>';
        }
        if (!preg_match('/\d/', $newPass)) {
            $missing_requirements[] = '<h3 style="color: red"><ul><li>a digit</li></ul></h3>';
        }
        if (strlen($newPass) < 8) {
            $missing_requirements[] = '<h3 style="color: red"><ul><li>at least 8 characters </li></ul></h3>';
        }

        if ($newPass !== $confirmPass) {
            $missing_requirements[] = '<h3 style="color: red"><ul><li>Passwords do not match</li></ul></h3>';
        }

        if (empty($missing_requirements)) {
            $user =$_SESSION['user_details']['username'];
            $newPass = password_hash($newPass, PASSWORD_DEFAULT);
            $passUpdate="UPDATE user_profile set Password='$newPass' WHERE username='$user'";
            $DB_Connector->query($passUpdate);
            $message= "<h1 style='color: green'>Password Updated</h1>";
        } else {
            $message = "<h2 style='color: red ' > Your password is missing</h2>";

            if (count($missing_requirements) == 1) {
                $message .= "<h2 style='color: red'>the following requirement: </h2>";
            } else {
                $message .= "<h2 style='color: red'>the following requirements: </h2>";
            }

            $message .= implode(" ", $missing_requirements);
        }
    } else $message="<h1 style='color: red'> Wrong Password</h1>";

}
?>

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Change Password - Grain Mill</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../CSS/account.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/checkout.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css"/>
</head>
<body>


<div class="container">
    <main>
        <div class="breadcrumb">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li> /</li>
                <li><a href="account.php">Account</a></li>
                <li> /</li>
                <li>Change Password</li>
            </ul>
        </div> <!-- End of Breadcrumb-->


        <div class="account-page">
            <div class="profile">
                <div class="profile-img">
                    <img src="../<?php echo $Account['Profile_picture']?>">
                    <h2><?php echo $Account['username'];?></h2>
                    <p><?php echo $Account['Email']?></p>
                </div>
                <ul>
                    <li><a href="account.php">Account <span>></span></a></li>
                    <li><a href="orders.php">My Orders <span>></span></a></li>
                    <li><a href="change-password.php" class="active">Change Password <span>></span></a></li>
                    <li><a href="../functions/userLogout.php">Logout <span>></span></a></li>
                </ul>
            </div>
            <div class="account-detail">
                <h2>Change Password</h2>
                <div class="billing-detail">
                    <form class="checkout-form" action="change-password.php" method="post">
                        <div class="form-group">
                            <label>Old Password</label>
                            <input type="password" id="old_password" name="old_password" required>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" id="new_password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" id="confirm_password" name="confirm_password" required>
                            </div>
                        </div>
                        <?php
                        if (isset($message)) {
                            echo $message;
                        } ?>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" id="update_pass" name="update_pass" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main> <!-- Main Area -->
</div>

<?php require_once "../commons/footer.php"; ?>

</body>

not modify header information - headers already sent by (output started at C:\xampp\htdocs\ip1\commons\Header.php:155) in C:\xampp\htdocs\ip1\pages\checkout.php on line 102
Home
