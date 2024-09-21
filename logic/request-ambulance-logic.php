<?php
require '../config/database.php'; // Database connection


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $hospital_name = $_POST['hospital_name'];
    $pickup_address = $_POST['pickup_address'];
    $request_type = $_POST['request_type'];
    $additional_info = $_POST['additional_info'];

    // Generate a unique booking number
    $booking_number = 'BR-' . strtoupper(uniqid());

    // Prepare the insert statement
    $sql = "INSERT INTO emergency_request (booking_number, hospital_name, pickup_address, customer_mobile, type) 
            VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssss", $booking_number, $hospital_name, $pickup_address, $phone, $request_type);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["status" => "true", "message" => "Emergency request submitted successfully. Your booking number is: " . $booking_number]);
    } else {
        echo json_encode(["status" => "false", "message" => "Error: " . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
}

// Close connection
$connection->close();
