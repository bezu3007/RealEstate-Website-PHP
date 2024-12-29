<?php
session_start();
//if (!empty($_SESSION['email'] && $_SESSION['password'])){
//    header("Location: index.php");
//}

include "../adFunctions/DB_connector.php";
if (isset($_POST['admin_login'])) {
    global $DB_Connector;
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    $password = htmlspecialchars(stripslashes(trim($_POST['pword'])));
    $read = "SELECT Email,Password FROM admins";
    $admin_check = mysqli_query($DB_Connector, $read);
    $found = false;
    while ($admins=mysqli_fetch_assoc($admin_check)) {
        if ($email===$admins['Email']) {
            $found = true;
            if ($password !== $admins['Password']) {
                $InPassword = "<h2 style='color: red' align='center'> Incorrect password</h2>";
            } else {
                $_SESSION['admin_email'] = $admins['Email'];
                $_SESSION['admin_password'] = $admins['Password']; //Creating the session containing login Details
                $_SESSION['loggedIn']=true;
                header("Location: ../ip_pro/index.php");
                exit; // add this to stop execution after redirection
            }
        }
    }

    if (!$found) {
        $notAdmin =  "<h2 style='color: red' align='center'>You are not admin</h2>";
    }

}
?>
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
        <style>
        body {
            background-color: white;
        }

        .logo_img {
            width: 50px;
            margin-top: 20px;
            margin-left: 20px;
            cursor: pointer;
        }

        .login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #title {
            color: black;
            font-size: 40px;
            font-weight: bolder;
            padding-top: 100px;
            padding-bottom: 50px;
            font-family: Quicksand, Arial;
        }

        .form_item {
            color: black;
            font-size: 20px;
            padding-top: 10px;
            font-family: Quicksand, arial;
        }

        #email {
            width: 230px;
            font-size: 17px;
            color: black;
            padding: 10px 8px;
            background-color: rgb(64, 64, 64);
            border: solid;
            border-width: 1px;
            border-color: rgb(0, 94, 255);
            margin-left: 10px;
            border-radius: 4px;
        }

        #pword {
            width: 200px;
            font-size: 17px;
            color: black;
            padding: 10px 8px;
            background-color: rgb(64, 64, 64);
            border: solid;
            border-width: 1px;
            border-color: rgb(0, 94, 255);
            margin-left: 6px;
            border-radius: 4px;
        }

        #login {
            margin-top: 50px;
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 6px;
            background-color: rgb(30, 30, 30);
            border: solid;
            border-width: 1px;
            border-color: rgb(0, 94, 255);
            color: white;
            transition: background-color 0.25s, color 0.25s;
        }

        #login:hover {
            background-color: black;
            border: none;
            color: white;
        }

        .login {
            box-shadow: 0 0 10px black;
            margin: 50px 400px;
            padding-bottom: 70px;
            border-radius: 20px;
            color: white;
        }

        .password-container {
            position: relative;
        }

        #togglePasswordButton {
            position: absolute;
            top: 20px;
            right: 10px;
            transform: translateY(-50%);
            border: none;
            background: none;
            font-size: 20px;
            color: black;
            cursor: pointer;
        }
        </style>
        <script>
        function togglePasswordVisibility() {
            event.preventDefault();

            var passwordInput = document.getElementById("pword");
            var toggleButton = document.getElementById("togglePasswordButton");

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
                    <li><a href="index.php"></a></li>
                    <li><a href="about.php"></a></li>
                    <li><a href="find.php"></a></li>
                    <li><a href="contact.php"></a></li>
                </ui>
                <a href="signup.php" class="action_btn"></a>
                <div class="toggle_btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <div class="dropdown_menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="find.php">Find</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="signup.php" class="action_btn"></a></li>
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
        <div class="login">
        <div id="title">Login</div>
        <div class="form">
            <form action="login.php" method="post">
                <div class="form_item">
                    <div class="form_item">
                        <label for="email">Email: </label>
                        <input type="email" id="email" name="email" placeholder="abc@xyz" required />
                        <p id="nfemail" style="color: red; font-size:smaller"></p>
                    </div>
                    <br />
                    <div class="form_item">
                        <div class="password-container">
                            <label for="pword">Password: </label>
                            <input type="password" id="pword" name="pword" required />
                            <button id="togglePasswordButton" onclick="togglePasswordVisibility()">&#128065;</button>
                        </div>
                    </div>
                    <br />
                </div>
                <center>
                    <input type="submit" value="login" id="login" name="admin_login" />
                </center>
                <?php if(isset($InPassword)){ echo $InPassword;}
    else if (isset($notAdmin)){ echo $notAdmin;}
    ?>
            </form>
        </div>
    </div>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br><br>
        
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