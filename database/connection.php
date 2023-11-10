<?php
$localhost = "localhost";
$user = "u685566035_hospital";
$pass = "Hospital123456789";
$database = "u685566035_hospital";

$con = mysqli_connect($localhost, $user, $pass, $database);
if(!$con){
    echo "Failed to connect";
    die();
}