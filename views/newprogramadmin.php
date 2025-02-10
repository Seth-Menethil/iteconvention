<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You are logged Out ! Please log in Again");</script>';
    echo '<script>window.location.href = "./index.php";</script>';
    exit;
}


if (isset($_POST['submit'])) {
    // Gather form data
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venue = $_POST['venue'];
    $user_id = $_SESSION['user_id']; // Using user ID from session

    $formatted_date = date('j F Y', strtotime($date)); // Format the date

    // File upload handling
    $file_name = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_destination = "../assets/images/EventImages/" . $file_name;
    move_uploaded_file($file_tmp, $file_destination);

    $path = "assets/images/EventImages/" . $file_name;


    // Prepare and bind parameters for duplicate check
    $check_duplicate = $con->prepare("SELECT * FROM program WHERE name=? AND time=? AND venue=?");
    $check_duplicate->bind_param("sss", $name, $time, $venue);
    $check_duplicate->execute();
    $check_duplicate->store_result();

    if ($check_duplicate->num_rows > 0) {
        echo "<script>alert('Name, Venue, and Time are already booked')</script>";
    } else {
        // Insert new program using prepared statement
        $insert_query = "INSERT INTO program (name, date, time, venue, image, user_id) 
                             VALUES (?, ?, ?, ?, ?, ?)";
        $insert_statement = $con->prepare($insert_query);
        $insert_statement->bind_param("sssssi", $name, $date, $time, $venue, $path, $user_id);

        if ($insert_statement->execute()) {
            echo "<script>alert('New Program Added Successfully')</script>";
        } else {
            echo "<script>alert('Failed to add new program')</script>";
        }
        $insert_statement->close();
    }
    $check_duplicate->close();

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <link rel="icon" href="./assets/images/cropped-GCU-Logo-circle.png">
    <title>New Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <style>
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body,
html {
    background: #FFFFFF;
    background-size: cover;
    object-fit: cover;
}

.mx-auto {
    width: 80%;
    max-width: 600px;
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 50px;
    margin: 20px auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    transform: scale(1);
    transition: transform 0.3s ease-in-out;
}

.mx-auto:hover {
    transform: scale(1.02);
}

.btn-primary {
    width: 100%;
    border: none;
    border-radius: 50px;
    background-color: #dd3737;
    box-shadow: 3px 3px 9px #222;
    transition: 0.5s ease;
    margin: 0 0 0 0%;
}

.btn-primary:hover {
    transform: scale(1.05);
}

.text-center {
    background-color: #000;
    color: white;
    padding: 30px;
    border-radius: 20px;
}

.form-control {
    box-shadow: 1px 1px 5px #222;
    border-radius: 20px;
    width: 100%;
    padding: 10px;
    margin: 10px 0;
}

h4 {
    font-size: 2rem;
    font-weight: 700;
    animation: fadeIn 0.5s ease-in-out;
}

.closelogin {
    position: absolute;
    top: 1px;
    right: 20px;
    font-size: 40px;
    cursor: pointer;
    transition: 0.4s ease;

}

.closelogin:hover {
    transform: scale(1.5);
}

p {
    margin-top: 1vh;
    text-align: center;
}

@media (max-width: 1440px) {
    .mx-auto {
        width: 90%;
    }
}

@media (max-width: 1024px) {
    .mx-auto {
        width: 90%;
    }
}

@media (max-width: 912px) {
    .mx-auto {
        width: 90%;
    }
}

@media (max-width: 820px) {
    .mx-auto {
        width: 90%;
    }
}

@media (max-width: 768px) {
    .mx-auto {
        width: 90%;
        margin-top: 50px;
    }
}

@media (max-width: 600px) {
    .mx-auto {
        width: 90%;
        box-shadow: none;
    }
}

@media (max-width: 480px) {
    .mx-auto {
        width: 100%;
        box-shadow: none;
        margin-top: 50px;
        background-color: #ffffff;
        border-radius: 0;
    }

    body,
    html {
        background: #ffffff;
    }

    .addnew {
        width: 25rem;
    }

    h4 {
        font-size: 0.6rem;
    }

    .add-button {
        display: block;
        margin-left: -4rem;
    }
}

    </style>
</head>

<body>

    <div class="container.fluid">
        <div class="loginbackground">
            <h4 class="text-center">Add New Programs</h4>
            <form class="mx-auto addnew" id="loginModal" method="POST" enctype="multipart/form-data">
                <span class="closelogin text-black" id="closeModal">&times;</span>
                <div class="mb-3 mt-3">
                    <label for="exampleInputname1" class="form-label">Program Name</label>
                    <input type="name" name="name" class="form-control" id="exampleInputname1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputname1" class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputname1" class="form-label">Time</label>
                    <input type="text" name="time" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputphone1" class="form-label">Venue</label>
                    <input type="text" name="venue" class="form-control" id="exampleInputphone1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select Image File</label>
                    <input type="file" name="image" class="form-control" id="formFile">
                </div>
                <div class="add-button">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary mt-4">ADD</button>
                </div>
                <p>Go to <a href="./admindash.php">Dashboard</a></p>
            </form>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>


    <script>
        const closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            window.location.href = "./admindash.php";
        });
    </script>
</body>

</html>