<?php

require_once 'signup.inc.php';

function emptyInputsSignUp($name, $lastname, $username, $pwd, $email, $country) {

    $result = false;
    if (empty($name) || empty($lastname) || empty($username) || empty($pwd) || empty($email) || empty($country)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;

}

function invalidUsername($username) {

    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;

}

function invalidEmail($email) {

    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;

}

function pwdMatch($pwd, $pwdRepeat) {

    $result = false;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;

    
}

function uidExists($conn, $username, $email){
    $sql = 'select * from user where username = ? or email = ?;';
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
        header(('location: ../singup.php?error=stmtfailed'));
        exit();
    }
}

function emailMatch($conn, $username, $email) {

    $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {

        return $row; 

    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $lastname, $username, $pwd, $email, $country) {

    $sql = "INSERT INTO user (name, lastname, username, password, email, country) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $name, $lastname, $username, $hashedPwd, $email, $country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../signup.php?error=none");
    exit();
    }

    function emptyInputsLogin($username, $pwd) {

        $result = false;
        if (empty($username) || empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pwd){
        $uidExists = uidExists($conn, $username, $username);

        if($uidExists === false){
            header('location: ../login.php?error=wronglogin');
            exit();
        }
        
        $hashedPwd = $uidExists['password'];
        $checkPwd = password_verify($pwd, $hashedPwd);

        if ($checkPwd === false) {
         header('location: ../login.php?error=wronglogin');
            exit();

        }else if($checkPwd === true){
            session_start();
            $_SESSION['userid'] = $uidExists['id'];
            $_SESSION['username'] = $uidExists['username'];
            header('location: ../index.php');
            exit();
        }
    }


