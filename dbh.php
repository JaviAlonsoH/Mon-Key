<?php
$databasename = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tienda_mon-key";

$conn = mysqli_connect($databasename, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    echo "<script>Alert('conection failled')</script>";
}

function getData($conn)
{
    $sql = "SELECT * FROM products";
    $result = mysqli_query($conn, $sql) or die("Die");

    return $result;
}
