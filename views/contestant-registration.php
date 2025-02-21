<?php
require_once('../connection/connection.php');
session_start();

$currentYear = date("Y");

if (isset($_SESSION['program_id'])) {
  $program_id = $_SESSION['program_id'];
} else {
  echo "<script>alert('An Error ahs occured')</script>";
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
  $team = $_POST['team'];
  $name = $_POST['name'];
  $event = $_SESSION['program_id'];;
  $college = $result['college'];

  // Insert the participant data into the participant table
  $query = "INSERT INTO contestants (name, affiliation, team, competition) VALUES ('$name', '$college', '$team', '$event')";
  $res2 = mysqli_query($con, $query);

  if ($res2) {
    header("Location: " . $_SERVER['PHP_SELF']);
  } else {
    echo "<script>alert('Error registering participant.')</script>";
  }
} else {
  echo "<script>Error</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="../assets/style/contestant-registration.css"> <!-- Using the same CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <style>
    /* Close Button Styling */
    .close-btn {
      font-size: 24px;
      text-decoration: none;
      color: black;
      font-weight: bold;
    }

    .close-btn:hover {
      color: red;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Participant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="editForm">
              <input type="hidden" id="edit-id">
              <div class="form-group">
                <label for="edit-name">Player Name</label>
                <input type="text" class="form-control" id="edit-name" required>
              </div>
              <div class="form-group">
                <label for="edit-team">Team</label>
                <select class="form-control" id="edit-team" required>
                  <option value="Team A">Team A</option>
                  <option value="Team B">Team B</option>
                  <option value="Team C">Team C</option>
                  <option value="Team D">Team D</option>
                  <option value="Team E">Team E</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Modal -->

    <div class="row mx-auto">
      <div class="signin-container mt-2 col-md-5 col-lg-5 mx-auto">
        <a href="../main-page.php#competitions" class="close-btn float-end">&times;</a>
        <!-- Left Form Section -->
        <div id="innovate" class="signin-form">
          <h3>Register Contestants</h3>
          <form method="POST">
            <select class="form-control" name="team" id="" required>
              <option value="">Select Team (If Multiple Teams)</option>
              <option value="Team A">Team A</option>
              <option value="Team B">Team B</option>
              <option value="Team C">Team C</option>
              <option value="Team D">Team D</option>
              <option value="Team E">Team E</option>
            </select>
            <input type="text" class="form-control" placeholder="Participant Full Name" name="name" required>
            <button type="submit" value="submit" name="submit" class="btn btn-primary">Add Contestant</button>
          </form>

        </div>
      </div>
    </div>

    <div class="row justify-content-center m-2">
      <div class="col-md-6 col-lg-6 mb-2">
        <div class="table-container table-responsive" style="max-height: 400px; overflow-y: auto;">
          <table id="paymentsTable" class="display table table-striped table-bordered">
            <thead class="table-light">
              <tr>
                <th>Player</th>
                <th>Team</th>
                <th>Modify</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../connection/connection.php';

              $college = $result['college'];
              $event = $_SESSION['program_id'];

              $query = "SELECT * FROM contestants WHERE affiliation = '$college' AND competition = '$event' ORDER BY team ASC";
              $result = $con->query($query);

              if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['team']) . "</td>";
                  echo "<td>
                          <button class='btn btn-sm btn-warning edit-btn' data-id='" . htmlspecialchars($row['id']) . "' data-name='" . htmlspecialchars($row['name']) . "' data-team='" . htmlspecialchars($row['team']) . "'>Edit</button>
                          <button class='btn btn-sm btn-danger delete-btn ml-2' data-id='" . htmlspecialchars($row['id']) . "'>Delete</button>
                        </td>";

                  echo "</tr>";
                }
              }
              $con->close();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2025 St. Paul University Philippines. All rights reserved.</p>
  </footer>

  <!--SCRIPTS HERE-->
  <<!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function() {
        $('#paymentsTable').DataTable({
          "paging": false, // Enables pagination
          "searching": false, // Enables search
          "ordering": true, // Enables column sorting
          "info": false, // Show table info
          "scrollY": "300px", // Makes table vertically scrollable
          "scrollCollapse": true
        });
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).ready(function() {
        $(".delete-btn").click(function() {
          var participantId = $(this).data("id"); // Get ID from button
          var row = $(this).closest("tr"); // Select row for removal

          if (confirm("Are you sure you want to delete this participant?")) {
            $.ajax({
              url: "../function/delete.php",
              type: "POST",
              data: {
                id: participantId
              },
              success: function(response) {
                if (response.trim() === "success") {
                  row.fadeOut(500, function() {
                    $(this).remove();
                  }); // Remove row smoothly
                } else {
                  alert("Error deleting participant.");
                }
              }
            });
          }
        });
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
      $(document).ready(function() {
        // Open Edit Modal with existing data
        $(".edit-btn").click(function() {
          var id = $(this).data("id");
          var name = $(this).data("name");
          var team = $(this).data("team");

          $("#edit-id").val(id);
          $("#edit-name").val(name);
          $("#edit-team").val(team); // Pre-select the correct team
          $("#editModal").modal("show");
        });

        // Handle Update Form Submission via AJAX
        $("#editForm").submit(function(event) {
          event.preventDefault();

          var id = $("#edit-id").val();
          var name = $("#edit-name").val();
          var team = $("#edit-team").val(); // Get selected team from dropdown

          $.ajax({
            url: "../function/update.php",
            type: "POST",
            data: {
              id: id,
              name: name,
              team: team
            },
            success: function(response) {
              if (response.trim() === "success") {
                alert("Participant updated successfully!");
                location.reload(); // Refresh page to update table
              } else {
                alert("Error updating participant.");
              }
            }
          });
        });
      });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/JS/signup.js"></script>


</body>

</html>