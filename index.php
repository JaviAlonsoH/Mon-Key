<?php
    include_once 'dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon-Key</title>
</head>
<body>

<?php
    $sql = "SELECT * FROM USER;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['name'];
        }
    }
?>

<ul>
    <?php
    $sql = "SELECT * FROM PRODUCTS;";
    $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row['name'] . $row['price'] . "<br>" . "</li>";
    }
}
?>

</ul>
<img src="resources/images/LogoMon-Key.jpg">


</body>
</html>