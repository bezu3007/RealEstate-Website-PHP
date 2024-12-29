<?php
include "../functions/loginSession.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpEmail/PHPMailer/src/Exception.php';
require '../phpEmail/PHPMailer/src/PHPMailer.php';
require '../phpEmail/PHPMailer/src/SMTP.php';

class Order
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function placeOrder()
{
        // Shipping and Customer Details
    $fname = htmlspecialchars(stripslashes(trim($_POST['fname'])));
    $lname = htmlspecialchars(stripslashes(trim($_POST['lname'])));
    //$city = htmlspecialchars(stripslashes(trim($_POST['city'])));
    //$address = htmlspecialchars(stripslashes(trim($_POST['address'])));
    $email = htmlspecialchars(stripslashes(trim($_POST['email'])));
    //$mobile = htmlspecialchars(stripslashes(trim($_POST['mobile'])));
    $note = htmlspecialchars(stripslashes(trim($_POST['note'])));
    $totalFee = htmlspecialchars(stripslashes(trim($_POST['totalFee'])));
    $paymentMethod = htmlspecialchars(stripslashes(trim($_POST['payMethod'])));
    $numOfItems = $_SESSION['productsInCart'];
    $x=rand(1000,9999);

        $storeOrderQuery = "INSERT INTO orders(First_Name, Last_Name, Email, NumOfItems, totalFee, Payment_method, note)VALUES('$fname', '$lname', '$email', $numOfItems, '$totalFee', '$paymentMethod', '$note')";
        $ordered = mysqli_query($this->db, $storeOrderQuery);

        $idReaderQuery = mysqli_query($this->db, "SELECT ID FROM orders WHERE First_Name='$fname'");
        $idFetch = null;
        $customer = $fname . " " . $lname;
        while ($id = mysqli_fetch_assoc($idReaderQuery)) {
            $idFetch = $id;
        }

        // Details in the cart
        $orderedProducts = array();
        $quantities = array();
        $subtotals = array();
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $orderedProducts[$i] = $_SESSION['cart'][$i]['item_name'];
            $subtotals[$i] = $_SESSION['cart'][$i]['sub_total'];
            $quantities[$i] = $_SESSION['cart'][$i]['quantity'];
        }

        // Serialization of the data to insert into the database
        $orderedProducts = implode(',', $orderedProducts);
        $subtotals = implode(',', $subtotals);
        $quantities = implode(',', $quantities);
        $idFetch = implode($idFetch);

        $storeDetailsQuery = "INSERT INTO order_details(orderID, Customer, products, Quantities, subTotals) VALUES('$idFetch', '$customer', '$orderedProducts', '$quantities', '$subtotals')";
        $detail = mysqli_query($this->db, $storeDetailsQuery);

        if ($ordered && $detail) {
            // Notifying the customer that his order is submitted through email

            $recipient = $email;

            try {
                $mailer = new PHPMailer(true);
                $mailer->isSMTP();
                $mailer->Host = 'smtp.gmail.com';
                $mailer->SMTPAuth = true;
                $mailer->Username = 'python3.birhanu@gmail.com';
                $mailer->Password = 'aaamexgdgzygzgje';
                $mailer->SMTPSecure = 'ssl';
                $mailer->Port = '465';

                $mailer->setFrom('python3.birhanu@gmail.com');

                $mailer->addAddress($recipient);

                $mailer->isHTML(true);

                $mailer->Subject = 'Ordered Successfully';
                $mailer->Body = "Hello " . $fname . " " . $lname . ", <br>
                
                Your order is successfully submitted.<br> We will be getting in touch with you through a phone call.<br> Please be ready!!!
                
                You have ordered $numOfItems Items and the total fee is ETB$totalFee  <br><br>
                Payment code:  $x  <br><br>
                Payment done with $paymentMethod<br><br>
                <a href='grainmarket.infinityfreeapp.com'><button style='text-align: center; color: blue'>ARARAT REAL STATES</button></a><br>
                
                ";

                $mailer->send();
            } catch (\Exception $e) {
                echo "<script> alert('Something went wrong')</script>";
            }
            unset($_SESSION['cart']);
            ?>
            <script>
                alert('Order Placed Successfully. Wait for the email or call');
            </script>
            <?php
            header("Location: ../index.php");
        } else {
            echo "<script>
            alert('Error occurred while placing the order');
            </script>";
        }

    }
}

// Usage:
require_once "../commons/DB_connector.php";
require_once "../commons/Header.php";

$order = new Order($DB_Connector);

if (isset($_POST['order'])) {
    $order->placeOrder();
}
?>


<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Check out - Grain Mill</title>
    <!-- Style Sheet -->
    <link rel="stylesheet" type="text/css" href="../CSS/global.css"/>
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
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
                <li><a href="market.php">Market</a></li>
                <li> /</li>
                <li><a href="cart.php">Cart</a></li>
                <li> /</li>
                <li>Checkout</li>
            </ul>
        </div> <!-- End of Breadcrumb-->

        <h2>Billing Detail</h2>
            <div class="checkout-page">
                <div class="billing-detail">
                    <form class="checkout-form" action="checkout.php" method="post">
                        <h4>Shipping Detail</h4>
                        <div class="form-inline">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" id="fname" name="fname" value="<?php echo $_SESSION['user_details']['First_Name']?>" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" id="lname" name="lname" value="<?php echo $_SESSION['user_details']['Last_Name']?>" required>
                            </div>
                        </div>
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="<?php echo $_SESSION['user_details']['Email']?>" id="email" name="email" autocomplete="off" required>
                            </div>
                        </div>
                        
                        <h4>Additional Information (Optional)</h4>
                        <div class="form-group">
                            <label for="note">Order Note</label>
                            <textarea style="resize:none" id="note" name="note" rows="3"></textarea>
                        </div>
                        <div class="order-summary">
                            <div class="checkout-total">
                                <h3>Order Summary</h3>
                                <ul>
                                    <li>Number of Items: X<?php echo $_SESSION['productsInCart'];?></li>
                                    <li>Delivery Charges:1000ETB</li>
                                    <hr>
                                    <li>Total Fee:<input type="number" name="totalFee" readonly value="<?php
                                        if (isset($_GET['totalFee'])){echo floatval($_GET['totalFee'])+1000.0;}
                                        else{ echo $_SESSION['totalFee']+1000;}
                                        ?>"</li>
                                    <hr>
                                    <label>Payment Method</label>
                                    <select name="payMethod" >
                                        <option>Chapa</option>
                                        <option>E-Birr</option>
                                        <option>Tele Birr</option>
                                        <option>CBE</option>
                                    </select>
                                    <hr>
                                    <li><input type="submit" name="order" value="Place Order"></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
    </main> <!-- Main Area -->
</div>

<?php require_once "../commons/footer.php"; ?>
</body>
