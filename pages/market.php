<?php require_once "../commons/Header.php";
      include "../commons/DB_connector.php";
?>
<style>
button{
    display:flex;
    margin: 2px;
    padding: 2px;
    background:whitesmoke;
    height: 24px;
    
}
    </style>
<!--Page limiter-->
<?php
$items_per_page = 6; // Change this to the number of items you want to display per page
$current_page =$_GET['page']  ?? 1;

$offset = ($current_page - 1) * $items_per_page;

?>


<?php
global $DB_Connector;
$total_items = mysqli_num_rows(mysqli_query($DB_Connector, "SELECT * FROM house"));

$total_pages = ceil($total_items / $items_per_page);

if ($current_page > $total_pages) {
    $current_page = $total_pages;
}

if ($current_page < 1) {
    $current_page = 1;
}

$prev_page = $current_page - 1;
$next_page = $current_page + 1;
?>


<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>REAL STATES</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
    <link rel="stylesheet" type="text/css" href="../CSS/market.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css"/>
</head>
<body>
<div class="container">
    <main>
        <div class="breadcrumb">
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li> /</li>
                <li>Market</li>
            </ul>
        </div> <!-- End of Breadcrumb-->

        <div class="new-product-section shop">
            <div class="sidebar">
                <br>
                <div class="sidebar-widget">
                    <h3>Options</h3>
                    <ul>
                        <button><a href="market.php">All</a></button>
                        <?php
                        global $DB_Connector;
                        $catSelector = "SELECT * FROM categories";
                        $catQuery = mysqli_query($DB_Connector, $catSelector);
                        while ($categories = mysqli_fetch_assoc($catQuery)){ ?>
                        <button><a href="market.php?category=<?php echo $categories['cat_name']?>"><?php echo $categories['cat_name']?> </a></button>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="product-content">
<!--                php code to select all house and display to the market-->
                <?php
                global $DB_Connector;

                $proSelector = "SELECT * FROM house LIMIT $items_per_page OFFSET $offset";
                if (isset($_GET['category'])) {
                    $category = htmlspecialchars(stripslashes(trim($_GET['category'])));
                    $proSelector = "SELECT * FROM house WHERE Category='$category' LIMIT $items_per_page OFFSET $offset";
                    if (isset($_GET['search'])) {
                        $search = htmlspecialchars(stripslashes(trim($_GET['search'])));
                        $proSelector = "SELECT * FROM house WHERE Category='$category' AND Name LIKE '%$search%' LIMIT $items_per_page OFFSET $offset";
                    }
                }
                if (isset($_GET['search'])){
                    $search = htmlspecialchars(stripslashes(trim($_GET['search'])));
                    $proSelector = "SELECT * FROM house WHERE Name LIKE '%$search%' OR Category LIKE '%search%' LIMIT $items_per_page OFFSET $offset";
                }
                $Query = mysqli_query($DB_Connector, $proSelector);

                $counter = 0;
                ?>
                <?php while ($proShow = mysqli_fetch_assoc($Query)){
                    $counter++;
                    ?>
                <div class="product">
                    <a href="../functions/productDetails.php?pro_detail_id=<?php echo $proShow['ID'] ?>">
                        <img src="../admin/<?php echo $proShow['Picture']?>" alt="<?php echo $proShow['Name']?>"/>
                    </a>
                    <div class="product-detail">
                        <a href="../functions/productDetails.php?pro_detail_id=<?php echo $proShow['ID'] ?>"></br><h3><?php echo $proShow['Name']?></h3></a>
                        <h2><?php echo $proShow['Category'];
                                  echo "</br>"?></h2>
                                  </br>
                        <h6><?php echo $proShow['Price']?> ETB/sq</h6><br>
                        <a name="add_to_cart" onclick="location.href='../functions/addToCart.php?cart_id=<?php echo $proShow['ID']?>&cart_name=<?php echo $proShow['Name'];?>&cart_price=<?php echo $proShow['Price'];?>&cart_photo=<?php echo $proShow['Picture'] ?>'">Pick</a>
                    </div>
                </div>
                <?php }
                if (isset($_GET['category']) && $counter ===0){
                    echo "<h1 style='color: red'>NO house found for this category!</h1>";
                } else if (isset($_GET['search']) && $counter ===0){
                    echo "<h1 style='color: red'>NO results for the keyword ".htmlspecialchars(stripslashes(trim($_GET['search'])))."!</h1>";
                } else if ($counter === 0){
                    echo "<h1 style='color: red'>Sorry,  No house found!</h1>";
                }
                ?>
                <button><a href="../pages/cart.php">Payment</a></button>

            </div>
        </div> <!-- New Product Section -->
        <div class="pagination" style="float: left">
            <?php if ($current_page > 1) { ?>
                <a href="?page=<?php echo $prev_page; ?>">Previous</a>
            <?php } ?>

            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <?php if ($i == $current_page) { ?>
                    <span><?php echo $i; ?></span>
                <?php } else { ?>
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php } ?>
            <?php } ?>

            <?php if ($current_page < $total_pages) { ?>
                <a href="?page=<?php echo $next_page; ?>">Next</a>
            <?php } ?>
        </div>
    </main> <!-- Main Area -->
</div>

<?php require_once "../commons/footer.php"; ?>

</body>
