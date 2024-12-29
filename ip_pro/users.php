<?php
//require_once "../admin_commons/header.php";
include "../admin/adFunctions/AdminSession.php";
include "../admin/adFunctions/DB_connector.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>GM - Admin</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="../admin/css/astyle.css" />
    <link rel="stylesheet" href="style.css"/>
<!--    <link rel="stylesheet" type="text/css" href="./css/style.css" />-->
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

    <div class="main-content">
        
        <div class="content">
            <h3>Users</h3>
            <div class="content-detail">
                <form method="GET">
                    <label for="sort-by">Sort By:</label>
                    <select name="sort-by" id="sort-by" onchange="this.form.submit()">
                        <option value="ID">ID</option>
                        <option value="username" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'username') echo 'selected'; ?>>Username</option>
                        <option value="First_Name" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'First_Name') echo 'selected'; ?>>First Name</option>
                        <option value="Age" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'Age') echo 'selected'; ?>>Age</option>
                    </select>
                </form>
                <table>
                    <thead>
                    <tr>
                        <th>Username</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Password(Hashed)</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $limit = 8;
                    $page = $_GET['page'] ?? 1;
                    $offset = ($page - 1) * $limit;
                    $sortColumn = $_GET['sort-by'] ?? 'ID';
                    $retrieve = "SELECT * FROM user_profile ORDER BY $sortColumn LIMIT $limit OFFSET $offset";
                    $query = mysqli_query($DB_Connector, $retrieve);
                    while ($fetch = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<th>" . $fetch['username'] . "</th>";
                        echo "<th>" . $fetch['First_Name'] . "</th>";
                        echo "<th>" . $fetch['Last_Name'] . "</th>";
                        echo "<th>" . $fetch['Age'] . "</th>";
                        echo "<th>" . $fetch['Email'] . "</th>";
                        echo "<th>" . substr($fetch['Password'], 0, 10) . "...</th>";
                        echo "<th>" . $fetch['phone_Number'] . "</th>";
                        echo "<th>" . $fetch['city'] . "</th>";
                        echo "<th>" . $fetch['address'] . "</th>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <!-- Pagination Links -->
                <?php
                $totalRecordsQuery = "SELECT COUNT(*) AS totalRecords FROM user_profile";
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
    </div>
</main> <!-- Main Area -->
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