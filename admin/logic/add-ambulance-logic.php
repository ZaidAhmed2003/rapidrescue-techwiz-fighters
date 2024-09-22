<?php
require "../config/database.php";

// Function to generate random GPS coordinates within a 20 km radius
function generateRandomCoordinates($centerLatitude, $centerLongitude, $radiusInKm = 20)
{
    // Convert radius from kilometers to degrees
    $radiusInDegrees = $radiusInKm / 111.32; // 1 degree latitude is approximately 111.32 km

    // Generate random latitude and longitude offsets
    $randomLat = ($radiusInDegrees * (mt_rand() / mt_getrandmax())) - ($radiusInDegrees / 2);
    $randomLng = ($radiusInDegrees * (mt_rand() / mt_getrandmax())) - ($radiusInDegrees / 2);

    // Calculate new latitude and longitude
    $latitude = $centerLatitude + $randomLat;
    $longitude = $centerLongitude + $randomLng;

    return [
        'latitude' => $latitude,
        'longitude' => $longitude
    ];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $vehicle_number = filter_var($_POST['vehicle_number'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $equipment_level = filter_var($_POST['equipment_level'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $capacity = filter_var($_POST['capacity'], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $current_status = filter_var($_POST['current_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $errors = [];

    // Validate required fields
    if (empty($vehicle_number)) {
        $errors[] = 'Vehicle Number is required.';
    }
    if (empty($equipment_level)) {
        $errors[] = 'Equipment Level is required.';
    }
    if (empty($capacity)) {
        $errors[] = 'Capacity is required.';
    }
    if (empty($location)) {
        $errors[] = 'Location is required.';
    }
    if (empty($current_status)) {
        $errors[] = 'Current Status is required.';
    }

    // If there are validation errors, return JSON response
    if (!empty($errors)) {
        echo json_encode(['error' => true, 'message' => $errors[0]]);
        exit();
    }

    // Check if the vehicle number already exists
    $query = $connection->prepare("SELECT * FROM ambulances WHERE vehicle_number = ?");
    $query->bind_param("s", $vehicle_number);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['error' => true, 'message' => 'Ambulance already added.']);
        $query->close(); // Close the query
        exit();
    }

    // Define the center point for random GPS coordinates (example: Los Angeles)
    $centerLatitude = 34.0522;  // Replace with your desired center latitude
    $centerLongitude = -118.2437; // Replace with your desired center longitude

    // Generate random GPS coordinates within a 20 km radius
    $coordinates = generateRandomCoordinates($centerLatitude, $centerLongitude);
    $gps_coordinates = $coordinates['latitude'] . ',' . $coordinates['longitude'];

    // Prepare a statement with a parameterized query
    if ($stmt = $connection->prepare("INSERT INTO ambulances (vehicle_number, equipment_level, capacity, location, current_status, gps_coordinates) VALUES (?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("ssisss", $vehicle_number, $equipment_level, $capacity, $location, $current_status, $gps_coordinates);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo json_encode(['error' => false, 'message' => 'Ambulance added successfully with GPS coordinates.']);
        } else {
            // SQL Error
            echo json_encode(['error' => true, 'message' => "Failed to add ambulance. SQL Error: {$stmt->error}"]);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Statement preparation error
        echo json_encode(['error' => true, 'message' => "Failed to prepare SQL statement: {$connection->error}"]);
    }

    // Close the query and database connection
    $query->close();
    $connection->close();
}
