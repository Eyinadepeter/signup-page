<?php

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once "dbh.php";
    require_once "functions.php";


    if (emptyInputlogin($username, $pwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }


    loginuser($conn, $username, $pwd);
} else {
    header("location: ..signup.php");
    exit();
};
