<?php 

include 'dbh.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];
    $country = $_POST['country'];

	if ($password == $pwdRepeat) {
		$sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
        
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (name, lastname, username, password, country, email)
					VALUES ('$name', '$lastname', '$username','$pwd', '$country', '$email');";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['pwdRepeat'] = "";
				header("Location: login.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
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
	<link rel="stylesheet" type="text/css" href="resources/styles/signup.css">

	<title>Register Form - Pure Coding</title>
</head>
<body>
	<main>
        <img id="logoLogin" src="resources/images/LogoCompleto.PNG" > 
    </main>
	<aside>
		<p class="logintext" style="font-size: 2rem; font-weight: 800;">Register</p>
		<form action="" method="POST" class="login-signup" id="formulario">
			<div class="flex-container">
            	<div class="name">
					<input class="campos" type="text" placeholder="Name" name="name" value="<?php echo $name; ?>" required>
				</div>
            	<div id="lastname">
					<input class="campos" type="text" placeholder="LastName" name="lastname" value="<?php echo $lastname; ?>" required>
				</div>
				<div id="username">
					<input class="campos" type="text" placeholder="Username" name="username" value="<?php echo 	$username; ?>" required>
				</div>
				<div id="country">
					<input class="campos" type="text" placeholder="Country" name="country" value="<?php echo $country; ?>" required>
				</div>
			</div>

			<div>
				<input id="email"class="campos" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="flex-container">
				<div class="input-group">
					<input class="campos" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            	</div>
            	<div class="input-group">
					<input class="campos" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div>
				
			</div>
			<br>
			<p class="termsConditions"><input type="checkbox" id="cbox1" value="first_checkbox"> I agree with the  <a href="login.php" id="Terms">Terms & Conditions</a></p>
			<div class="input-group col-sm-3 col-md-3 col-lg-3 d-flex justify-items-center">
				<button name="submit" class="btn btn-outline-warning">Register</button>
			</div>
			
			<div id="haveCount">
				<p id="texto">Already have an account?</p>
				<a href="login.php" class="btn btn-outline-warning" role="button">Login</a>
			</div>
		</form>
	
	</aside>
</body>
</html>