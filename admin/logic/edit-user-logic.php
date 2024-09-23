<?php
require '../config/database.php'; // Database connection


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate inputs
    $userId = isset($_POST['user_id']) ? intval($_POST['user_id']) : null;
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $phonenumber = isset($_POST['phonenumber']) ? trim($_POST['phonenumber']) : null;
    $dateOfBirth = isset($_POST['date_of_birth']) ? trim($_POST['date_of_birth']) : null;
    $userRole = isset($_POST['role']) ? trim($_POST['role']) : "user";
    $address = isset($_POST['address']) ? trim($_POST['address']) : null;

    // Validate required fields
    if (empty($userId) || empty($firstname) || empty($lastname) || empty($email) || empty($address)) {
        $response = array('success' => false, 'message' => 'Error: All fields are required.');
        echo json_encode($response);
        exit();
    }

    // Additional validation (email format, etc.)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = array('success' => false, 'message' => 'Error: Invalid email format.');
        echo json_encode($response);
        exit();
    }

    // Prepare SQL update statement
    $stmt = $connection->prepare("UPDATE users SET firstname=?, lastname=?, email=?, phonenumber=?, date_of_birth=?, address=?, role=? WHERE userid=?");
    $stmt->bind_param("sssssssi", $firstname, $lastname, $email, $phonenumber, $dateOfBirth, $address, $userRole, $userId);

    // Execute and return response
    if ($stmt->execute()) {
        $response = array('success' => true, 'message' => 'User updated successfully');
    } else {
        $response = array('success' => false, 'message' => "Error: {$stmt->error}");
    }

    echo json_encode($response);

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
