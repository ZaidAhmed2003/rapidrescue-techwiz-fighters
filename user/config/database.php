<?php
session_start();
require "constants.php";

if ($_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
// connect to database
$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_errno($connection)) {
    die(mysqli_error($connection));
}
