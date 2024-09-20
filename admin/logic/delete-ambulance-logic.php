<?php
require '../config/database.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

    // Fetch ambulance to get vehicle number
    $query = "SELECT vehicle_number FROM ambulances WHERE ambulanceid = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $ambulance = mysqli_fetch_assoc($result);

        // Delete ambulance from Database
        $deleteAmbulanceQuery = "DELETE FROM ambulances WHERE ambulanceid = '$id'";
        $deleteAmbulanceResult = mysqli_query($connection, $deleteAmbulanceQuery);

        if ($deleteAmbulanceResult) {
            echo json_encode([
                'status' => 'success',
                'message' => "Ambulance '{$ambulance['vehicle_number']}' deleted successfully."
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => "Couldn't delete '{$ambulance['vehicle_number']}'."
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => "Ambulance not found."
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
