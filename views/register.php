<?php
require_once('../connection/connection.php');
session_start();

$currentYear = date("Y");

if (isset($_POST['program_id'])) {
    $_SESSION['program_id'] = $_POST['program_id'];
}else{
    echo "<script>There is an Error</script>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update the session variable based on the submitted form data
    $disableSubmitButton = isset($_POST['disable_submit_button']);
    $_SESSION['disable_submit_button'] = $disableSubmitButton;

    // Store the value in a cookie for persistent storage
    setcookie('disable_submit_button', $disableSubmitButton ? '1' : '0', time() + (86400 * 30), "/"); // 86400 = 1 day
}

// Retrieve the current value of $disableSubmitButton from session or cookie
$disableSubmitButton = (isset($_SESSION['disable_submit_button']) && $_SESSION['disable_submit_button']) ||
                       (isset($_COOKIE['disable_submit_button']) && $_COOKIE['disable_submit_button'] === '1');


$id = $_SESSION['user_id'];
$sql = "SELECT * FROM signup where id = $id";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $college = $_POST['college'];
    $program_id = $_SESSION['program_id'];


    // Check for existing email or program_id in the participant table
    $duplicate = mysqli_query($con, "SELECT * FROM participant WHERE user_id='$id' AND program_id='$program_id'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Already registered')</script>";
        echo '<script>window.location.href = "../main-page.php";</script>';
    } else {

        $query = "SELECT * FROM signup WHERE id = '$id'";
        $res = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($res);
        $user_id = $row['id'];
        $email = $row['email'];

        // Insert the participant data into the participant table
        $query = "INSERT INTO participant (name, email, phone, branch, sem, college, user_type, program_id, user_id) VALUES ('$name', '$email', '$phone', '$branch', '$currentYear', '$college', 'participant', '$program_id', '$user_id')";
        $res2 = mysqli_query($con, $query);

        if ($res2) {
            echo "<script>alert('Registration Successfull.')</script>";
            echo '<script>window.location.href = "../main-page.php";</script>';
        } else {
            echo "<script>alert('Error registering participant.')</script>";
            echo '<script>window.location.href = "../main-page.php";</script>';
        }
    }


} else {
    echo "<script>Error</script>";
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <link rel="icon" href="../assets/images/cropped-GCU-Logo-circle.png">
    <title>Register for a Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- CSS -->
    <style>
        

body {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

body,
html {
    background: #F2F2F2;
    background-size: cover;
    object-fit: cover;
}

form {
    width: 60%;
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 20px;
    margin: 10vh auto;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
}

form:hover {
    transform: scale(1.05);
}

.btn-primary {
    width: 100%;
    border: none;
    border-radius: 20px;
    background-color: #dd3737;
    box-shadow: 3px 3px 9px #222;
    transition: 0.5s ease;
    margin: 10px auto 0;
}

.btn-primary:hover {
    transform: scale(1.1);
}

.form-control {
    box-shadow: 1px 1px 5px #222;
    border-radius: 20px;
}

h4 {
    font-size: 1.5rem;
    font-weight: 700;
    animation: fadeIn 0.5s ease-in-out;
    background-color: #222;
    color: #fff;
    padding: 10px 0;
    border-radius: 10px;
}

.closelogin {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 30px;
    cursor: pointer;
    transition: 0.4s ease;
    color: #000;
}

.closelogin:hover {
    transform: scale(1.2);
}

p {
    margin: 10px 0;
    text-align: center;
    color: #555;
}

a {
    text-decoration: none;
    color: #dd3737;
}

a:hover {
    color: #1778f2;
}

@media (max-width: 1440px) {
    form {
        width: 40%;
    }
}

@media (max-width: 1024px) {
    form {
        width: 50%;
    }
}

@media (max-width: 912px) {
    form {
        width: 60%;
    }
}

@media (max-width: 820px) {
    form {
        width: 70%;
    }
}

@media (max-width: 768px) {
    form {
        width: 80%;
    }

    h4 {
        font-size: 1rem;
    }
}

@media (max-width: 600px) {
    form {
        width: 90%;
    }
}

@media (max-width: 480px) {
    form {
        width: 100%;
        margin-top: 5vh;
    }
}

@media (max-width: 1025px) {
    .btn-primary {
        margin: 10px auto 0;
    }
}

@media (max-width: 1500px) {
    .btn-primary {
        margin: 10px auto 0;
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


    <!-- Login Form -->
    <div class="container.fluid">
        <div class="loginbackground">
            <h4 class="text-center">
                <?php $query = "SELECT name FROM program WHERE program_id = '$_SESSION[program_id]'";
                $res0 = mysqli_query($con, $query);
                $row0 = mysqli_fetch_assoc($res0);
                echo $row0['name']; ?><br><br>Give Your Details Below
            </h4>
            <form class="mx-auto" id="loginModal" method="POST">
                <span class="closelogin" id="closeModal">&times;</span>

                <div class="mb-3 mt-5">
                    <label for="exampleInputname1" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $result['name']; ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputusername1" class="form-label">Contact Number</label>
                    <input type="tel" name="phone" class="form-control" value="<?= $result['phone']; ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputusername1" class="form-label">Occupation (Student, Faculty, Coach etc.)</label>
                    <input type="text" name="branch" class="form-control" value="<?= $result['branch']; ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputusercollege1" class="form-label">School/Organization(ex. SPUP)</label>
                    <input type="text" name="college" class="form-control" value="<?= $result['college']; ?>" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>

                <button type="submit" value="Submit" name="submit"
                    onclick="return confirm('This Process Cannot be Reversed. Are you sure you want to continue this Registration ?');"
                    class="btn btn-primary mt-4" <?php echo $disableSubmitButton ? 'disabled' : ''; ?>>Submit</button>
                <!-- <p>if not registered ! <a href="./signup.html">Sign Up</a></p> -->
                <p>Go to <a href="../main-page.php">Home</a></p>
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
            window.window.location.href = "../main-page.php";

        });
    </script>
</body>

</html>
