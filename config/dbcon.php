<?php

$host =  "localhost";
$username = "root";
$password = "";
$database = "dawm";

$con = mysqli_connect ($host, $username, $password, $database) ;

if(!$con) {
    die("Connection Failed: ". mysqli_connect_error(0));
}
?>