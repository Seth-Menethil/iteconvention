<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You are logged Out ! Please log in Again");</script>';
    echo '<script>window.location.href = "./index.php";</script>';
    exit;
}

if (isset($_POST['delete_program_id'])) {
    $program_id = $_POST['delete_program_id'];

    // Prepare a DELETE query to remove the program
    $delete_query = "DELETE FROM program WHERE program_id = ?";
    $stmt = mysqli_prepare($con, $delete_query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $program_id);
        $delete_result = mysqli_stmt_execute($stmt);

        if ($delete_result) {
            echo '<script>alert("Program deleted successfully")</script>';
            // Redirect to the same page to update the program data displayed after deletion
            echo '<script>window.location.href = "./currentprograms.php";</script>';
            exit;
        } else {
            echo '<script>alert("Failed to delete the program")</script>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Failed to prepare delete statement")</script>';
    }
}

$query = "SELECT * FROM program";
$res2 = mysqli_query($con, $query);

$query1 = "SELECT * FROM user";
$res1 = mysqli_query($con, $query1);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/cropped-GCU-Logo-circle.png">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <title>All Programs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .card-header {
            display: flex;
            justify-content: space-between;
        }

        .card-header a {
            text-decoration: none;
            font-size: large;
            padding: 20px 0px 20px 0;
        }

        .card-header a:hover {
            color: #dd3737;
            transition: 0.5s ease;
        }

        .card-header a:hover {
            transform: scale(1.1);
        }

        #closeModal {
            font-size: 40px;
            cursor: pointer;
            transition: 0.5s ease;
        }

        #closeModal:hover {
            transform: scale(1.5);
        }

        .card-header h2 {
            text-align: start;
        }

        .card-footer {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .dropdown-item:hover {
            background-color: red;
            color: white;
        }

        @media screen and (max-width: 1205px) {
            body {
                font-size: 0.7rem;
            }
        }

    </style>

</head>

<body style="background-color: #393E46;">
    <div class="container">
        <div class="row mt-5">
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <h2 class="display-6r" style="text-align:center">Current Events</h2>
                        <span id="closeModal">&times;</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-white" style="background-color: #2C3639;"> Program Name </td>
                                    <td class="text-white" style="background-color: #2C3639;"> Date </td>
                                    <td class="text-white" style="background-color: #2C3639;"> Time </td>
                                    <td class="text-white" style="background-color: #2C3639;"> Venue</td>
                                    <td class="text-white" style="background-color: #2C3639;"> Theme</td>
                                    <td class="text-white" style="background-color: #2C3639;"> Delete</td>
                                </tr>
                                <tr>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($res2)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['date']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['time']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['venue']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $user_id = $row['program_id'];
                                            $query = "SELECT image FROM program WHERE program_id = $user_id";
                                            $result = mysqli_query($con, $query);
                                            if ($result && mysqli_num_rows($result) > 0) {
                                                $row0 = mysqli_fetch_assoc($result);
                                            }
                                            ?>
                                            <img class="admin-img" src="../<?php echo $row['image']; ?>" width="90px"
                                                height="auto" alt="image"></a>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-danger"
                                                onclick="confirmDelete(<?php echo $row['program_id']; ?>)">Delete</a>
                                        </td>
                                        <form id="deleteForm" method="POST">
                                            <input type="hidden" name="delete_program_id" id="deleteProgramId">
                                        </form>
                                    </tr>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a onclick="printPage()" href="#" class="btn btn-secondary">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const closeModal = document.getElementById('closeModal');
        closeModal.addEventListener('click', () => {
            window.location.href = './admindash.php';
        });


        function confirmDelete(programId) {
            if (confirm('Please note that deleting this program will irreversibly remove associated participant data. Are you absolutely certain you wish to proceed with this action?')) {
                // Set the program_id to the hidden input field and submit the form
                document.getElementById('deleteProgramId').value = programId;
                document.getElementById('deleteForm').submit();
            }
        }

    </script>
    <script src="./assets/JS/printpage.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>