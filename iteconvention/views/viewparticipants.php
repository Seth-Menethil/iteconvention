<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You are logged Out! Please log in Again");</script>';
    echo '<script>window.location.href = "./index.php";</script>';
    exit;
}

if (isset($_POST['delete_participant'])) {
    $participant_id = $_POST['participant_id'];

    // Query to delete participant based on participant ID
    $delete_query = "DELETE FROM participant WHERE participant_id = '$participant_id'";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        // Participant deleted successfully
        echo '<script>alert("Participant deleted successfully");</script>';
        // Redirect to the same page to update the participant data displayed after deletion
        echo '<script>window.location.href = "./viewparticipants.php";</script>';
    } else {
        // Failed to delete participant
        echo '<script>alert("Failed to delete participant");</script>';
    }
}

$query1 = "SELECT * FROM program";
$res1 = mysqli_query($con, $query1);

// Initialize variables for search and filter
$searchTerm = "";
$filterProgram = "";

// Check if a search query is submitted
if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($con, $_GET['search']);
}

// Check if a filter is applied
if (isset($_GET['program_filter'])) {
    $filterProgram = mysqli_real_escape_string($con, $_GET['program_filter']);
}

// Modify your query to include the search and filter conditions
$query = "SELECT * FROM participant WHERE 
           (name LIKE '%$searchTerm%' OR 
           email LIKE '%$searchTerm%' OR 
           phone LIKE '%$searchTerm%' OR 
           branch LIKE '%$searchTerm%' OR 
           sem LIKE '%$searchTerm%' OR 
           college LIKE '%$searchTerm%')";

// Add filter condition if a program is selected
if (!empty($filterProgram)) {
    $query .= " AND program_id = '$filterProgram'";
}

$res = mysqli_query($con, $query);

// Set the number of participants to display per page
$participantsPerPage = 8;

// Get the current page number
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the offset for the SQL LIMIT clause
$offset = ($page - 1) * $participantsPerPage;

// Modify your query to include the search and filter conditions
$query = "SELECT * FROM participant WHERE 
           (name LIKE '%$searchTerm%' OR 
           email LIKE '%$searchTerm%' OR 
           phone LIKE '%$searchTerm%' OR 
           branch LIKE '%$searchTerm%' OR 
           sem LIKE '%$searchTerm%' OR 
           college LIKE '%$searchTerm%')";

// Add filter condition if a program is selected
if (!empty($filterProgram)) {
    $query .= " AND program_id = '$filterProgram'";
}

// Add pagination to the query
$query .= " LIMIT $offset, $participantsPerPage";

$res = mysqli_query($con, $query);

// Get the total number of participants without pagination
$totalParticipantsQuery = "SELECT COUNT(*) as total FROM participant WHERE 
                          (name LIKE '%$searchTerm%' OR 
                          email LIKE '%$searchTerm%' OR 
                          phone LIKE '%$searchTerm%' OR 
                          branch LIKE '%$searchTerm%' OR 
                          sem LIKE '%$searchTerm%' OR 
                          college LIKE '%$searchTerm%')";

// Add filter condition if a program is selected
if (!empty($filterProgram)) {
    $totalParticipantsQuery .= " AND program_id = '$filterProgram'";
}

$totalParticipantsResult = mysqli_query($con, $totalParticipantsQuery);
$totalParticipantsData = mysqli_fetch_assoc($totalParticipantsResult);

// Calculate the total number of pages
$totalParticipants = $totalParticipantsData['total'];
$totalPages = ceil($totalParticipants / $participantsPerPage);




?>


<!-- html -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
    <link rel="icon" href="./assets/images/cropped-GCU-Logo-circle.png">
    <title>Participants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>
    <!-- Head content remains unchanged -->
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row mt-2">
            <div class="column">
                <div class="card mt-5">
                    <div class="card-header">
                        
                        <h2 class="display-6">Search</h2>
                        

                        <!-- Search Bar Form -->
                        <form action="" method="GET" class="d-flex col-6">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search">
                            <button type="submit" class="btn btn-outline-success">Search</button>
                        </form>
                    </div>
                    <!-- Remaining HTML content remains unchanged -->
                </div>
            </div>
        </div>
    </div>

    <!-- Remaining scripts remain unchanged -->
</body>

</html>

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

<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="column">
                <div class="card mt-5">
                    <div class="card-header">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Programs
                            </button>

                            <ul class="dropdown-menu bg-dark">
                                <?php while ($row1 = mysqli_fetch_assoc($res1)) { ?>
                                    <li>
                                        <form action="./admindropdown.php" method="POST">
                                            <input type="hidden" name="name" value="<?php echo $row1['name']; ?>">

                                            <a href="./admindropdown.php" style="color:white;" class="drop-link">
                                                <button class="dropdown-item mb-2 text-center" type="submit"
                                                    style="color:white;">
                                                    <?php echo $row1['name'] . "<br>"; ?>
                                                </button>
                                            </a>

                                        </form>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <h2 class="display-6" style="margin: 0 auto;">All Participants</h2>
                        <!-- <span id="closeModal">&times;</span> -->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered text-center">
                                <tr>
                                    <td class="bg-dark text-white"> Full Name </td>
                                    <td class="bg-dark text-white"> Email </td>
                                    <td class="bg-dark text-white"> Contact Number </td>
                                    <td class="bg-dark text-white"> Occupation </td>
                                    <td class="bg-dark text-white"> Year of CyberSummit </td>
                                    <td class="bg-dark text-white"> School/Organization </td>
                                    <td class="bg-dark text-white"> Program Name </td>
                                    <td class="bg-dark text-white"> Edit/Delete </td>
                                </tr>
                                <tr>

                                    <?php
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        ?>
                                    <tr>

                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['phone']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['branch']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['sem']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['college']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $user_id = $row['program_id'];
                                            $query = "SELECT name FROM program WHERE program_id = '$user_id'";
                                            $res2 = mysqli_query($con, $query);

                                            if ($res2) {
                                                $program = mysqli_fetch_assoc($res2);
                                                echo $program['name'];
                                            }

                                            ?>
                                        </td>

                                        <td>
                                            <!-- Form to submit participant ID for deletion with confirmation -->
                                            <form action="" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this participant data?');">
                                                <input type="hidden" name="participant_id" value="<?php echo $row['participant_id']; ?>">
                                                <a href="./editparticipant.php?participant_id=<?php echo $row['participant_id']; ?>" class="btn btn-warning">Edit</a>
                                                <button type="submit" name="delete_participant" class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>


                                    </tr>
                                    <!-- ... (previous PHP code) ... -->
                                    <!-- ... (remaining PHP code) ... -->

                                    <?php
                                    }
                                    ?>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                // Previous Page Link
                                if ($page > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '">&laquo; Previous</a></li>';
                                }
                                // Page LinksF
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                }
                                // Next Page Link
                                if ($page < $totalPages) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '">Next &raquo;</a></li>';
                                }
                                ?>
                            </ul>
                        </nav>
                        
                    </div>
    
                    <div class="card-footer">
                        <a onclick="exportToExcel('myTable')" class="btn btn-secondary">Export to Excel</a>
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
        function exportToExcel(tableId) {
        var table = document.getElementById(tableId);
        var html = table.outerHTML;

        var blob = new Blob([html], { type: 'application/vnd.ms-excel' });
        var a = document.createElement('a');
        a.href = window.URL.createObjectURL(blob);
        a.download = 'participantList.xls';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        }
    </script>


    <script src="./assets/JS/printpage.js"></script>
    <script src="./assets/JS/pressbackgoback.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>