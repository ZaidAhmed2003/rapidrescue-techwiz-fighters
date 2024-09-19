<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

require "layout.php";

echo "Welcome to Admin Dashboard, " . $_SESSION['firstname'];
