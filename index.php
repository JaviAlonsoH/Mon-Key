<?php
session_start();
require_once('component.php');
require_once('dbh.php');

//if (!isset($_SESSION['username'])) {
//   header("Location: index.php");
//}
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
    <?php echo "<h1>Welcome " . $_SESSION['username'] . "</h1>"; ?>

    <div class="container">
        <div class="row text-center py-5">
            <?php
            $result = getData($conn);
            while ($row = mysqli_fetch_assoc($result)) {
                component($row['name'], $row['price'], $row['image']);
            }

            ?>
        </div>
    </div>

    <a href="logout.php">Logout</a>
</body>

</html>