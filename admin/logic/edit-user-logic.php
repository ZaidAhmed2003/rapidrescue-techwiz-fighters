<?php
session_start();
require '../config/database.php'; // Database connection

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

// Validate the inputs
$userId = isset($_POST['user_id']) ? $_POST['user_id'] : null;
$firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
$lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$phonenumber = isset($_POST['phonenumber']) ? trim($_POST['phonenumber']) : null;

// Check if required fields are filled
// if (empty($userId) || empty($firstname) || empty($lastname) || empty($email)) {
//     echo "Error: All fields are required.";
//     exit();
// }

// Prepare the SQL statement
$stmt = $connection->prepare("UPDATE users SET firstname=?, lastname=?, email=?, phonenumber=? WHERE userid=?");
$stmt->bind_param("ssssi", $firstname, $lastname, $email, $phonenumber, $userId);

if ($stmt->execute()) {
    echo "User updated successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$connection->close();
