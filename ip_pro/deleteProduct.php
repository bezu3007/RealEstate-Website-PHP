
    <?php
    include "DB_connector.php";
    global $DB_Connector;
    $del_ID = htmlspecialchars(stripslashes(trim($_GET['del_id'])));
    $del = "DELETE FROM house WHERE ID='$del_ID'";
    $deleter = mysqli_query($DB_Connector, $del);

    if ($deleter){
        header("Location: ../ip_pro/addProduct.php");
    } else echo "<script>alert('unable to Delete')</script>";
    ?>