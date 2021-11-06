<?php

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputsSignUp($name, $lastname, $pwd, $pwdRepeat, $email, $country) !== false) {
        header("Location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("Location: ../signup.php?error=pwdnotmatch");
        exit();
    }
    if (emailMatch($conn, $username, $email) !== false) {
        header("Location: ../signup.php?error=emailtaken");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("Location: ../signup.php?error=invalidusername");
        exit();
    }

    createUser($conn, $name, $lastname, $username, $pwd, $email, $country);


} else {
    header("Location: ../signup.php");
}