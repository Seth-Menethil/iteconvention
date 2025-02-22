<?php
require_once('connection/connection.php');
session_start();

$currentYear = date("Y");

$query = "SELECT * FROM institutions ORDER BY institution ASC";
$result = $con->query($query);

if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password']; // Use the plain text password
  $contact = $_POST['number'];
  $occupation = $_POST['occupation'];
  $school = $_POST['school'];


  // Check if the email is already registered
  $check_query = "SELECT * FROM signup WHERE email='$email'";
  $check_result = mysqli_query($con, $check_query);

  if (mysqli_num_rows($check_result) > 0) {
    echo '<script>alert("Email is already registered. Please use a different email.")</script>';
  } else {
    // Insert new user into the signup table using prepared statement
    $insert_query = "INSERT INTO signup (name, email, phone, branch, sem, college, password, user_type) VALUES (?, ?, ?, ?, '$currentYear', ?, ?, 'participant')";
    $stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $contact, $occupation, $school, $pass);
    $insert_result = mysqli_stmt_execute($stmt);

    $insert_query2 = "INSERT INTO participant (name,email,phone,branch,sem,college,user_type,user_id,program_id) VALUES (?,?,?,?,'$currentYear', ?, 'participant', 0, 39)";
    $stmt2 = mysqli_prepare($con, $insert_query2);
    mysqli_stmt_bind_param($stmt2, "ssiss", $name, $email, $contact, $occupation, $school);
    $insert_result2 = mysqli_stmt_execute($stmt2);

    if ($insert_result) {
      // Set a session variable for success message
      $_SESSION['signup_success'] = "Signup successful. You can now login.";
      echo '<script>alert("Sign-Up Success Login to Register")</script>';
      echo "<script>window.location.href = 'signin.php'</script>";
    } else {
      echo '<script>alert("Error in signup. Please try again later.")</script>';
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style/signin.css"> <!-- Using the same CSS -->
</head>

<body>

  <div class="signin-container">
    <!-- Right Form Section -->
    <div class="signin-form">
      <h2>Sign Up</h2>
      <form method="POST">
        <input type="text" class="form-control" placeholder="Full Name" name="name" required>
        <input type="text" class="form-control" placeholder="Contact No. (Optional)" name="number">
        
        <select class="form-control" name="occupation" id="occupation" required>
          <option value="">Profession:</option>
          <option value="Student">Student</option>
          <option value="Faculty">Faculty</option>
          <option value="Professional">Professional</option>
        </select>

        <select class="form-control" name="school" required>
          <option value="">Select School / Organization</option>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo '<option value="' . htmlspecialchars($row['institution']) . '">' . htmlspecialchars($row['institution']) . '</option>';
            }
          }
          ?>
        </select>

        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
        <div class="checkbox-container mb-2">
          <input type="checkbox" class="checkbox" id="showPassword" onclick="togglePassword()"> Show Password
        </div>
        <button type="submit" value="Signup" name="signup" class="btn btn-primary w-100">Sign Up</button>
      </form>
      <div class="links">
        <p>Already Registered? <a href="signin.php">Sign In</a></p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2025 St. Paul University Philippines. All rights reserved.</p>
  </footer>





  <!--SCRIPTS HERE-->
  <script src="assets/JS/signup.js"></script>
  <script>
    function togglePassword() {
      var passwordInput = document.getElementById('exampleInputPassword1');
      passwordInput.type = (passwordInput.type === 'password') ? 'text' : 'password';
    }

    const closeModal = document.getElementById('closeModal');
    closeModal.addEventListener('click', () => {
      window.location.href = "../index2.php";
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