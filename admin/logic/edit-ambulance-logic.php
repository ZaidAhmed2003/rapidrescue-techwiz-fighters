<?php
require "../config/database.php";

// Check user role
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location:" . ROOT_URL . "login.php");
    exit();
}

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize input data
    $ambulanceid = isset($_POST['id']) ? trim($_POST['id']) : null;
    $vehicle_number = isset($_POST['vehicle_number']) ? trim($_POST['vehicle_number']) : null;
    $equipment_level = isset($_POST['equipment_level']) ? trim($_POST['equipment_level']) : null;
    $capacity = isset($_POST['capacity']) ? trim($_POST['capacity']) : null;
    $location = isset($_POST['location']) ? trim($_POST['location']) : null; // default value removed
    $current_status = isset($_POST['current_status']) ? trim($_POST['current_status']) : null;

    $errors = [];

    // Validate required fields
    if (empty($ambulanceid)) {
        $errors[] = "Ambulance ID is required to update.";
    }
    if (empty($vehicle_number)) {
        $errors[] = 'Vehicle Number is required.';
    }
    if (empty($equipment_level)) {
        $errors[] = 'Equipment Level is required.';
    }
    if (empty($capacity)) {
        $errors[] = 'Capacity is required.';
    }
    if (empty($location)) {
        $errors[] = 'Location is required.';
    }
    if (empty($current_status)) {
        $errors[] = 'Current Status is required.';
    }

    // If there are validation errors, return JSON response
    if (!empty($errors)) {
        echo json_encode(['error' => true, 'message' => $errors[0]]);
        exit();
    }


    // Prepare and execute update statement
    $stmt = $connection->prepare("UPDATE ambulances SET vehicle_number = ?, equipment_level = ?, capacity = ?, location = ?, current_status = ? WHERE ambulanceid = ?");
    $stmt->bind_param("ssissi", $vehicle_number, $equipment_level, $capacity, $location, $current_status, $ambulanceid);

    if ($stmt->execute()) {
        // Prepare success response
        $response = ['success' => true, 'message' => 'Ambulance updated successfully.'];
    } else {
        // Prepare error response
        $response = ['success' => false, 'message' => 'Error: ' . $stmt->error];
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();

    // Send JSON response
    echo json_encode($response);
    exit();
}
