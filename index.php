<?php
session_start();
require_once('component.php');
require_once('dbh.php');

//if (!isset($_SESSION['username'])) {
//   header("Location: index.php");
//}

if (isset($_POST['add'])) {
    //print($_POST['product_id']);
    if(isset($_SESSION['cart'])) {

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)) {
            echo "<script>alert('Product is already in the cart');</script>";
            echo "<script>window.location='index.php'</script>";
        } else {
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
            );
            $_SESSION['cart'][$count] = $item_array;
            print_r($_SESSION['cart']);
        }

    } else {
        $item_array = array(
            'product_id' => $_POST['product_id'],
        );
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./resources/styles/index.css">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Welcome</title>
</head>

<body>
    
    <?php require_once('header.php');?>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <div class="list-group list-group-flush overflow-auto vh-100">
                <div class="sidebar-brand">
                    <h5 class="m-4">
                            <i class="fas fa-shopping-cart text-dark"></i>
                            Cart
                            <?php

                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo '<span id="cart-count" class="text-light bg-dark">' . $count . '</span>';
                            } else {
                                echo '<span id="cart-count" class="text-light bg-dark">0</span>';
                            }

                            ?>
                    </h5>
                </div>
                <?php
                        $total = 0;
                        if(isset($_SESSION['cart'])) {
                            $productId = array_column($_SESSION['cart'], 'product_id');
                            $result = getData($conn);
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach ($productId as $id) {
                                    if($row['id'] == $id) {
                                        cartElementSmall($row['name'], $row['price'], $row['image'], $row['platform'], $row['id']);
                                        $total = $total + $row['price'];
                                    }
                                }
                            }
                        } else {
                            echo '<h3>Cart is empty</h3>';
                        }
                    ?>
                <hr>
            <div class="col-md-12">
                <h2 class="px-2 m-2">
                    Total: $<?php echo $total ?>
                </h2>
            </div>
            <hr>
            <a href="cart.php" role="button"><button type="button" class="btn btn-success m-3"> Check Out</button></a>
        </div>
            
    </div>
        
        
    
    <div id="page-content-wrapper">
            <div class="container-fluid">
            <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Toggle Menu</a>
                <div class="row text-center py-5 d-flex justify-content-start">
                    
                    <?php
                        $result = getData($conn);
                        while ($row = mysqli_fetch_assoc($result)) {
                            component($row['name'], $row['price'], $row['image'], $row['platform'], $row['id']);
                        }

                    ?>
                </div>

            </div>
        </div>

        </div>

    
</body>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</html>