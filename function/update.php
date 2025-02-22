<?php
include '../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $team = $_POST['team'];

    // Update query
    $stmt = $con->prepare("UPDATE contestants SET name = ?, team = ? WHERE id = ?");
    $stmt->bind_param("ssi", $name, $team, $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $con->close();
} else {
    echo "invalid";
}
?>
