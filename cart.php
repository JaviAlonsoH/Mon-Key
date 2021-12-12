<?php

session_start();

require_once('component.php');
require_once('dbh.php');

$url = $_SERVER["REQUEST_URI"];
$pos = strrpos($url, "index.php");
$posCart = strrpos($url, "cart.php");

if (isset($_POST['remove'])) {
    if($_GET['action'] == 'remove') {
        foreach($_SESSION['cart'] as $key => $value) {
            if($value['product_id'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                if($pos != false) {
                    echo '<script>window.location = index.php</script>';
                } else {
                    echo '<script>window.location = cart.php</script>';
                }
                
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./resources/styles/index.css">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Cart</title>
</head>
<body class="bg-light">

    <?php require_once('header.php'); ?>

    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7 ">
                <div class="shopping-cart">
                    <h3>My Cart</h3>
                    <hr>
                    <?php
                        $total = 0;
                        if(isset($_SESSION['cart'])) {
                            $productId = array_column($_SESSION['cart'], 'product_id');
                            $result = getData($conn);
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach ($productId as $id) {
                                    if($row['id'] == $id) {
                                        cartElement($row['name'], $row['price'], $row['image'], $row['id']);
                                        $total = $total + $row['price'];
                                    }
                                }
                            }
                        } else {
                            echo '<h3>Cart is empty</h3>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h2>Price Details</h2>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                
                                if(isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo '<h6>Price (' . $count . ' items)</h6>';
                                } else {
                                    echo '<h6>Price (0 items) </h6>';
                                }
                            ?>
                            <h6>Taxes</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h4>$<?php echo $total ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>