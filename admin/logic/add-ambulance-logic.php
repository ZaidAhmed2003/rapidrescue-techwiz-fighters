<?php
require "../config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $vehicle_number = filter_var($_POST['vehicle_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $equipment_level = filter_var($_POST['equipment_level'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $capacity = filter_var($_POST['capacity'], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $current_status = filter_var($_POST['current_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $driverid = filter_var($_POST['driverid'], filter: FILTER_SANITIZE_NUMBER_INT);

    $errors = [];

    if (empty($vehicle_number)) {
        $errors[] = 'Vehicle Number is required.';
    }
    if (empty($equipment_level)) {
        $errors[] = 'Equipment Level is required.';
    }

    // Validate email
    if (empty($capacity)) {
        $errors[] = 'Capacity is required.';
    }

    // Validate phone number
    if (empty($location)) {
        $errors[] = 'Location is required.';
    }

    if (empty($current_status)) {
        $errors[] = 'Current Status is required.';
    }


    // Prepare a statement with a parameterized query
    $stmt = $connection->prepare("INSERT INTO ambulances (vehicle_number, equipment_level, capacity, location, current_status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $vehicle_number, $equipment_level, $capacity, $location, $current_status);

    // Execute the prepared statement

    if ($stmt->execute()) {
        echo json_encode(['error' => false, 'message' => 'Ambulance added successfully.']);
    } else {
        echo json_encode(['error' => true, 'message' => 'Failed to add ambulance. Please try again.']);
    }


    // Close the statement and connection
    $stmt->close();
    $connection->close();
}
