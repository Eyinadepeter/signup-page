<?php

$servername = "localhost";
$dBUsername = "peter";
$dBPassword = "peter";
$dBName = "signup_project";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}


// try {
//     $conn = new PDO("mysql:host=$servername;dBName=myDB", $dBUsername, $dBPassword);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "connected successfully";
// } catch (PDOException $e) {
//     echo "conection failed; " . $e->getMessage();
// }
