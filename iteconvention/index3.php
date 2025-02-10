<?php
require_once('connection/connection.php'); //connect to the databse
session_start();

$query = "SELECT * FROM program ORDER BY program_id DESC";
$res2 = mysqli_query($con, $query);

if (!isset($_SESSION['logged_in_index2']) || !$_SESSION['logged_in_index2']) {
    // Redirect to index2.php if the user hasn't logged in through index2.php
    header('Location: index2.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/icons/logo-spup.png" type="image/x-icon">
    <link rel="icon" href="./assets/images/cropped-GCU-Logo-circle.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/CSS/navbar.css">
    <link rel="stylesheet" href="./assets/CSS/carousel.css">
    <link rel="stylesheet" href="./assets/CSS/login.css">
    <link rel="stylesheet" href="./assets/CSS/aboutpop.css">
    <link rel="stylesheet" href="./assets/CSS/contactmodal.css">
    <link rel="stylesheet" href="./assets/CSS/footer.css">
    <!-- <link rel="stylesheet" href="./CSS/signup.css"> -->
    <title>Cyber Summit Registration System</title>

    <script>
        if (window.performance && window.performance.navigation.type === 2) {
            function detectBackButton() {
                window.location.href = './index2.php';
            }
            window.onload = detectBackButton;
        }
    </script>

    <style>
        html,
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: #D3D3D3;

        }

        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');

        .column {
            margin-bottom: 50px;
        }

        nav {
            padding: 0px;

        }

        .text {
            padding: 2.5em;
            background-color: #000;
        }

        nav li:first-child {
            background-color: #fffbe9;

 
        }


        .iconic {
            margin-left: -10%;
            background-color: #333;
            border-bottom-left-radius: 40%;
            border-top-left-radius: 40%;


        }

        nav a:hover {
            border-radius: 5px; 
            border-top-right-radius: 50px;
            border-bottom-left-radius: 50px;
            background-color: #333;
            color: orange;

        }

        nav {
            background-color: #fffbe9;

        }

        .loginbackground {
            z-index: 99;
        }

        .aboutbackground {
            z-index: 99;
        }

        .card-footer {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .card-footer-title {
            padding: 20px;
            border-radius: 7px;
            transition: 0.5s ease;
        }

        .card-footer-title:hover {
            background-color: black;
            color: white;
        }

        .carousel-item {
            transition: 0.5s ease;
        }

        .ems {
            background-color: #333;
            padding: 2vh;
            margin-left: -10%;
            border-top-right-radius: 50px;
            /* border-bottom-right-radius: 200px; */
            border-bottom-left-radius: 50px;
            color: #fffbe9;
            text-align: center;
        }

        .card-footer .btn {
            border-radius: 1vh;
            border: 1px solid #333;
        }

        .card-footer .btn:hover {
            background-color: #222;
            color: white;
        }

        .event_img {
            width: 100%;
            height: auto;
            display: cover;
            border-radius: 9px;
        }

        .card {
            display: inline-grid;
            margin: 5%;
            border-radius: 9px;
            box-shadow: 0px 0px 10px #222;
            transition: 0.3s ease;
        }

        .card:hover {
            transform: scale(1.07);
        }

        .card .btn {
            box-shadow: none;
        }

        .admin-img {
            border-radius: 3%;
        }

        .row>* {
            padding: 0;
            margin: 0;
            display: flex;
        }

        .details {
            padding: 6px;
            margin: 0;
            color: darkblue;
            border-radius: 50px;
            background-color: none;
            border: none;
            transition: 0.5s ease;
        }

        .details:hover {
            transform: scale(1.1);
        }


        .details_form {
            margin: 0 0 0 0;
        }

        .register_form {
            margin: 0 0 0 0;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        @media only screen and (min-width:768px) and (max-width:1023px) {
            .card-body {
                width: 10rem;
            }
        }


        @media(max-width:1023px) {
            .hideOnMobile {
                display: none;
            }
        }

        @media(max-width:1022px) {
            .sidebar {
                width: 100%;
            }

            .menu-button {
                display: block;
            }
        }

        @media(max-width:1275px) {
            .mx-auto {
                width: 35%;
            }

            .team .team_member {
                width: 28rem;
                height: 21rem;
                margin-left: -30%;
            }

            .team .team_member2 {
                /* width: 22rem; */
                height: 21rem;
                margin-left: -8%;
            }
        }
        footer {
            background-color: #111;
            font-family: Helvetica;
        }

        .footercontainer {
            width: 100%;
            padding: 30px;
        }

        .socialicons {
            display: flex;
            justify-content: center;
        }

        .socialicons a {
            text-decoration: none;
            padding: 10px;
            background-color: white;
            margin: 10px;
            border-radius: 50%;
        }

        .socialicons a i {
            font-size: 2em;
            text-decoration: none;
            color: black;
            opacity: 0.9;
        }

        .socialicons a:hover {
            background-color: #111;
            transition: 0.3s ease;
        }

        .socialicons a:hover i {
            color: white;
            transition: 0.3s ease;
        }

        .footernav ul {
            display: flex;
            justify-content: center;
            text-decoration: none;
        }

        .footernav li {
            list-style-type: none;
        }

        .footernav ul li a {
            color: white;
            margin: 20px;
            text-decoration: none;
            font-size: 1.3em;
            opacity: 0.7;
            transform: 0.5s ease;
        }

        .footernav ul li a:hover {
            opacity: 1;
        }

        .footerbottom {
            background-color: #000;
            padding: 20px;
            text-align: center;
        }

        .footerbottom p {
            color: white;
        }

        .designer {
            opacity: 0.7;
            text-decoration: uppercase;
            letter-spacing: 1px;
            font-weight: 400;
            margin: 0px 5px;
        }

        .footernav ul li {
            padding-top: 20px;
        }

        .contact {
            color: aliceblue;
        }
        .text-animation h1 {
            overflow: hidden;
            border-right: 0.15em solid orange;
            white-space: nowrap;
            margin: 0;
            margin-top: 4rem;
            margin-bottom: -2rem;
            letter-spacing: 0.15em;
            animation: typing 3s steps(40, end);
        }


        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @media(max-width:426px) {
            .text-animation h1 {
                font-size: 1.1rem;
            }

        }
        @media(max-width:426px) {
            .text-animation h1 {
                font-size: 1.1rem;
            }

        }
    </style>
</head>

<body>
    <!-- Navigation Bar  -->
    <nav>
        <ul>
            <li class="text"> <span style="color:orange; padding-left:5%;" class="display-6 ems">ITE CONVENTION WEBSITE AND REGISTRATION</span></li>
            <li class="hideOnMobile"><a href="./views/participantui.php">Participant Information</a></li>
            <li class="hideOnMobile"><a href="#about">About</a></li>
            <li class="hideOnMobile"><a href="#sectionId">Events</a></li>
            <li class="hideOnMobile"><a class="active-link" href="./function/logout.php">Logout</a></li>
            <!-- <li class="hideOnMobile" id="signupButton"><a href="#">Sign Up</a></li> -->
            <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        height="24" viewBox="0 -960 960 960" width="24">
                        <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
                    </svg></a>
            </li>
        </ul>
        <ul class="sidebar">
            <li onclick=hideSidebar()><a id="X" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="24"
                        viewBox="0 -960 960 960" width="24">
                        <path
                            d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                    </svg></a></li>
            <li><a href="./index.php">Home</a></li>
            <li onclick=hideSidebar()><a href="#about">About</a></li>
            <li onclick=hideSidebar()><a href="#sectionId">Events</a></li>
            <li><a href="./views/login.php">Logout</a></li>
            <!-- <li><a href="./signup.html">Sign Up</a></li> -->
        </ul>
    </nav>

    <!-- Carousel -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="./assets/images/spup-site-spearheads-reg-cyber-summit-2023-02-1024x492.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>


    <!-- Animated text -->
    <div class="text-animation text-center">
        <h1>🆆🅴🅻🅲🅾🅼🅴 🆃🅾 ITE CONVENTION WEBSITE</h1>
    </div>

    <!-- Login Form -->
    <div class="container.fluid">
        <div class="loginbackground">
            <form class="mx-auto" id="loginModal" method="POST">
                <span class="closelogin" id="closeModal">&times;</span>
                <h4 class="text-center">Login</h4>
                <div class="mb-3 mt-4">
                    <label for="exampleInputusername1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" required>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
                    <input type="checkbox" class="checkbox" onclick="myFunction1()">Show Password
                    <!-- <div id="emailHelp" id="form-text mt-3"><a href="#">Forgot Password?</a></div> -->
                </div>
                <button type="submit" value="Login" name="login" class="btn btn-primary mt-4">Login</button>
                <!-- <p>if not registered ! <a href="./signup.html">Sign Up</a></p> -->
                <p>Go to <a href="./index.php">Home</a></p>
            </form>
        </div>
    </div>
    <!--pop login script -->
    <script src="./assets/JS/login.js"></script>


    <section id="about" >
        <div class="container mt-5 inside-section" style="background-color:#fffbe9;">
            <div class="row" style="background-color: #D3D3D3;">
                <div class="col-12 p-4" style=" display:block; border:1px solid gray">
                    <p style="font-family: 'Roboto Slab', serif; font-size:2.5vh; text-align:justify;">
                        ITE Convention, formerly Cyber Summit is an Annual Event spear headed by SPUP-SITE department with different Themes each year.  
                        Participated in by Information Technology and Engineering Students, Teachers, Professionals and Practitioners, 
                        it aims to achieve a common goal rooted in collaboration, knowledge-sharing, and the pursuit of innovative solutions. 
                        It provides a unique platform for individuals to deepen their understanding of the ever-evolving cyber-landscape.
                        Through keynote sessions, panel discussions, and interactive workshops, attendees gain insights into the latest threat vectors,
                        innovative defense strategies, and emerging technologies.
                    </p>

                    <p style="font-family: 'Roboto Slab', serif; font-size:2.5vh; text-align:justify;">
                        St. Paul University Philippines invites you to be a part of this transformative journey. Explore our resources, 
                        stay updated on the latest cyber-trends, and join the conversation to contribute to a more secure and 
                        resilient digital world.
                    </p>

                    <p style="font-family: 'Roboto Slab', serif; font-size:2.5vh; text-align:justify;">
                        Together, let us empower ourselves, connect with like-minded individuals, and shape a future where cybersecurity 
                        is not just a priority but a shared commitment.
                    </p>

                </div>
            </div>
        </div>
    </section>


    <!-- The Programs listed on index page -->
    <section id="sectionId">
        <div class="container mt-5 inside-section" style="background-color:#fffbe9">
            <div class="row">
                <?php
                $count = 0; // Initialize count to track cards in a row
                while ($row = mysqli_fetch_assoc($res2)) {
                    ?>
                    <div class="col-md-3 mt-3 column">
                        <div class="card mt-5" style="width: 100%; height:auto;">
                            <!-- Card image -->
                            <?php
                            $user_id = $row['program_id'];
                            $query = "SELECT image FROM program WHERE program_id = $user_id";
                            $result = mysqli_query($con, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row0 = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <img class="admin-img" src="<?php echo $row0['image']; ?>" width="100%" alt="image"></a>

                            <div class="card-body text-center">
                                <h2 class="text-center" style="font-weight:bold">
                                    <?php echo $row['name']; ?>
                                </h2>
                                <p>
                                    <!-- <?php echo $row['program_id']; ?> <br> -->
                                    <!-- <?php
                                    $user_id = $row['user_id']; // $row contains user_id
                                    $query = "SELECT username FROM user WHERE user_id = '$user_id'";
                                    $res = mysqli_query($con, $query);

                                    if ($res) {
                                        $user = mysqli_fetch_assoc($res);
                                        echo $user['username']; // Display the retrieved name
                                    }
                                    ?> -->
                                </p>
                                <div class="button-container">
                                    <form action="./views/details.php" method="POST" class="details_form text-center">
                                        <input type="hidden" name="program_id" value="<?php echo $row['program_id']; ?>">
                                        <button type="submit" value="Submit" name="details"
                                            class="btn details">Details</button>
                                    </form>
                                    <form action="./views/register.php" method="POST" class="register_form text-center">
                                        <input type="hidden" name="program_id" value="<?php echo $row['program_id']; ?>">
                                        <button type="submit" value="Submit" name="register"
                                            class="btn btn-primary program_register">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $count++;
                    if ($count % 4 == 0) {
                        // If four cards are reached, close the row and start a new one
                        echo '</div><div class="row">';
                    }
                }
                ?>
            </div>
        </div>
    </section>


    <!-- index page footer  -->
    <footer>
        <div class="footercontainer mt-5">
            <!-- <div class="footernav">
                <ul>
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="#">News</a></li>
                    <li id="aboutButton"><a href="#">About</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                </ul>
            </div> -->

            <div>
                <p style="color:white;text-align:center;">
                    Contact Us : <br>
                    admissions@spup.edu.ph <br>
                    (078) 396 1987 <br>
                    Mabini Street, Tuguegarao City, Philippines: <br>
                    
                </p>
            </div>

            <div class="socialicons">
                <a href="https://www.facebook.com/StPaulUniversityPhilippines"><i class="fa-brands fa-facebook"></i></a>
            </div>

        </div>
        <div class="footerbottom">
            <p>Copyright &copy;2024 Designed by <span class="designer"><br>
                    Franchesko & Justin</span></p>
        </div>
    </footer>

    <!-- script bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>


</body>

</html>