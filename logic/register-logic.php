<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and retrieve POST data
    $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phonenumber = filter_var(trim($_POST['phonenumber']), FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $role = $_POST['role'] ?? 'user';  // Default role to 'user' if not provided
    $date_of_birth = !empty($_POST['dob']) ? filter_var(trim($_POST['dob']), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null; // Optional
    $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Basic Validation
    $errors = [];

    if (empty($firstname)) {
        $errors[] = 'First name is required.';
    }
    if (empty($lastname)) {
        $errors[] = 'Last name is required.';
    }

    // Validate email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'A valid email address is required.';
    }

    // Validate phone number
    if (empty($phonenumber)) {
        $errors[] = 'A valid phone number is required.';
    }

    if (empty($password)) {
        $errors[] = 'Password is required.';
    }

    if (empty($address)) {
        $errors[] = 'Address is required.';
    }

    // If there are validation errors, display them and exit
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        exit();
    }

    // Check if the email already exists
    $query = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo "Email is already registered.";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $stmt = $connection->prepare("
        INSERT INTO users 
        (firstname, lastname, email, phonenumber, password, date_of_birth, address, role, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("ssssssss", $firstname, $lastname, $email, $phonenumber, $hashed_password, $date_of_birth, $address, $role);

    // Execute the query and check for success
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed. Please try again.";
    }

    // Close the statement and connection
    $stmt->close();
    $query->close();
    $connection->close();
}
