<?php
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();


// Redirect to the login page or any desired destination after logout
header("location: ../index2.php");
exit;
