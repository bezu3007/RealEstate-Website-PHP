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
        <title>about</title>
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
        </script>
    <div class="image">
        <img class="image_img" src="https://lh4.googleusercontent.com/Hl3kVfxsCV4sL5wALnDzidey8YfpmqDMLM8xH_frqdpjqV-tazI5Q_2Fl7w9DVgFRJqiMkwfeyJ2lcsj8LG--9L8wH-_5zJJYvpoi-RM3ddIHr3wBrRIFAyze42N4V_gQICrEX7c" alt="about-us" />
        <div class="image_overlay">
            <div class="image_title">About us</div>
            <p class="image_desc">The building will construct by high quality construction material which made by our team in our country with latest and amenities that spell class.
                Your new home sweet home will have a beautiful flooring, doors, windows, walling and ceiling which reflects ethiopianism.</p>
        </div>
    </div>
    <div class="image">
        <img class="image_img" src="https://waterpartnership.org.au//wp-content/uploads/2017/02/howtotakethe.jpg" alt="water and supply" />
        <div class="image_overlay">
            <div class="image_title">Water and Power Supply System</div>
            <p class="image_desc">
                Considering that water supply and power supply in Debre Zeit are unstable, internal water and power supply systems are specially set in house, namely, 
                well and power generation equipment are self-equipped to guarantee 24/7 power supply to enhance your life quality in an all-round way.
            </p>
        </div>
    </div>
    <div class="image">
        <img class="image_img" src="https://www.greatschools.org/gk/wp-content/uploads/2014/03/The-school-visit-what-to-look-for-what-to-ask-1.jpg" alt="school" />
        <div class="image_overlay">
            <div class="image_title">Schooling</div>
            <p class="image_desc">
                The best and leading schools in town a walking distance from our Compound.
                For both kindergarten, elementary and secondary school.
            </p>
        </div>
    </div>
    <div class="image">
        <img class="image_img" src="https://www.securityworldmarket.com/Renderers/showmedia.ashx?id=MediaArchive:d10538fa-12c1-4bb8-8398-3e6936fb55d1" alt="Security" />
        <div class="image_overlay">
            <div class="image_title">Security</div>
            <p class="image_desc">The thing that makes our project special from other real estate project is our security. 
                There will be 24/7security from entrance to the complex, CCTV cameras, alert security guards everywhere. 
                There will be an exit door in case of emergency.
            </p>
        </div>
    </div>
    
    <div class="image">
        <img class="image_img" src="https://t3.ftcdn.net/jpg/04/82/46/38/360_F_482463891_uJuzvYactOunswRlNdWlh1PZi5vQXRId.jpg" />
        <div class="image_overlay">
            <div class="image_title">First-AID and Hospitality</div>
            <p class="image_desc">
                We have doctors incase of emergency in our compound.<br>
                The leading private hospitals are a walking distance from our compound;furthermore we have Shopping and restaurants, 
                fresh corners and bakery in nearby.
            </p>
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
    </body>
</html>