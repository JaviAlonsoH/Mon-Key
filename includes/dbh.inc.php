<?php
$databasename = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tienda_Mon-Key";

$conn = mysqli_connect($databasename, $dbUsername, $dbPassword, $dbName);
?>

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); 
}