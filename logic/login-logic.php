<?php
require '../config/database.php'; // Ensure this file correctly sets up the $connection variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Debug: Print email and password (for testing purposes only, remove in production)
    // error_log("Email: $email, Password: $password");

    // Fetch user from the database
    $query = $connection->prepare("SELECT * FROM users WHERE email = ?");
    if (!$query) {
        echo 'Query preparation failed: ' . $connection->error;
        exit();
    }

    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Debug: Print user data (for testing purposes only, remove in production)
        // error_log(print_r($user, true));

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['userid'] = $user['userid'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] == 'admin') {
                echo 'admin'; // For AJAX success response
            } elseif ($user['role'] == 'user') {
                echo 'user';
            } elseif ($user['role'] == 'driver') {
                echo 'driver';
            }
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'User not found';
    }
}
