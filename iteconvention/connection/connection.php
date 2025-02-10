<?php

    // Create connection
    $con = mysqli_connect('localhost', 'cybersum_db', 'cybersummit', 'cybersum_db');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>