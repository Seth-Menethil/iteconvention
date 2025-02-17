<?php
require_once('connection/connection.php'); //connect to the databse
session_start();

if (!isset($_SESSION['logged_in_index2'])) {
    // Redirect to index2.php if the user hasn't logged in through index2.php
    header('Location: signin.php');
    exit;
}

if (isset($_POST['program_id'])) {
    $_SESSION['program_id'] = $_POST['program_id'];
} else {
    echo "<script>alart( 'There is an Error' )</script>";
}

$program_id = $_SESSION['program_id'];

$query = "SELECT * FROM program WHERE program_id = $program_id";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}

$id = $_SESSION['user_id'];
$sql = "SELECT * FROM signup where id = $id";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $branch = $_POST['branch'];
    $college = $_POST['college'];
    $program_id = $_SESSION['program_id'];


    // Check for existing email or program_id in the participant table
    $duplicate = mysqli_query($con, "SELECT * FROM participant WHERE user_id='$id' AND program_id='$program_id'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Already registered')</script>";
        echo '<script>window.location.href = "../main-page.php";</script>';
    } else {

        $query = "SELECT * FROM signup WHERE id = '$id'";
        $res = mysqli_query($con, $query);
        $row2 = mysqli_fetch_assoc($res);
        $user_id = $row2['id'];
        $email = $row2['email'];

        // Insert the participant data into the participant table
        $query = "INSERT INTO participant (name, email, phone, branch, sem, college, user_type, program_id, user_id) VALUES ('$name', '$email', '$phone', '$branch', '$currentYear', '$college', 'participant', '$program_id', '$user_id')";
        $res2 = mysqli_query($con, $query);

        if ($res2) {
            echo "<script>alert('Registration Successfull.')</script>";
            echo '<script>window.location.href = "../main-page.php";</script>';
        } else {
            echo "<script>alert('Error registering participant.')</script>";
            echo '<script>window.location.href = "../main-page.php";</script>';
        }
    }


} else {
    echo "<script>Error</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>ITE Convention '25</title>
    <!-- Include fonts, icons, and CSS resets if you like -->
    <link rel="stylesheet" href="assets/style/event_style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Smooth scroll CSS -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    <!-- ======= NAVBAR ======= -->
    <nav class="navbar">
        <a href="#home" class="logo">
            <img src="assets/img/logo_new_main.png" alt="Your Conference Logo">
        </a>
        <a href="main-page.php" class="btn btn-ticket">Go Back</a>
    </nav>

    <br><br><br><br>
    <div class="container">
        <div class="event-grid">
            <!-- Left Column -->
            <div>
                <div class="event-banner">
                    <img src="assets/img/bg_prev.png" alt="Event banner">
                </div>
                <div class="description">
                    <h2>Description</h2>
                    <p><?php echo $row['details']; ?></p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="event-details">
                <div class="event-header">
                    <h1 class="event-title"><?php echo $row['name']; ?></h1>
                    <p class="event-subtitle">Event Subtitle or Tagline</p>
                </div>

                <button class="register-btn">Register Now</button>

                <div class="info-card">
                    <h3>Event Details</h3>
                    <div class="info-item">
                        <svg class="info-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <div class="info-content">
                            <h4>Date & Time</h4>
                            <p>Enter your event date and time</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <svg class="info-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <div class="info-content">
                            <h4>Location</h4>
                            <p><?php echo $row['venue']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="event-type">
                    <span>Event Type</span>
                    <span class="type-badge">Onsite</span>
                </div>


                <!-- <button class="guide-btn">Details</button> -->
                <button class="share-btn">Share</button>

            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <div class="footer-logos">
                    <img src="assets/img/unilogo2.png" alt="University Logo 1">
                    <img src="assets/img/unilogo1.png" alt="University Logo 2">
                    <div class="uni-info">
                        <p>St. Paul University Philippines</p>
                        <p>School of Information Technology and Engineering</p>
                        <p>Mabini Street, Tuguegarao City, Cagayan 2500</p>
                    </div>
                </div>
            </div>

            <!-- Floating Notification for Link Copy -->
            <div id="copy-notice">Link Copied!</div>

            <!-- Registration Modal -->
            <div class="modal" id="register-modal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2 style="color:#073854;">Register for the Event</h2>
                    <form>
                        <label for="name">Full Name:</label>
                        <input type="text" id="name" value="<?php $row2('name')?>" required>

                        <label for="email">Contact:</label>
                        <input type="email" id="email" required>

                        <label for="occupation">Occupation:</label>
                        <select name="occupation" id="occupation">
                            <option value="Student">Student</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Professional">Professional</option>
                        </select>

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>


            <div class="footer-right">
                <div class="footer-links">
                    <a href="contact.html">Contact</a>
                    <a href="privacy.html">Privacy Policy</a>
                    <a href="terms.html">Terms of Service</a>
                </div>
                <div class="footer-social">
                    <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i
                            class="fab fa-instagram"></i></a>
                    <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="dev-note">
            design made with 💜 by Serafin Gazzingan<br>
            jgazzingan@spup.edu.ph
        </div>
    </footer>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab');
            const contents = document.querySelectorAll('.schedule-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active classes
                    tabs.forEach(t => t.classList.remove('active'));
                    contents.forEach(content => content.classList.remove('active'));

                    // Add active class to the clicked tab and its content
                    tab.classList.add('active');
                    const target = tab.getAttribute('data-day');
                    document.getElementById(target).classList.add('active');
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide navbar on scroll down past hero and show on scroll up
            let lastScrollTop = 0;
            const heroSection = document.querySelector('.hero-section');
            const heroHeight = heroSection ? heroSection.offsetHeight : 0;
            const navbar = document.querySelector('.navbar');

            window.addEventListener('scroll', function() {
                let currentScrollTop = window.pageYOffset || document.documentElement.scrollTop;
                // If we've scrolled past the hero section and we're scrolling down...
                if (currentScrollTop > heroHeight && currentScrollTop > lastScrollTop) {
                    navbar.classList.add('hidden');
                } else {
                    // Scrolling up or not past the hero section
                    navbar.classList.remove('hidden');
                }
                lastScrollTop = currentScrollTop <= 0 ? 0 : currentScrollTop;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Share Button Functionality
            const shareBtn = document.querySelector('.share-btn');
            const copyNotice = document.getElementById('copy-notice');

            shareBtn.addEventListener('click', function() {
                // Copy event link to clipboard
                const dummyInput = document.createElement('input');
                dummyInput.value = window.location.href;
                document.body.appendChild(dummyInput);
                dummyInput.select();
                document.execCommand('copy');
                document.body.removeChild(dummyInput);

                // Show floating notification
                copyNotice.classList.add('show');

                // Hide after 3 seconds smoothly
                setTimeout(() => {
                    copyNotice.classList.add('hide');
                    setTimeout(() => {
                        copyNotice.classList.remove('show', 'hide');
                    }, 500);
                }, 3000);
            });

            // Modal for Registration
            const registerBtn = document.querySelector('.register-btn');
            const modal = document.getElementById('register-modal');
            const modalContent = document.querySelector('.modal-content');
            const closeModal = document.querySelector('.close-btn');

            registerBtn.addEventListener('click', function() {
                modal.classList.add('show');
            });

            closeModal.addEventListener('click', function() {
                modal.classList.remove('show');
            });

            // Close modal if user clicks outside of it
            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.remove('show');
                }
            });
        });
    </script>


</body>

</html>