<?php

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $pwd = $_POST['password'];
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputsSignUp($name, $lastname, $pwd, $pwdRepeat, $email, $country) !== false) {
        header("Location: ../signup.php?error=emptyInput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("Location: ../signup.php?error=pwdnotmatch");
        exit();
    }
    if (emailMatch($conn, $email) !== false) {
        header("Location: ../signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $name, $lastname, $pwd, $email, $country);


} else {
    header("Location: ../signup.php");
}