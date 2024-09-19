<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $role = $_POST['role'];  // user, driver, or admin
    $date_of_birth = $_POST['date_of_birth'] ?? null;
    $address = $_POST['address'] ?? null;

    // Check if the email already exists
    $query = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo "Email already registered";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    $stmt = $connection->prepare("
        INSERT INTO users 
        (firstname, lastname, email, phonenumber, password, date_of_birth, address, role, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("ssssssss", $firstname, $lastname, $email, $phonenumber, $hashed_password, $date_of_birth, $address, $role);

    // Execute and check if the statement was successful
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "Registration failed. Please try again.";
    }

    // Close the statement and database connection
    $stmt->close();
    $query->close();
    $connection->close();
}
