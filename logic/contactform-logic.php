<?php
// contactform-logic.php
session_start();
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['form_name'];
    $email = $_POST['form_email'];
    $phone = $_POST['form_phone'];
    $subject = $_POST['form_subject'];
    $message = $_POST['form_message'];

    // Validate input (basic example)
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Prepare the SQL insert statement
        $stmt = $connection->prepare("INSERT INTO messages (fullname, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

        // Execute the query
        if ($stmt->execute()) {
            echo json_encode(['status' => 'true', 'message' => 'Message sent successfully!']);
        } else {
            echo json_encode(['status' => 'false', 'message' => 'Failed to send message.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['status' => 'false', 'message' => 'Please fill in all required fields.']);
    }
} else {
    echo json_encode(['status' => 'false', 'message' => 'Invalid request method.']);
}
