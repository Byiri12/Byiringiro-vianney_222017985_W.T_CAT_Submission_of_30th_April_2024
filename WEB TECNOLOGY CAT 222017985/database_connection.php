<?php
// Connection details
$host = "localhost";
$user = "vianney";
$pass = "222017985";
$database = "garage_management";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Checking connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
