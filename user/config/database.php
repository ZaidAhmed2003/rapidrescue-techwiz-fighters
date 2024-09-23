<?php
session_start();
require "constants.php";


// connect to database
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}

if ($_SESSION['role'] !== 'user') {
    header("Location:" . ROOT_URL . "login.php");
    exit();
}
