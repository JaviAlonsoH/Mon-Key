


<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="lastname" placeholder="Last Name">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="pwdRepeat" placeholder="Repeat Password">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="country" placeholder="Country">
        <button type="submit" name="submit" >Sign Up</button>
    </form>

    <?php

    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields.</p>";

        } else if ($_GET["error"] == "invalidemail") {
            echo "<p>Please use a valid email address.</p>";

        } else if ($_GET["error"] == "pwdnotmatch") {
            echo "<p>Passwords doesn't match.</p>";

        } else if ($_GET["error"] == "emailtaken") {
            echo "<p>This email is already in use.</p>";

        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Oops! something went wrong...</p>";

        } else if ($_GET["error"] == "usernametaken") {
            echo "<p>This username is already in use.</p>";
            
        } else if ($_GET["error"] == "none") {
            echo "<p>You have signed up successfully!</p>";
        }

    } 

?>

</section> 

