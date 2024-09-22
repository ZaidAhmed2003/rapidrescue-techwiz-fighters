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
    $userid = $_POST['userid'];
    $hospital = $_POST['hospital'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];
    $type = $_POST['type'] ?? 'non-emergency';

    $errors = [];

    // Validate required fields
    if (empty($hospital)) {
        $errors[] = 'Hospital Name is required.';
    }
    if (empty($address)) {
        $errors[] = 'Address is required.';
    }
    if (empty($phonenumber)) {
        $errors[] = 'Phone Number is required.';
    }
    if (empty($type)) {
        $errors[] = 'Plz Select Emeergency Type.';
    }

    // If there are validation errors, return JSON response
    if (!empty($errors)) {
        echo json_encode(['error' => true, 'message' => $errors[0]]);
        exit();
    }

    // Define the center point for random GPS coordinates (example: Los Angeles)
    $centerLatitude = 34.0522;  // Replace with your desired center latitude
    $centerLongitude = -118.2437; // Replace with your desired center longitude

    // Generate random GPS coordinates within a 20 km radius
    $coordinates = generateRandomCoordinates($centerLatitude, $centerLongitude);
    $gps_coordinates = $coordinates['latitude'] . ',' . $coordinates['longitude'];

    // Prepare a statement with a parameterized query
    if ($stmt = $connection->prepare("INSERT INTO emergency_requests (userid, hospital_name, pickup_address, customer_mobile, type, gps_coordinates) VALUES (?, ?, ?, ?, ?, ?)")) {
        $stmt->bind_param("isssss", $userid, $hospital, $address, $phonenumber, $type, $gps_coordinates);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo json_encode(['error' => false, 'message' => 'Emergency Request has ben sent']);
        } else {
            // SQL Error
            echo json_encode(['error' => true, 'message' => "Failed to add request. SQL Error: {$stmt->error}"]);
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
