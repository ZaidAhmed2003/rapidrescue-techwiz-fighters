<?php
session_start();
require "../config/database.php";

if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize input data
    $ambulanceid = $_POST['id'];
    $vehicle_number = filter_var($_POST['vehicle_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $equipment_level = filter_var($_POST['equipment_level'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $capacity = filter_var($_POST['capacity'], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $current_status = filter_var($_POST['current_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);



    // Validate required fields
    if (empty($ambulanceid)) {
        echo "Ambulance ID is required to update.";
        exit();
    }

    // Begin a transaction
    $connection->begin_transaction();

    try {
        // Update ambulance details
        $stmt = $connection->prepare("UPDATE ambulances SET vehicle_number = ?, equipment_level = ?, capacity = ?, location = ?, current_status = ? WHERE ambulanceid = ?");
        $stmt->bind_param("ssissi", $vehicle_number, $equipment_level, $capacity, $location, $current_status, $ambulanceid);

        if (!$stmt->execute()) {
            throw new Exception("Failed to update ambulance.");
        }

        // Commit the transaction
        $connection->commit();
        header('location:' . ROOT_URL . "admin/manage-ambulance.php");
        die();
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $connection->rollback();
        echo "Error: " . $e->getMessage();
    }

    // Close statement and connection
    $stmt->close();
    $connection->close();
}
