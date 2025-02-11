<?php
require_once('../connection/connection.php');
session_start();

$currentYear = date("Y");

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['number'];
    $occupation = $_POST['occupation'];
    $school = $_POST['school'];
    $programid = $_POST['programid'];


    // Check if the email is already registered
    $check_query = "SELECT * FROM participant WHERE email='$email'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Insert new user into the signup table using prepared statement
        $insert_query = "INSERT INTO participant (name, email, phone, branch, sem, college, user_type, program_id) VALUES ('$name', '$email', '$contact', '$occupation', '$currentYear', '$school', 'participant', '$programid')";
        $result = mysqli_query($con, $insert_query);


        if ($result) {
            // Set a session variable for success message
            $_SESSION['signup_success'] = "Signup successful. You can now login.";
            header("location: ./admindash.php");
        } else {
            echo '<script>alert("Error in adding. Please try again later.")</script>';
        }
    } else {
        // Insert new user into the signup table using prepared statement
        $insert_query = "INSERT INTO participant (name, email, phone, branch, sem, college, user_type, program_id) VALUES ('$name', '$email', '$contact', '$occupation', '$currentYear', '$school', 'participant', '$programid')";
        $result = mysqli_query($con, $insert_query);


        if ($result) {
            // Set a session variable for success message
            $_SESSION['signup_success'] = "Signup successful. You can now login.";
            header("location: ./admindash.php");
        } else {
            echo '<script>alert("Error in adding. Please try again later.")</script>';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-euHRpNlY8o9WFLK0DSyPDu+M+8o8i8v1wWHGkpxjZJ5cIcOdz6q8ZZdN9prp8qTO9zw2B+Gy+2Pz8/5Nph1JWg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: #EDEDED;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .signupbackground {
            background-color: #F7F7F7;
            padding: 38px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #888;
            max-width: 600px;
            width: 100%;
            animation: fadeIn 0.5s ease;
            position: relative;
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

        #signupModal {
            text-align: center;
        }

        #signupModal h4 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        #signupModal label {
            color: #555;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        #signupModal input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        #signupModal button {
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

        #signupModal button:hover {
            background-color: #222;
        }

        #signupModal p {
            margin-top: 15px;
            color: #555;
            text-align: center;
        }

        .closesignup {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 40px;
            color: #555;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .closesignup:hover {
            color: #777;
        }

        .checkbox-container {
            margin-top: 10px;
            text-align: center;
        }

        .checkbox {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <!-- Signup Form -->
       <div class="signupbackground">
        <span class="closesignup" id="closeModal">&times;</span>
        <form class="mx-auto" id="signupModal" method="POST">
            <h4>Register Particpant</h4>
            <div class="mb-3 mt-4">
                <label for="exampleInputName">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3 mt-4">
                <label for="exampleInputName">Contact (Optional)</label>
                <input type="text" name="number" class="form-control">
            </div>
            <div class="mb-3 mt-4">
                <label for="exampleInputName">Occupation(Student/Faculty/Coach etc.)</label>
                <input type="text" name="occupation" class="form-control" required>
            </div>
            <div class="mb-3 mt-4">
                <label for="exampleInputName">School/Organization (ex. St. Paul University Philippines)</label>
                <input type="text" name="school" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Select Event</label>
            <select class="form-control" required id="exampleFormControlSelect1" name="programid">
                <?php
                    $sql = "SELECT program_id, name FROM program";
                    $result = mysqli_query($con, $sql);
                
                    // Generate options dynamically
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['program_id'] . "'>" . $row['name'] . "</option>";
                    }

                ?>
            </select>
        </div>
            <button type="submit" value="Signup" name="signup">Register</button>
        </form>
    </div>

    <!--pop signup script -->
    <script src="./assets/JS/signup.js"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById('exampleInputPassword1');
            passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';
        }

        const closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            window.location.href = "./admindash.php";
        });

        // Check if the success message is set in the session
        const successMessage = "<?php echo isset($_SESSION['signup_success']) ? $_SESSION['signup_success'] : ''; ?>";
        if (successMessage) {
            alert(successMessage);
            // Clear the success message from the session
            <?php unset($_SESSION['signup_success']); ?>
        }
    </script>
</body>

</html>