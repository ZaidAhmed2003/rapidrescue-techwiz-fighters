<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare a statement with a parameterized query
    $stmt = $connection->prepare("DELETE FROM ambulances WHERE ambulanceid = ?");
    $stmt->bind_param("i", $id);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => "Ambulance deleted successfully."
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => "Couldn't delete ambulance."
        ]);
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $connection->close();
} else {
    echo json_encode([
        'status' => 'error',
        'message' => "Invalid request."
    ]);
}
