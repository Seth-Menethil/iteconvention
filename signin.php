<?php
require_once('connection/connection.php');
session_start();

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  if (empty($email) || empty($pass)) {
    echo '<script>alert("Please fill in both email and password fields")</script>';
  } else {
    $sql = "SELECT email, password, user_type, user_id FROM user
        WHERE email = '$email'
        UNION
        SELECT email, password, user_type, id AS user_id FROM signup
        WHERE email = '$email'";

    $result = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
      $password = $row['password'];

      if ($pass == $password && $row['user_type'] == 'admin') {
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: ./admindash.php");
        exit();
      } elseif ($pass == $password && $row['user_type'] == 'participant') {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['logged_in_index2'] = true; // Set a session variable indicating login from index2.php
        header("Location: main-page.php");
        exit();
      } else {
        echo '<script>alert("Incorrect password")</script>';
      }
    } else {
      echo '<script>alert("Account Does not Exist")</script>';
      echo '<script>window.location.href = "signin.php";</script>';
      exit();
    }
  }
}

$query = "SELECT * FROM program ORDER BY program_id DESC";
$res2 = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In/Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style/signin.css">
</head>

<body>

  <div class="signin-container">
    <!-- Left Image Section -->
    <div class="signin-image"></div>
    <!-- Right Form Section -->
    <div class="signin-form">
      <h2>Sign In</h2>
      <form method="POST">
        <input type="email" class="form-control" placeholder="Email" name="email" required>
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <button type="submit" name="login" value="login" class="btn btn-primary w-100">Sign In</button>
      </form>
      <div class="links">
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        <p><a href="#">Forgot Password?</a></p>
      </div>
    </div>
  </div>

  <footer class="footer">
    <p>&copy; 2025 St. Paul University Philippines. All rights reserved.</p>
  </footer>
</body>

</html>