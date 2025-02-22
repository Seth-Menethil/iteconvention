<?php

include '../connection/connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $team = isset($_POST['team']) ? $_POST['team'] : '';
    $contestant = isset($_POST['contestant']) ? $_POST['contestant'] : '';
    $school = isset($_POST['school']) ? $_POST['school'] : '';
    $competition = "Some Competition"; // If you have a predefined competition, modify accordingly

    // Validate required fields
    if (empty($contestant) || empty($school)) {
        echo "Error: Contestant name and school are required!";
        exit;
    }

    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO contestants (name, affiliation, team, competition) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $contestant, $school, $team, $competition);

    if ($stmt->execute()) {
        echo "Contestant registered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
