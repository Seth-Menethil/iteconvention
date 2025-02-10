<?php
require_once('../connection/connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("You are logged Out ! Please log in Again");</script>';
    echo '<script>window.location.href = "../index.php";</script>';
    exit;
}

if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $newpass = $_POST['newpass'];
    $confpass = $_POST['confpass'];

    // Validate inputs
    if (empty($email) || empty($pass) || empty($newpass) || empty($confpass)) {
        echo "<script>alert('Please fill in all fields')</script>";
    } else {
        $query = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($con, $query);

        if ($row = mysqli_fetch_assoc($res)) {
            $db_password = $row['password'];

            if ($pass == $db_password) {

                if ($newpass == $confpass) {

                    // $hashed_password = password_hash($confpass, PASSWORD_DEFAULT);
                    $update_query = "UPDATE user SET `pass` = '$confpass' WHERE `email` = '$email'";
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
                echo "<script>alert('Current password does not match')</script>";
            }
        } else {
            echo "<script>alert('Invalid email')</script>";
        }
    }
}

$id = $_SESSION['user_id'];
$sql = "SELECT username FROM user where user_id = $id";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Management</title>
  <link rel="shortcut icon" href="../assets/icons/logo-spup.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/CSS/adminlte.min.css">
  <link rel="stylesheet" href="../assets/CSS/style.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../function/logout.php" class="nav-link">Log Out</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../assets/icons/cs_logo.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light ml-2"><?php echo $result['username'];?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <br>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Participants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./signup2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Participant</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./currentprograms.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Current Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./newprogramadmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Event</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./newadmin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>En/Disable Registration</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./changepass.php" class="nav-link">
                  <i id="changepass" class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../function/logout.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>

  </aside>

  <div class="content-wrapper">
    <div class="container-fluid">
        <div class="card" >
          <div class="card-body mt-2" style=" height:85vh">

            <iframe src="./viewparticipants.php" width="100%" height="100%" style="border:none;">
          
            </iframe>


          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
  </div>
        
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Cyber Summit Management Page</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>

</body>
</html>
