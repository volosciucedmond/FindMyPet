<?php
include('../DAWM/config/dbcon.php');
function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getNameActive($table, $nume)
{
    global $con;
    $query = "SELECT * FROM $table where nume='$nume' LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
    global $con;
    $query = "SELECT * FROM $table where id='$id' ";
    return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id) {
    global $con;
    $query = "SELECT * FROM products where category_id='$category_id'";
    return $query_run = mysqli_query($con, $query);
}

// function getEmailByUser($table, $id) {
//     global $con;
//     $query = "SELECT * FROM users where id='$email'";
//     return $query_run=mysqli_query($con, $query);
// }

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: ' . $url);
    exit();
}
?>