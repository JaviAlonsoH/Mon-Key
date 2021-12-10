<?php 

include 'dbh.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = ($_POST['password']);

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$pwd'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="resources/styles/login.css">

    <title>Login MonKey</title>
</head>
<body>
    <main>
        <img id="logoLogin" src="resources/images/LogoCompleto.PNG" > 
    </main>
    <aside> 
    <div class="container">
        <form action="" method="POST" class="login-email" id="formulario">
            <h1 id="titulo">Login</h1>

            <div class="input-group" >
                <input id="inputEmail" class="campos" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
            </div>

            <div class="input-group" id="divContra">
                <input id="inputContra"class="campos" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="input-group col-md-3">
                <button id="botonLog" name="submit" class="btn btn-outline-warning">Login</button>
            </div>
            <p class="login-register-text">Don't have an account? <a id="enlaceReg" href="signup.php">Register Here</a>.</p>
        </form>
    </div>
    </aside>
</body>
</html>