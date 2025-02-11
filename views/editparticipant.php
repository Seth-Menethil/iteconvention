<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You are logged Out! Please log in Again");</script>';
    echo '<script>window.location.href = "./index.php";</script>';
    exit;
}

// Check if participant_id is provided in the URL
if (isset($_GET['participant_id'])) {
    $participant_id = mysqli_real_escape_string($con, $_GET['participant_id']);

    // Fetch participant details based on participant_id
    $query = "SELECT * FROM participant WHERE participant_id = '$participant_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $participant = mysqli_fetch_assoc($result);
    } else {
        // Participant not found
        echo '<script>alert("Participant not found");</script>';
        echo '<script>window.location.href = "./viewparticipants.php";</script>';
        exit;
    }
} else {
    // participant_id not provided
    echo '<script>alert("Invalid request");</script>';
    echo '<script>window.location.href = "./viewparticipants.php";</script>';
    exit;
}

// Handle form submission for updating participant details
if (isset($_POST['update_participant'])) {
    // Retrieve updated data from the form
    $updatedName = mysqli_real_escape_string($con, $_POST['updated_name']);
    $updatedEmail = mysqli_real_escape_string($con, $_POST['updated_email']);
    $updatedPhone = mysqli_real_escape_string($con, $_POST['updated_phone']);
    $updatedBranch = mysqli_real_escape_string($con, $_POST['updated_occupation']);
    $updatedCollege = mysqli_real_escape_string($con, $_POST['updated_college']); // Added college field
    // ... (update other fields as needed)

    // Update the participant details in the database
    $update_query = "UPDATE participant SET 
                     name = '$updatedName', 
                     email = '$updatedEmail',
                     phone = '$updatedPhone',
                     branch = '$updatedBranch',
                     college = '$updatedCollege' 
                     WHERE participant_id = '$participant_id'";
                     
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Participant details updated successfully
        echo '<script>alert("Participant details updated successfully");</script>';
        echo '<script>window.location.href = "./viewparticipants.php";</script>';
        exit;
    } else {
        // Failed to update participant details
        echo '<script>alert("Failed to update participant details");</script>';
    }
}
?>

<!-- HTML for editparticipant.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Participant</title>
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h2 class="display-6">Edit Participant</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="updated_name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="updated_name" name="updated_name"
                            value="<?php echo $participant['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="updated_email" name="updated_email"
                            value="<?php echo $participant['email']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="updated_email" class="form-label">Contact:</label>
                        <input type="number" class="form-control" id="updated_phone" name="updated_phone"
                            value="<?php echo $participant['phone']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="updated_email" class="form-label">Occupation:</label>
                        <input type="text" class="form-control" id="updated_occupation" name="updated_occupation"
                            value="<?php echo $participant['branch']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="updated_college" class="form-label">College:</label>
                        <input type="text" class="form-control" id="updated_college" name="updated_college"
                            value="<?php echo $participant['college']; ?>" required>
                    </div>
                    <!-- ... (add other form fields for editing) -->
                    <button type="submit" class="btn btn-primary" name="update_participant">Update Participant</button>
                </form>
            </div>
            <div class="card-footer text-end">
                <a href="./viewparticipants.php" class="btn btn-secondary">Close</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
