<!DOCTYPE html>
<html lang="en">
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
        <title>contact</title>
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
        </header>

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
            function validate() {
                let name = document.forms["message"]["name"].value;
                let regExp = /[^a-zA-Z]/g;
                if (regExp.test(name)) {
                    alert("Please enter your name correctly.");
                    return false;
                }
                let subject = document.forms["message"]["subject"].value;
                if (subject.length > 20) {
                    alert("Please fill in a short and precise subject.");
                    return false;
                }
                let message = document.forms["message"]["textarea"].value;
                if (message.length < 25) {
                    alert("Please fill in enough information.");
                    return false;
                }
            }
        </script>
        <div class="contact">
        <br><br>
        <div>
            <h3 align="center">FIND YOUR NEW HOME FROM</h3> 
            <h1 align="center">ARARAT REAL ESTATES</h1>
            <br><br>
            <p id="p_cont">If you have any questions you can contact us with the following adresses</p>
        </div>
        <br>
        <div>
            <p class="infos">ADDRESS:</p>
                <p>Debre Zeit</p>
                <p>Ethiopia</p>
        </div>
        <br>
        <div>
            <p class="infos">PHONES:</p>
                <p>+251 90 101 0101</p>
                <p>+251 90 202 0202</p>
        </div>
        <br>
        <div>
            <p class="infos">E-MAIL: <a href="info@arartrealestates.com" id="a_link">info@arartrealestates.com</a></p>
            
        <br><br><br>
        
        <br><br><br>
        <br><br><br>
        <br><br><br>
        <br><br>
        </div>
        </div>
        
    <footer>
        <table class="footer">
            <tr>
                <td>
                    <p>ARARAT REAL ESTATES&copy;2023.All rights reserved.</p>
                </td>
            </tr>
        </table>
    </footer>