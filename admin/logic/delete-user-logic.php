<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch ambulance to get vehicle number
    $query = "SELECT firstname FROM users WHERE userid = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Delete ambulance from Database
        $deleteUserQuery = "DELETE FROM users WHERE userid = '$id'";
        $deleteUserResult = mysqli_query($connection, $deleteUserQuery);

        if ($deleteUserResult) {
            echo json_encode([
                'status' => 'success',
                'message' => "User '{$user['firstname']}' deleted successfully."
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "Couldn't delete '{$user['firstname']}'."
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
mysqli_close($connection);
