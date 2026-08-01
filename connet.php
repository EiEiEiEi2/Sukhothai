<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$sdb = "sukhotthi";

$conn = mysqli_connect(
    hostname: $servername,
    username: $username,
    password: $password,
    database: $sdb
);
if(!$conn) {
    die("Connection Failed".mysqli_connect_error());
}
?>