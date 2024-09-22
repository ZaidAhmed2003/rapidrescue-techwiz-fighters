<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare a statement to fetch the user
    $stmt = $connection->prepare("SELECT requestid FROM emergency_requests WHERE requestid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $request = $result->fetch_assoc();

        // Prepare a statement to delete the user
        $stmt = $connection->prepare("DELETE FROM emergency_requests WHERE requestid = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode([
                'status' => 'success',
                'message' => "Request For '{$request['type']}' deleted successfully."
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "Couldn't delete '{$request['type']}.'"
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => "Request not found."
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
