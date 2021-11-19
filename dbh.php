<?php
$databasename = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tienda_Mon-Key";

$conn = mysqli_connect($databasename, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    echo "<script>Alert('conection failled')</script>";
}
?>