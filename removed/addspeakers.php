<?php
require_once('../connection/connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted with speaker details
    if (isset($_POST['add_speaker'])) {
        $name = $_POST['name'];
        $position = $_POST['position'];

        // Create 'uploads' directory if it doesn't exist
        $uploadsDirectory = 'uploads';
        if (!is_dir($uploadsDirectory)) {
            mkdir($uploadsDirectory, 0777, true);
        }

        // Upload and handle the speaker's image
        $image_path = $uploadsDirectory . '/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

        // Insert speaker details into the speakers table
        $insertSpeakerQuery = "INSERT INTO speakers (name, position, image_path) VALUES ('$name', '$position', '$image_path')";
        $result = mysqli_query($con, $insertSpeakerQuery);

        if ($result) {
            echo '<script>alert("Speaker added successfully.");</script>';
        } else {
            echo '<script>alert("Error adding speaker. Please try again.");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">

    <title>Add Speaker</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #EDEDED;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #addSpeakerModal {
            background-color: #F7F7F7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #888;
            max-width: 400px;
            width: 100%;
            animation: fadeIn 0.5s ease;
            text-align: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #addSpeakerModal h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            color: #555;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="file"] {
            display: none;
        }

        .file-upload-container {
            position: relative;
        }

        .file-upload-label {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: auto;
        }

        .file-upload-label:hover {
            background-color: #222;
        }

        .file-name {
            margin-top: 10px;
            color: #555;
            font-size: 14px;
        }

        .image-preview-container {
            margin-top: 15px;
            max-width: 100%;
        }

        .image-preview {
            max-width: 100%;
            height: auto;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: auto;
        }

        button:hover {
            background-color: #222;
        }
        .close-button {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto;
        }

        .close-button:hover {
            background-color: #444;
        }
    </style>
</head>

<body>
    <!-- Add Speaker Form -->
    <div id="addSpeakerModal">
        <h2>Add Speaker</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="position">Position:</label>
            <input type="text" name="position" required><br>

            <div class="file-upload-container">
                <label for="image" class="file-upload-label">Choose Image</label>
                <input required type="file" name="image" id="image" accept="image/*" onchange="displayFileName()">
                <div class="file-name" id="file-name">No file chosen</div>
            </div>

            <div class="image-preview-container">
                <img id="image-preview" class="image-preview" src="#" alt="Image Preview">
            </div>
  <!-- Add Speaker button -->
        <button type="submit" name="add_speaker" style="margin-bottom: 10px;">Add Speaker</button>


<button type="button" onclick="redirectToViewSpeakers()" style="scroll-margin-right: 10px;">View Speakers</button>
<button type="button" onclick="redirectToAdminDash()" style="margin-right: 10px;">Close</button>


</form>
</div>


<script>
    function displayFileName() {
        window.location.href = 'admindash.php';
    }

    function redirectToAdminDash() {
        window.location.href = 'admindash.php';
    }

    // Function to redirect to viewspeakers.php
    function redirectToViewSpeakers() {
        window.location.href = 'viewspeakers.php';
    }

    // Your existing JavaScript code
    function displayFileName() {
        const input = document.getElementById('image');
        const fileNameDisplay = document.getElementById('file-name');
        const imagePreview = document.getElementById('image-preview');

        fileNameDisplay.textContent = input.files.length > 0 ? input.files[0].name : 'No file chosen';

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>