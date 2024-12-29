<?php
$server = 'localhost:3325';
$user = 'root';
$password = '';
$db_name = 'data_b';

$conn = mysqli_connect($server, $user, $password, $db_name);

if (!$conn) {
    die("couldn't connect to server: " . mysqli_connect_error());
}

?>