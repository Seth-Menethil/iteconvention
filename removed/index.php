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

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> ITE Convention </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" href="./assets/icons/logo-spup.png" type="image/x-icon">

	<!-- CSS here -->
	<link rel="stylesheet" href="assets/import/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/import/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/import/css/slicknav.css">
    <link rel="stylesheet" href="assets/import/css/flaticon.css">
    <link rel="stylesheet" href="assets/import/css/gijgo.css">
	<link rel="stylesheet" href="assets/import/css/animate.min.css">
	<link rel="stylesheet" href="assets/import/css/magnific-popup.css">
	<link rel="stylesheet" href="assets/import/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="assets/import/css/themify-icons.css">
	<link rel="stylesheet" href="assets/import/css/slick.css">
	<link rel="stylesheet" href="assets/import/css/nice-select.css">
	<link rel="stylesheet" href="assets/import/css/style.css">
</head>
<body>
    <!-- ? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/import/img/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="index.php"><img style="width:95%;" src="assets/import/img/hero/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="./views/participantui.php">Participant Information</a></li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#sectionId">Events</a></li>
                                        <li><a href="./function/logout.php">Logout</a></li>
                                </nav>
                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
<main>
    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Making a Difference Globally</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s">ITE Convention for Innovation</h1>
                                <!-- Hero-btn -->
                                <div class="slider-btns">
                                    <a data-animation="fadeInLeft" data-delay="1.0s" href="#sectionId" class="btn hero-btn">View More</a>
                                        <i class="fas fa-play"></i></a>
                                    <p class="video-cap d-none d-sm-blcok" data-animation="fadeInRight" data-delay="1.0s">Story Vidoe<br> Watch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-9 col-sm-10">
                            <div class="hero__caption">
                                <span data-animation="fadeInLeft" data-delay=".1s">Committed to success</span>
                                <h1 data-animation="fadeInLeft" data-delay=".5s">Digital Conference For Designers</h1>
                                <!-- Hero-btn -->
                                <div class="slider-btns">
                                    <a data-animation="fadeInLeft" data-delay="1.0s" href="industries.html" class="btn hero-btn">Download</a>
                                    <a data-animation="fadeInRight" data-delay="1.0s" class="popup-video video-btn"  href="https://www.youtube.com/watch?v=up68UAfH0d0">
                                        <i class="fas fa-play"></i></a>
                                    <p class="video-cap d-none d-sm-blcok" data-animation="fadeInRight" data-delay="1.0s">Story Vidoe<br> Watch</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
        </div>
        <!-- Counter Section Begin>
        <div class="counter-section d-none d-sm-block">
            <div class="cd-timer" id="countdown" >
                <div class="cd-item">
                    <span>96</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>15</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>07</span>
                    <p>Min</p>
                </div>
                <div class="cd-item">
                    <span>02</span>
                    <p>Sec</p>
                </div>
            </div>
        </div>
        < Counter Section End -->
    </div>
    <!-- slider Area End-->
    <!--? About Law Start-->
    <section id="about" class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="about-caption mb-50 text-justify">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2 class="text-center">ITE Convention</h2>
                        </div>
                        <p>ITE Convention, formerly Cyber Summit is an Annual Event spear headed by SPUP-SITE department with different Themes each year. Participated in by Information Technology and Engineering Students, Teachers, Professionals and Practitioners, it aims to achieve a common goal rooted in collaboration, knowledge-sharing, and the pursuit of innovative solutions. It provides a unique platform for individuals to deepen their understanding of the ever-evolving cyber-landscape. Through keynote sessions, panel discussions, and interactive workshops, attendees gain insights into the latest threat vectors, innovative defense strategies, and emerging technologies. </p>
                        <p>St. Paul University Philippines invites you to be a part of this transformative journey. Explore our resources, stay updated on the latest cyber-trends, and join the conversation to contribute to a more secure and resilient digital world. </p>
                        <p>Together, let us empower ourselves, connect with like-minded individuals, and shape a future where cybersecurity is not just a priority but a shared commitment. </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-communications-1"></span>
                                </div>
                                <div class="caption">
                                    <h5>Where</h5>
                                    <p>Global Center, St. Paul University Philippines</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10">
                            <div class="single-caption mb-20">
                                <div class="caption-icon">
                                    <span class="flaticon-education"></span>
                                </div>
                                <div class="caption">
                                    <h5>When</h5>
                                    <p>Apr. 17-19 2024</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/import/img/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="assets/import/img/gallery/about1.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Law End-->
    <!--? gallery Products Start -->
    <!-- <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/import/img/gallery/1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/import/img/gallery/2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/import/img/gallery/3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/import/img/gallery/4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(assets/import/img/gallery/5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/import/img/gallery/6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- gallery Products End -->
    <!--? accordion -->
    <!-- gallery Products End -->
    <!--? Pricing Card Start -->
    <section id="sectionId" class="pricing-card-area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="section-tittle text-center mb-100">
                        <h2>Events And Competitions</h2>
                    </div>
                </div>
            </div>
            <div class="row">

            <?php
                $count = 0; // Initialize count to track cards in a row
                while ($row = mysqli_fetch_assoc($res2)) {
                    ?>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                        <div class="single-card text-center mb-30">
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
                            <div class="card-top">
                                <h4><?php echo $row['name']; ?></h4>
                            </div>
                            <div class="card-bottom">
                                <form action="./views/details2.php" method="POST" class="details_form text-center">
                                    <input type="hidden" name="program_id" value="<?php echo $row['program_id']; ?>">
                                    <button type="submit" value="Submit" name="details"
                                        class="btn details">Details</button>
                                </form> <br>
                                <form action="./views/register.php" method="POST" class="register_form text-center">
                                    <input type="hidden" name="program_id" value="<?php echo $row['program_id']; ?>">
                                    <button type="submit" value="Submit" name="register"
                                        class="btn btn-primary program_register">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php
                    $count++;
                    if ($count % 3 == 0) {
                        // If four cards are reached, close the row and start a new one
                        echo '</div><div class="row">';
                    }
                }
                ?>


                <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-10">
                    <div class="single-card text-center mb-30">
                        <div class="card-top">
                            <h4>MOBILE LEGENDS COMPETITION</h4>
                        </div>
                        <div class="card-bottom">
                            <ul>
                                <li>DESCRIPTION HERE</li>
                            </ul>
                            <a href="#" class="black-btn">Register</a>
                        </div>
                    </div>
                </div> -->




            </div>
        </div>
    </section>
    <!-- Pricing Card End -->
    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle text-center">
                                <h4>Contact Info</h4>
                                <ul>
                                    <li>
                                        <p>Address :Mabini Street, Ugac Norte, Tuguegarao City, Philippines:</p>
                                    </li>
                                    <li><a href="#">Phone : (078) 396-1987 to 1997</a></li>
                                    <li><a href="#">Email : mkummer@spup.edu.ph</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
               <!--  -->
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-8 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-4">
                             <div class="footer-social f-right">
                                <a target="_blank" href="https://www.facebook.com/StPaulUniversityPhilippines/"><i class="fab fa-facebook-f"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>

        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="./assets/import/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="./assets/import/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="./assets/import/js/popper.min.js"></script>
    <script src="./assets/import/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="./assets/import/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="./assets/import/js/owl.carousel.min.js"></script>
    <script src="./assets/import/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="./assets/import/js/wow.min.js"></script>
    <script src="./assets/import/js/animated.headline.js"></script>
    <script src="./assets/import/js/jquery.magnific-popup.js"></script>

    <!-- Date Picker -->
    <script src="./assets/import/js/gijgo.min.js"></script>
    <!-- Nice-select, sticky -->
    <script src="./assets/import/js/jquery.nice-select.min.js"></script>
    <script src="./assets/import/js/jquery.sticky.js"></script>
    
    <!-- counter , waypoint -->
    <script src="./assets/import/js/jquery.counterup.min.js"></script>
    <script src="./assets/import/js/waypoints.min.js"></script>
    <script src="./assets/import/js/jquery.countdown.min.js"></script>
    <!-- contact js -->
    <script src="./assets/import/js/contact.js"></script>
    <script src="./assets/import/js/jquery.form.js"></script>
    <script src="./assets/import/js/jquery.validate.min.js"></script>
    <script src="./assets/import/js/mail-script.js"></script>
    <script src="./assets/import/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="./assets/import/js/plugins.js"></script>
    <script src="./assets/import/js/main.js"></script>
    
    </body>
</html>