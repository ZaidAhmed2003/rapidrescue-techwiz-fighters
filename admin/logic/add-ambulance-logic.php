<?php
require "../config/database.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle_number = filter_var($_POST['vehicle_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $equipment_level = filter_var($_POST['equipment_level'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $capacity = filter_var($_POST['capacity'], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $current_status = filter_var($_POST['current_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $driverid = filter_var($_POST['driverid'], filter: FILTER_SANITIZE_NUMBER_INT);

    // Validate required fields
    if (empty($vehicle_number) || empty($equipment_level) || empty($capacity) || empty($location) || empty($current_status)) {
        echo "Please fill in all required fields.";
        exit();
    }

    // Prepare a statement with a parameterized query
    $stmt = $connection->prepare("INSERT INTO ambulances (vehicle_number, equipment_level, capacity, location, current_status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $vehicle_number, $equipment_level, $capacity, $location, $current_status);

    // Execute the prepared statement
    if ($stmt->execute()) {
        $ambulanceid = $stmt->insert_id; // Get the ID of the inserted ambulance

        // Assign driver to the ambulance
        if (isset($ambulanceid) && !empty($driverid)) {
            $stmt = $connection->prepare("UPDATE drivers SET ambulanceid = ? WHERE driverid = ?");
            $stmt->bind_param("ii", $ambulanceid, $driverid);

            if ($stmt->execute()) {
                echo "Ambulance and driver assigned successfully.";
                exit();
            } else {
                echo "Failed to assign driver. Please try again.";
            }
        }
    } else {
        echo "Failed to add ambulance. Please try again.";
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $connection->close();
}
