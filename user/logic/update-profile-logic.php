
<?php
require '../config/database.php'; // Database connection


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the inputs
    $userId = $_POST['user_id'] ?? null;
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : null;
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : null;
    $phonenumber = isset($_POST['phonenumber']) ? trim($_POST['phonenumber']) : null;
    $dateOfBirth = isset($_POST['date_of_birth']) ? trim($_POST['date_of_birth']) : null;
    $address = isset($_POST['address']) ? trim($_POST['address']) : null;

    // Check if required fields are filled
    if (empty($userId) || empty($firstname) || empty($lastname) || empty($phonenumber) || empty($address)) {
        $response = ['success' => false, 'message' => 'Error: All fields are required.'];
        echo json_encode($response);
        exit();
    }

    // Prepare the SQL statement
    $stmt = $connection->prepare("UPDATE users SET firstname=?, lastname=?, phonenumber=?, date_of_birth=?, address=? , WHERE userid=?");
    $stmt->bind_param("sssssi", $firstname, $lastname, $phonenumber, $dateOfBirth, $address, $userId);

    $response = ($stmt->execute()) ? array('success' => true, 'message' => 'User updated successfully') : ['success' => false, 'message' => "Error: {$stmt->error}"];
    echo json_encode($response);

    $stmt->close();
    $connection->close();
}
