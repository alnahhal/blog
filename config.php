<?php

$servername = "localhost";
$username = "alnahhal";
$password = "123456";
$dbname = "blog";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
