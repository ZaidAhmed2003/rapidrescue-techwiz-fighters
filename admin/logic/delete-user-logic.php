<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare a statement to fetch the user
    $stmt = $connection->prepare("SELECT firstname, lastname FROM users WHERE userid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Prepare a statement to delete the user
        $stmt = $connection->prepare("DELETE FROM users WHERE userid = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => "User '{$user['firstname']}' '{$user['lastname']}' deleted successfully."
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "Couldn't delete '{$user['firstname']}' '{$user['lastname']}.'"
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => "User not found."
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => "Invalid request."
    ]);
}

// Close database connection
$connection->close();
