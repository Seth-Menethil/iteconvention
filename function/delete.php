<?php
include '../connection/connection.php'; // Ensure correct path

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if (!empty($id)) {
        // Prepare SQL statement to prevent SQL Injection
        $stmt = $con->prepare("DELETE FROM contestants WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "success"; // Send response back to AJAX
        } else {
            echo "error";
        }

        $stmt->close();
    }
}

$con->close();
?>
