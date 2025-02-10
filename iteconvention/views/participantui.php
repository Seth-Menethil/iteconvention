<?php 
    require_once('../connection/connection.php');
    session_start();

    $currentYear = date("Y");

    if (!isset($_SESSION['user_id'])) {
        echo '<script>alert("You are logged Out ! Please log in Again");</script>';
        echo '<script>window.location.href = "./index.php";</script>';
        exit;
    }


    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM signup where id = $id";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query);



    if (isset($_POST['submit'])) {
        // Retrieve updated data from the form
        $updatedName = mysqli_real_escape_string($con, $_POST['name']);
        $updatedPhone = mysqli_real_escape_string($con, $_POST['phone']);
        $updatedOccupation = mysqli_real_escape_string($con, $_POST['branch']);
        $updatedSchool = mysqli_real_escape_string($con, $_POST['college']);
        $id = $_SESSION['user_id'];

        // ... (update other fields as needed)
    
        // Update the participant details in the database
        $update_query = "UPDATE signup
        SET
            name = '$updatedName',
            phone = '$updatedPhone',
            branch = '$updatedOccupation',
            sem = '$currentYear',
            college = '$updatedSchool'
        WHERE
            id = '$id';;";
                         
        $update_result = mysqli_query($con, $update_query);
    
        if ($update_result) {
            // Participant details updated successfully
            echo '<script>alert("Your details has been updated successfully");</script>';
            echo '<script>window.location.href = "./participantui.php";</script>';
            exit;
        } else {
            // Failed to update participant details
            echo '<script>alert("Failed to update participant details");</script>';
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
    <title>User</title>
</head>

<body class="" >
    <div class="container" >
        <div class="row mt-4" style="border:2px" style=" box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">  

            <div class="card card-primary col-12">
                <div class="card-header mt-4">
                    <h3 class="card-title text-center">Participant Information</h3>
                </div>
            <!-- /.card-header -->
            <!-- form start -->
                <form action="" method="post">
                    <div class="card-body" >
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $result['name']; ?>" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact Number</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="phone" value="<?= $result['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Occupation (Student, Faculty, Coach etc.)</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="branch" value="<?= $result['branch']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">School/Organization</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="college" value="<?= $result['college']; ?>">
                        </div>
    
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Update Information</button>
                        <a href="../index.php" id="closeModal">Return to Main Page</a>
                    </div>
                </form>
            </div>
        


        </div>

    </div>
</body>
</html>