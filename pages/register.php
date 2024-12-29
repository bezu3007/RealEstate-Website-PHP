<!doctype html>
<html lang="en">
<?php
require_once "../commons/DB_connector.php";

class RegistrationForm
{
    private $userName;
    private $firstName;
    private $lastName;
    private $age;
    private $email;
    private $password;
    private $confirmPassword;
    private $emailPattern;
    private $passwordPattern;
    private $dbConnector;
    public $ErrorMessage = null;

    public function __construct($dbConnector)
    {
        $this->emailPattern = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
        $this->passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/";
        $this->dbConnector = $dbConnector;
    }

    public function writeToDB(): void
    {
        $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user_profile(username, First_Name, Last_Name, Age, Email, Password)";
        $query .= " VALUES ('$this->userName', '$this->firstName', '$this->lastName', '$this->age', '$this->email', '$hashedPassword')";
        $result = $this->dbConnector->query($query);
        if (!$result) {
            die('Query Failed' . $this->dbConnector->error);
        }
        header("Location: login.php");
    }

    public function findUserName(): bool
    {
        $read = "SELECT * FROM user_profile";
        $userCheck = $this->dbConnector->query($read);
        $userNameExists = false;
        while ($users = $userCheck->fetch_assoc()) {
            if ($users['username'] === $this->userName) {
                $userNameExists = true;
                break;
            }
        }
        return $userNameExists;
    }

    public function validateForm()
    {
        global $ErrorMessage;
        if (empty($this->userName)) {
            $this->ErrorMessage = "<h3 style='color: red' align='center'>User name cannot be empty</h3>";
        } elseif (strlen($this->userName) > 15) {
            $this->ErrorMessage = "<h3 style='color: red'>User name cannot be longer than 15 characters</h3>";
        } elseif (empty($this->age)) {
            $this->ErrorMessage = "<h3 style='color: red'>Age is required</h3>";
        } elseif (empty($this->firstName) || empty($this->lastName)) {
            $this->ErrorMessage = "<h3 style='color: red'>First Name and Last name are required";
        } elseif (!preg_match($this->emailPattern, $this->email)) {
            $this->ErrorMessage = "<h3 style='color: red'>Invalid email, Please check your email again</h3>";
        } elseif (empty($this->password)) {
            $this->ErrorMessage = "<h3 style='color: red'>Password cannot be empty</h3>";
        } elseif (!preg_match($this->passwordPattern, $this->password)) {
            $missingRequirements = [];

            // Password must contain at least one lowercase letter, one uppercase letter, one digit, and be at least 8 characters long
            if (!preg_match('/[a-z]/', $this->password)) {
                $missingRequirements[] = '<h3 style="color: red"><ul><li>a lowercase letter</li></ul></h3> ';
            }
            if (!preg_match('/[A-Z]/', $this->password)) {
                $missingRequirements[] = '<h3 style="color: red"><ul><li>an uppercase letter</li></ul></h3>';
            }
            if (!preg_match('/\d/', $this->password)) {
                $missingRequirements[] = '<h3 style="color: red"><ul><li>a digit</li></ul></h3>';
            }
            if (strlen($this->password) < 8) {
                $missingRequirements[] = '<h3 style="color: red"><ul><li>at least 8 characters</li></ul></h3>';
            }

            if ($this->password !== $this->confirmPassword) {
                $missingRequirements[] = '<h3 style="color: red"><ul><li>Passwords do not match</li></ul></h3>';
            }

            if (empty($missingRequirements)) {
                if ($this->findUserName()) {
                    echo "<h4 style='color: red'> User name is already taken</h4>";
                } else {
                    $this->writeToDB();
                }
            } else {
                $this->ErrorMessage = "<h2 style='color: red'> Your password is missing the following requirement(S)</h2>";
                $this->ErrorMessage .= implode(" ", $missingRequirements);
            }
        }
    }

    public function processForm(): void
    {
        if (isset($_POST['Register'])) {
            $this->userName = htmlspecialchars(stripslashes(trim($_POST['username'])));
            $this->age = htmlspecialchars(stripslashes(trim($_POST['age'])));
            $this->firstName = htmlspecialchars(stripslashes(trim($_POST['f_name'])));
            $this->lastName = htmlspecialchars(stripslashes(trim($_POST['l_name'])));
            $this->email = htmlspecialchars(stripslashes(trim($_POST['email'])));
            $this->password = $_POST["password"];
            $this->confirmPassword = htmlspecialchars(stripslashes(trim($_POST['confirm_password'])));

            $this->validateForm();
        }
    }
}

$dbConnector = include "../commons/DB_connector.php";
$registrationForm = new RegistrationForm($dbConnector);
$registrationForm->processForm();
?>

<?php require_once "../commons/Header.php"; ?>

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Register - ARARAT REAL STATES</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../CSS/checkout.css">
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css"/>
</head>

<body>
<div class="container">
    <main style="width: 100%;">
        <div class="account-detail">
            <div class="billing-detail">
                <form class="checkout-form" action="register.php" method="post" name="form1">
                    <h2 class="title" align="center">Create - Account</h2>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="f_name" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="l_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="username">User Name (Required)</label>
                            <input type="text" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="age">Age (Required)</label>
                            <input type="number" id="age" name="age" min="18">
                        </div>
                    </div>
                    <div class="form-inline">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-inline">
                        <div class="form-group">
                            <label>Password ()</label>
                            <input type="password" id="password" name="password"
                                   placeholder="password ">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password (Required)</label>
                            <input type="password" id="confirm_password" name="confirm_password"
                                   placeholder="Repeat your Password">
                        </div>
                    </div>
                    <?php
                    if (isset($registrationForm->ErrorMessage)){
                        echo $registrationForm->ErrorMessage;
                    }
                    ?>
                    <div class="form-group">
                        <label for="register"></label>
                        <input type="submit" id="register" name="Register" value="REGISTER" size="15">
                    </div>
                </form>
                <div style="padding-top: 20px;">
                    Already Have an Account? <a href="login.php"> Login</a>
                </div>
            </div>
        </div>
    </main> <!-- Main Area -->
</div>

<?php require_once "../commons/footer.php"; ?>
</body>


</html>
