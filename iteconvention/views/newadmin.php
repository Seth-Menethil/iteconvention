<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    // JavaScript alert before redirection
    echo '<script>alert("You are logged Out ! Please log in Again");</script>';
    // Redirect to the login page after the alert
    echo '<script>window.location.href = "./index.php";</script>';
    exit;
}

if (isset($_POST['submit'])) {

    $user_name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    $duplicate = mysqli_query($con, "SELECT * FROM user WHERE username='$user_name' OR email='$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Userame and Email is already Taken')</script>";
    } else {
        $query = "INSERT INTO user VALUES ('','$user_name', '$email','$phone','$pass', 'admin')";
        $res = mysqli_query($con, $query);
        echo "<script>alert('New Admin Added Successfully')</script>";
    }

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <link rel="icon" href="./images/cropped-GCU-Logo-circle.png">
    <title>New Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSS -->
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
    width: 70%;
    max-width: 500px;
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 20px;
    margin: 50px auto;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.btn-primary {
    width: 100%;

    border: none;
    border-radius: 20px;
    background-color: #dd3737;
    box-shadow: 3px 3px 9px #222;
    transition: 0.5s ease;
    margin: 0 auto 0 0%;
}

.btn-primary:hover {
    transform: scale(1.05);
}

.text-center {
    background-color: #111;
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
        width: 80%;
    }
}

@media (max-width: 1024px) {
    .mx-auto {
        width: 80%;
    }
}

@media (max-width: 912px) {
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

@media (max-width: 480px) {
    .mx-auto {
        width: 100%;
        border-radius: 0;
    }
}

    </style>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>



    <!-- Add New Admin -->
    <div class="container.fluid">
        <div class="loginbackground">
            <h4 class="text-center">Add New Admin</h4>
            <form class="mx-auto addnew" id="loginModal" method="POST">
                <span class="closelogin text-white" id="closeModal">&times;</span>
                <div class="mb-3 mt-5">
                    <label for="exampleInputname1" class="form-label">Username</label>
                    <input type="username" name="username" class="form-control" id="exampleInputname1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputname1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputphone1" class="form-label">Contact Number</label>
                    <input type="tel" name="phone" class="form-control" id="exampleInputphone1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword3" required>
                    <input type="checkbox" class="checkbox" onclick="myFunction3()">Show Password
                    <!-- <div id="emailHelp" id="form-text mt-3"><a href="#">Forgot Password?</a></div> -->
                </div>
                <div class="add-button">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary mt-4">Submit</button>
                </div>
                <!-- <p>if not registered ! <a href="./signup.html">Sign Up</a></p> -->
                <p>Go to <a href="./admindash.php">Dashboard</a></p>
            </form>
        </div>
    </div>
    <script>
        function myFunction3() {
            var x = document.getElementById("exampleInputPassword3");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        const closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            loginModal.style.display = 'none';
            window.location.href = "./admindash.php";

        });
    </script>
</body>

</html>