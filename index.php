<?php
session_start();
require_once('component.php');
require_once('dbh.php');

//if (!isset($_SESSION['username'])) {
//   header("Location: index.php");
//}

if (!isset($_POST['add']))
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./resources/styles/index.css">
    <title>Welcome</title>
</head>

<body>
    <div class="navbar">
        <div class="navbar-wrapper">
            <div class="logo">
                <img src="./resources/images/LogoCompleto.PNG" alt="logo" width="10vw">
            </div>
            <div class="welcome">
                <h1 style="color:black;">Welcome back, <?php echo $_SESSION['username'] ?></h1>
            </div>
            <div class="input-group">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-dark">search</button>
            </div>
            <a href="logout.php" class="btn btn-outline-dark">Logout</a>
        </div>
    </div>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Cart</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Products on cart</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                </ul>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

    </nav>

    <div class="container">
        <div class="row text-center py-5">
            <?php
            $result = getData($conn);
            while ($row = mysqli_fetch_assoc($result)) {
                component($row['name'], $row['price'], $row['image'], $row['platform']);
            }

            ?>
        </div>
    </div>

    
</body>

</html>