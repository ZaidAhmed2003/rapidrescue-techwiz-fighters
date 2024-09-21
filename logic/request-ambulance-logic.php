<?php
require '../config/database.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $ambulanceid = $_POST['ambulanceid'];
    $hospital_name = $_POST['hospital_name'];
    $pickup_address = $_POST['pickup_address'];
    $customer_mobile = $_POST['customer_mobile'];
    $type = $_POST['type'];

    // Generate a unique booking number
    $booking_number = 'BR-' . strtoupper(uniqid());

    // Prepare the insert statement
    $sql = "INSERT INTO emergency_requests (booking_number, ambulanceid, hospital_name, pickup_address, customer_mobile, type) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissss", $booking_number, $ambulanceid, $hospital_name, $pickup_address, $customer_mobile, $type);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Emergency request submitted successfully. Your booking number is: " . $booking_number;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
