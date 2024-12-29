<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
        <link rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />
        <link rel="stylesheet" href="style.css"/>
        <title>login</title>
        <script>
        function togglePasswordVisibility1() {
            event.preventDefault();

            var passwordInput = document.getElementById("cpword");
            var toggleButton = document.getElementById("togglePasswordButton1");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = "&#128064;";
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = "&#128065;";
            }
        }

        function togglePasswordVisibility2() {
            event.preventDefault();

            var passwordInput = document.getElementById("pword");
            var toggleButton = document.getElementById("togglePasswordButton2");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleButton.innerHTML = "&#128064;";
            } else {
                passwordInput.type = "password";
                toggleButton.innerHTML = "&#128065;";
            }
        }
    </script>
        
    </head>
    <body>
    <header>
            <div class="navbar">
                <div class="logo"><a href="#">ARARAT REAL ESTATES</a></div>
                <ui class="links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="find.php">Find</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ui>
                <a href="signup.php" class="action_btn">Get Started</a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <div class="dropdown_menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="find.php">Find</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="signup.php" class="action_btn">Get Started</a></li>
            </div>
            <script>
                const toggleBtn=document.querySelector('.toggle_btn')
                const toggleBtnIcon=document.querySelector('.toggle_btn i')
                const dropDownMenu=document.querySelector('.dropdown_menu')
    
                toggleBtn.onclick = function (){
                    dropDownMenu.classList.toggle('open')
                    const isOpen = dropDownMenu.classList.contains('open')
    
                    toggleBtnIcon.classList = isOpen
                    ? 'fa-solid fa-xmark'
                    : 'fa-solid fa-bars'
                }
            </script>
        </header>
        <br><br>
        <div align="center">
            <h1>If you already have account please <a href="login.php" id="a_link">login</a></h1>
        </div>
        <table class="signup">
            <tr>
                <td>
                    <div >
                        <div id="title">Sign Up</div>
                        <div id="error"></div>
                        <div class="form">
                            <form action="signup.php" method="post" id="form">
                                <div class="form_item">
                                    <label for="name">Name: </label>
                                    <input type="text" name="FirstName" id="name" class="name" placeholder="First Name" required />
                                    <input type="text" name="LastName" id="name" class="name" placeholder="Last Name" required; />
                                    <p id="error_name" style="color: red; font-size:smaller"></p>
                                </div>
                                <br />
                                <div class="form_item">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email" name="email" placeholder="abc@xyz" required />
                                    <p id="error_email" style="color: red; font-size:smaller"></p>
                                </div>
                                <br />
                                <div class="form_item">
                                    <label for="address">Address: </label>
                                    <input type="text" id="email" name="address" placeholder="4KILO"/>
                                    
                                </div>
                                <div class="form_item">
                                    <label for="phone_number">Username: </label>
                                    <input type="text" id="email" name="username" placeholder="" required/>
                                    
                                </div>
                                <div class="form_item">
                                    <div class="password-container">
                                        <label for="pword">Password: </label>
                                        <input type="password" id="pword" name="pword" required />
                                        <button id="togglePasswordButton2" onclick="togglePasswordVisibility2()">&#128065;</button>
                                        <p id="error_pass" style="color: red; font-size:smaller"></p>
                                    </div>
                                </div>
                                <br />
                                <div class="form_item">
                                    <div class="password-container">
                                        <label for="cpword">Confirm Password: </label>
                                        <input type="password" id="pword" name="cpword" required />
                                        <button id="togglePasswordButton1" onclick="togglePasswordVisibility1()">&#128065;</button>
                                        <p id="error_pass" style="color: red; font-size:smaller"></p>
                                        <p id="error_passcomp" style="color: red; font-size:smaller"></p>

                                    </div>
                                </div>
                                <center>
                                    <input type="submit" id="signup" value="Sign Up" name="sign_up">
                                </center>
                            </form>
                    </div>
                </td>
            </tr>
            <tr>
                <p>
                    <br><br><br>
                </p>
            </tr>
        </table>
        <footer>
            <table class="footer">
                <tr>
                    <td>
                        <p>ARARAT REAL ESTATES&copy;2023.All rights reserved.</p>
                    </td>
                </tr>
            </table>
        </footer>
    </body>
</html>

<?php
require 'connect.php';
/*
if (isset($_POST['signup'])) {

    include 'validator.php';
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $email = $_POST['email'];
    $adr= $_POST['address'];
    $pno= $_POST['phone_number'];
    $pass = $_POST['pword'];
    $pass2 = $_POST['cpword'];

    $flag_fname = validateName($fname);
    $flag_lname = validateName($lname);
    $flag_email = validateEmail($email);
    $flag_pass = validatePass($pass);
    $flag_comp = passCompare($pass, $pass2);

    if ($flag_fname && $flag_lname && $flag_email && $flag_pass && $flag_comp == true) {
        
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        $sql =  "INSERT INTO customer_info(F_Name,L_Name, E-mail,Phone_no,Address,password) VALUES ('$fname','$lname', '$pno', '$adr','$email', '$hashedPass')";

        if (mysqli_query($conn, $sql)) {
            echo "Your subscription has been added successfully";

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $hashedPass;

            echo '<script>window.location.href = "find.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }*/
    if(isset($_POST["sign_up"])){
       // include 'validate.php';

        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $email = $_POST['email'];
        $pno= $_POST['username'];
        $adr= $_POST['address'];
        $pass = $_POST['pword'];
        $pass2= $_POST['cpword'];

        function validateName($name)
{
    $name = trim($name);
    $name = htmlspecialchars($name);
        return $name;
   
}
function passcompare($pass,$pass2){
    if($pass==$pass2){
        return true;
    }
    else{
        return false;
    }
}
function validatePass($password)
{
    if (strlen($password) < 8) {
        echo "
        <script>
        document.getElementById(\"error_pass\").innerHTML=(\"*password must be 8 characters or more\");
        </script>
        ";
        return false;
    } else if (strlen($password) > 32) {
        echo "
        <script>
        document.getElementById(\"error_pass\").innerHTML=(\"*password must be 32 characters or less\");
        </script>
        ";
        return false;
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).*$/', $password)) {
        if (!preg_match('/[a-z]/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one lower case letter\");
            </script>
            ";
        }
        if (!preg_match('/[A-Z]/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one upper case letter\");
            </script>
            ";
        }
        if (!preg_match('/\d/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one digit\");
            </script>
            ";
        }
        if (!preg_match('/[\W_]/', $password)) {
            echo "
            <script>
            document.getElementById(\"error_pass\").innerHTML=(\"*your password must contain atleast one special character\");
            </script>
            ";
        }

        return false;
    } else return true;
}

        $flag_fname = validateName($fname);
        $flag_lname = validateName($lname);
        $flag_email = validateName($email);
        $flag_pno = validateName($pno);
        $flag_pass = validatePass($pass);
        $flag_comp = passCompare($pass, $pass2);

        if ($flag_fname && $flag_lname && $flag_email && $flag_pno && $flag_pass && $flag_comp == true) {
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $query= "INSERT INTO admins(username, First_Name, Last_Name, Email, Password) VALUES('$pno','$fname','$lname', '$email', '$hashedPass')";
        $sign=mysqli_query($conn, $query);
        if($sign){
                $_SESSION['username']=$flag_pno;
                $_SESSION['admin_email'] = $flag_email;
                $_SESSION['admin_password'] = $flag_pass; //Creating the session containing login Details
                $_SESSION['loggedIn']=true;
                redirect(" ../ip_pro/index.php");
                exit; // add this to stop execution after redirection
            
        }
        else{
            echo "unsucessful";
        }
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $hashedPass;

        }

}