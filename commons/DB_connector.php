<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "data_b";

$DB_Connector = new mysqli($host, $username, $password, $database);
if ($DB_Connector->connect_error) {
    die("Connection failed: " . $DB_Connector->connect_error);
}

return $DB_Connector;
?>
