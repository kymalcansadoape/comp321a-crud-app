<?php 

$server = "localhost";
$username = "root";
$password = "";
$dbname = "to9_db";

$connection = mysqli_connect($server, $username, $password, $dbname);

if($connection->connect_error){
    die("connection failed" . $connection->connect_error);
}