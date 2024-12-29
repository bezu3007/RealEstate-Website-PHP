<?php
//require_once "../admin_commons/header.php";
include "../admin/adFunctions/AdminSession.php";
include "../admin/adFunctions/DB_connector.php";
?>

<!--Update of the Price Price-->
<?php
global $DB_Connector;
if (isset($_POST['addPrice'])){
    $PriceName = htmlspecialchars(stripslashes(trim($_POST['PriceName'])));
    $retrive = "SELECT * FROM house where Name ='$PriceName'";
    $retriveQuery = mysqli_query($DB_Connector, $retrive);
    $PriceRead = mysqli_fetch_assoc($retriveQuery);
    $currentPrice = floatval($PriceRead['Price']) + floatval(htmlspecialchars(stripslashes(trim($_POST['addedPrice']))));
    $update = "UPDATE house set Price='$currentPrice' WHERE Name='$PriceName'";
    $updateQuery = mysqli_query($DB_Connector, $update);
    $currentPrice = 0;
}
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
        <h3>Price</h3>
        <div class="content-data">
            <div class="content-form">
                <form action="addStock.php" method="post">
                    <h4>Update Price</h4>
                    <div class="form-inline">
                        <div class="form-group">

                            <label>House Type</label>
                            <select name="PriceName">
                                <?php
                                global $DB_Connector;
                                include("../adFunctions/DB_connector.php");
                              /* if (isset($_GET['PriceID'])){
                                    $id = htmlspecialchars(stripslashes(trim($_GET['PriceID'])));
                                    $cat="SELECT Name FROM house WHERE ID='$id'";
                                } else {*/
                                    $cat = "SELECT Name FROM house";
                                //}
                                $result = mysqli_query($DB_Connector, $cat);
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo "<option value=".$row['Name'].">".$row['Name']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="addedPrice" min="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <input type="submit" name="addPrice" value="Add Price">
                    </div>
                </form>
            </div>
            <div class="content-detail">
                <h4>All Price Detail</h4>
                <form method="GET">
                    <label for="sort-by">Sort By:</label>
                    <select name="sort-by" id="sort-by" onchange="this.form.submit()">
                        <option value="ID">ID</option>
                        <option value="Name" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'Name') echo 'selected'; ?>>House Type</option>
                        <option value="Category" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'Category') echo 'selected'; ?>>Category</option>
                        <option value="Price" <?php if (isset($_GET['sort-by']) && $_GET['sort-by'] === 'Price') echo 'selected'; ?>>Price Amount</option>
                    </select>
                </form>
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>House Type</th>
                        <th>Category</th>
                        <th>Available at</th>
                        <th>rent</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $limit = 8;
                    $page = $_GET['page'] ?? 1;
                    $offset = ($page - 1) * $limit;
                    $sortColumn = $_GET['sort-by'] ?? 'ID';
                    $retrieve = "SELECT * FROM house ORDER BY $sortColumn LIMIT $limit OFFSET $offset";
                    $query = mysqli_query($DB_Connector, $retrieve);
                    while ($fetch = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<th>" . $fetch['ID'] . "</th>";
                        echo "<th>" . $fetch['Name'] . "</th>";
                        echo "<th>" . $fetch['Category'] . "</th>";
                        echo "<th>" . $fetch['Price'] . "</th>";
                        echo "<th>";
                        if ($fetch['rental_price'] === 0) {
                            echo "Not for rent";
                        } else {
                            echo "Available";
                        }
                        echo "</th>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>

                <?php
                $totalRecordsQuery = "SELECT COUNT(*) AS totalRecords FROM house";
                $totalRecordsResult = mysqli_query($DB_Connector, $totalRecordsQuery);
                $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['totalRecords'];
                $totalPages = ceil($totalRecords / $limit);

                if ($totalPages > 1) {
                    echo "<div class='pagination-links'>";

                    if ($page > 1) {
                        echo "<a href='?page=" . ($page - 1) . "&sort-by=$sortColumn'>Previous</a>";
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == $page) {
                            echo "<a class='active' href='?page=$i&sort-by=$sortColumn'>$i</a></li>";
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