<?php session_start();


include "../admin/adFunctions/AdminSession.php";
include "../admin/adFunctions/DB_connector.php";
?> 
<style>
    .button-link {
        display: inline-block;
        padding: 8px 16px;
        background-color: rgb(40, 112, 164);
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    .button-link:hover {
        background-color: white;
    }
    .thetable{
        border: solid black 2px;
    }
    .thet{
        border: solid black 2px;
    }

</style>
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
        <title>index</title>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo"><a href="#">ARARAT REAL ESTATES</a></div>
                <ui class="links">
                <li><a href="index.php">Home</a></li>
                    <li><a href="addStock.php">Update</a></li>
                    <li><a href="addCategory.php">Options</a></li>
                    <li><a href="addProduct.php">Add House</a></li>
                    <li><a href="users.php">Customers</a></li>
                    <li><a href="find.php">Find</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ui>
                <a href="login.php" class="action_btn">LOGOUT</a>
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

        <main>
            <section id="hero">
                <h1>WELCOME</h1>
                <p style="color:black"> <?php echo $_SESSION['username']; ?></p>
            </section>
        </main>

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
    <div>
        <table border="2" id="findbox" cellspacing="10" cellpadding="14px" height="100px" width="25%" align="center">
            <tr>
                <td font="17px"><a href="signup.php">
                        New Account
        


                    </a></td>
            </tr>
        </table>
        <br>
        <table class="main" cellspacing="10px" cellpadding="4px" align="center">
        <tr>
            <td>
                <p align="center">
                     WELCOME <?php echo $_SESSION['username']; ?>
                </p>
                <p>
                If you are searching for a home with full of tranquil and peaceful life you are in the right place. Our project lies at the beautiful city Debre Zeit.
                    It's a nearby city to Addis Ababa and also there is a different type of transportation systems; like bus, taxi, train (Addis Ababa - Diredawa) and so on.
                </p>
            </td>
        </tr>
    </table>


    <br>
   
            <!-- About Us Section -->
        
        <div class="contact">
        <h3>Messages</h3>
        </br>
            <div class="content-detail">
                <form method="GET">
                    <label for="sort-by">Sort By:</label>
        </br>
                    <select name="sort-by" id="sort-by" onchange="this.form.submit()">
                        <option value="ID">ID</option>
                        <option value="creation_time" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'creation_time') echo 'selected'; ?>>Date</option>
                        <option value="First_Name" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'First_Name') echo 'selected'; ?>>First Name</option>
                        <option value="read_status" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'read_status') echo 'selected'; ?>>read/Unread</option>
                    </select>
        </br>
                </form>
                <table class="thetable">
                    <thead class="thet">
                    <tr>
                        <th>Date</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>View</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $limit = 8;
                    $page = $_GET['page'] ?? 1;
                    $offset = ($page - 1) * $limit;
                    $sortColumn = $_GET['sort-by'] ?? 'ID';
                    $retrieve = "SELECT * FROM contact ORDER BY $sortColumn LIMIT $limit OFFSET $offset";
                    $query = mysqli_query($DB_Connector, $retrieve);
                    while ($fetch = mysqli_fetch_assoc($query)) {
                        echo "<tr>";

                        // Check the read status and apply different font colors
                        if ($fetch['read_status'] == 0) {
                            // Unread email style
                            echo "<th style='color: #000000;'>".$fetch['creation_time']."</th>";
                            echo "<th style='color: #000000;'>".$fetch['First_Name']."</th>";
                            echo "<th style='color: #000000;'>".$fetch['email']."</th>";
                            echo "<th style='color: #000000;'>".substr($fetch['message'], 0, 20)."..."."</th>";
                        } else {
                            // Read email style
                            echo "<th style='color: #808080;'>".$fetch['creation_time']."</th>";
                            echo "<th style='color: #808080;'>".$fetch['First_Name']."</th>";
                            echo "<th style='color: #808080;'>".$fetch['email']."</th>";
                            echo "<th style='color: #808080;'>".substr($fetch['message'], 0, 20)."..."."</th>";
                        }

                        echo "<th><a href='contactDetail.php?contactID=".$fetch['ID']."' class='button-link'>View</a></th>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
                </table>
                <?php
                $totalRecordsQuery = "SELECT COUNT(*) AS totalRecords FROM contact";
                $totalRecordsResult = mysqli_query($DB_Connector, $totalRecordsQuery);
                $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['totalRecords'];
                $totalPages = ceil($totalRecords / $limit);

                if ($totalPages > 1) {
                    echo "<div class='pagination-links'>";

                    if ($page > 1) {
                        echo "<a href='?page=" . ($page - 1) . "&sort-by=$sortColumn'>Previous</a>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i === $page) {
                            echo "<a class='active' href='?page=$i&sort-by=$sortColumn'>$i</a>";
                        } else {
                            echo "<a href='?page=$i&sort-by=$sortColumn'>$i</a>";
                        }
                    }

                    if ($page < $totalPages) {
                        echo "<a href='?page=" . ($page + 1) . "&sort-by=$sortColumn'>Next</a>";
                    }
                    echo "</div>";
                }
                ?>
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

<script>
    const contactForm = document.getElementById('contact-form');

function sendEmail(event) {
  event.preventDefault();

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  const subject = `New Request from ${name}`;
  const mailto = `mailto:info@realestate.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(message)}%0D%0A%0D%0AFrom: ${name} (${email})`;

  window.location.href = mailto;
}

contactForm.addEventListener('submit', sendEmail);
</script>




