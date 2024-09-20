<?php
require "admin/includes/header.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle_number = filter_var($_POST['vehicle_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $equipment_level = filter_var($_POST['equipment_level'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $capacity = filter_var($_POST['capacity'], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $current_status = filter_var($_POST['current_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $driver_id = filter_var($_POST['driver_id'], FILTER_SANITIZE_NUMBER_INT);

    require '../config/database.php';

    // Insert ambulance into the database
    $stmt = $connection->prepare("INSERT INTO ambulances (vehicle_number, equipment_level, capacity, location, current_status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $vehicle_number, $equipment_level, $capacity, $location, $current_status);

    if ($stmt->execute()) {
        $ambulanceid = $stmt->insert_id; // Get the ID of the inserted ambulance

        // Assign driver to the ambulance
        if (isset($ambulanceid) && !empty($driver_id)) {
            $stmt = $connection->prepare("UPDATE drivers SET ambulanceid = ? WHERE id = ?");
            $stmt->bind_param("ii", $ambulanceid, $driver_id);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Ambulance and driver assigned successfully.";
                header("Location: manage-ambulance.php");
                exit();
            } else {
                $_SESSION['error'] = "Failed to assign driver. Please try again.";
            }
        }
    } else {
        $_SESSION['error'] = "Failed to add ambulance. Please try again.";
    }

    $stmt->close();
    $connection->close();
}
