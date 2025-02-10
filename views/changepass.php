<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You are logged Out ! Please log in Again");</script>';
    echo '<script>window.location.href = "./index.php";</script>';
    exit;
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM user where user_id = $id";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);

if (isset($_POST['save'])) {

    $newpass = $_POST['newpass'];
    $confpass = $_POST['confpass'];

    // Validate inputs
    if (empty($newpass) || empty($confpass)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } else {
        $query = "SELECT * FROM user WHERE user_id='$id'";
        $res = mysqli_query($con, $query);

        if ($row = mysqli_fetch_assoc($res)) {
            $db_password = $row['password'];
            if ($newpass == $confpass) {

                // $hashed_password = password_hash($confpass, PASSWORD_DEFAULT);
                $update_query = "UPDATE user SET `password` = '$confpass' WHERE `user_id` = '$id'";
                $res = mysqli_query($con, $update_query);

                if ($res) {
                    echo "<script>alert('Password changed successfully')</script>";
                } else {
                    echo "<script>alert('Password could not be updated')</script>";
                }
            } else {
                echo "<script>alert('New password does not match confirmed password')</script>";
            }
            
        } else {
            echo "<script>alert('Invalid email')</script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/cropped-GCU-Logo-circle.png">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>


</head>

<body class="bg-white"> 
    <div class="container mt-4">   
        <div class="card card-primary mt-4">
            
            <div class="card-header">
                <h3 class="card-title text-center">Changing Password for: <?php echo $result['username'];?> </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post">
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="newpass">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="text" class="form-control" id="exampleInputPassword1"  name="confpass">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="save" value="save" class="btn btn-primary">Submit</button>
                    <a href="./admindash.php" id="closeModal">Return to Dashboard</a>
                </div>
            </form>
        </div>
    </div>
    <script src="./assets/JS/changepass.js"></script>

    <script>
        const closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            window.location.href = './admindash.php';
        });


        // function confirmDelete(programId) {
        //     if (confirm('Please note that deleting this program will irreversibly remove associated participant data. Are you absolutely certain you wish to proceed with this action?')) {
        //         // Set the program_id to the hidden input field and submit the form
        //         document.getElementById('deleteProgramId').value = programId;
        //         document.getElementById('deleteForm').submit();
        //     }
        // }
    </script>

</body>

</html>