<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
echo "Welcome to Admin Dashboard, " . $_SESSION['firstname'];
