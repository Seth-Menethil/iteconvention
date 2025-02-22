<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>ITE Convention '25</title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
  <!-- Include fonts, icons, and CSS resets if you like -->
  <link rel="stylesheet" href="assets/style/main.css" />
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
  <!-- Navbar -->
  <nav class="navbar">
    <a href="#home" class="logo">
      <img src="assets/img/logo_new.png" alt="Your Conference Logo">
    </a>
    <ul class="nav-links">
      <li><a href="#about">About</a></li>
      <li><a href="#schedule">Schedule</a></li>
      <li><a href="#speakers">Speakers</a></li>
      <!-- <li><a href="#previous">Previous Conventions</a></li> -->
      <li><a href="#competitions">Competitions</a></li>
    </ul>
    <a href="signin.php" class="btn btn-ticket">Login</a>
  </nav>


  <!-- ======= HERO SECTION ======= -->
  <header class="hero-section" id="home">
    <div class="overlay"></div>
    <div class="hero-content">
      <img src="assets/img/logo_new.png" alt="Hero Logo" class="hero-logo" />
      <p>
        St. Paul University Philippines, Global Center. <br> March 26-28, 2025<br />
        Join the community, learn new things!
      </p>
      <div class="hero-buttons">
        <a href="#competitions" class="btn btn-ticket">Register for Events</a>
      </div>
    </div>
  </header>

  <!-- ======= ABOUT SECTION ======= -->
  <section class="about" id="about">
    <div class="container">
      <!-- Header -->
      <img src="assets/img/about banner.png" alt="Hero Logo" class="banners-about" />
      <p class="section-description">
        Join us for an incredible experience filled with insights, innovation, and networking opportunities. Our
        conference brings together industry leaders, professionals, and enthusiasts to share knowledge, inspire
        creativity, and foster collaboration.
      </p>

      <!-- About Details -->
      <div class="about-details">
        <div class="about-image">
          <img src="assets/img/solo.png" alt="About the Conference" />
        </div>
        <div class="about-text">
          <p>
            This event will feature keynote speeches, panel discussions, hands-on workshops, and exciting networking
            opportunities. Whether you're a seasoned professional or just starting your journey, this conference is the
            perfect place to connect with like-minded individuals and explore the latest trends in the industry.
          </p>
          <p>
            Don't miss out on this chance to be a part of something great. We look forward to welcoming you!
          </p>
        </div>
      </div>

      <!-- Location and Date -->
      <div class="conference-info">
        <div class="info-item">
          <i class="fas fa-map-marker-alt info-icon"></i>
          <p><strong>Location:</strong> St. Paul University Philippines, Tuguegarao City, Cagayan</p>
        </div>
        <div class="info-item">
          <i class="fas fa-calendar-alt info-icon"></i>
          <p><strong>Date:</strong> March 26-28, 2025</p>
        </div>
      </div>
    </div>
  </section>

  <div class="section-divider"></div>

  <!-- ======= SCHEDULE SECTION ======= -->
  <br><br>
  <section id="schedule" class="schedule-section">
    <div class="container">
      <h2 class="section-title">
        <img src="assets/img/sched banner.png" alt="Hero Logo" class="banners-speaker" />
      </h2>
      <div class="tabs">
        <button class="tab active" data-day="day1">Day 1<br>(Registration)</button>
        <!-- <button class="tab" data-day="day2">Day 2<br>(Conference)</button>
        <button class="tab" data-day="day3">Day 3<br>(Closing)</button> -->
      </div>

      <div class="schedule-container">
        <!-- Day 1 Schedule -->
        <div class="schedule-content active" id="day1">
          <div class="schedule-item">
            <div class="time">08:30 - 09:30</div>
            <div class="details">
              <h3>Eucharistic Celebration</h3>
              <p><strong>Location:</strong> Our Lady of Chartres Chapel</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">09:30 - 12:00</div>
            <div class="details">
              <h3>Registration</h3>
              <p><strong>Location:</strong> Main Hall</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">01:30 - 01:40</div>
            <div class="details">
              <h3>Opening Prayer</h3>
              <p><strong>Performed by:</strong> SPUP CHORALE</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">01:40 - 01:50</div>
            <div class="details">
              <h3>National Anthem</h3>
              <p><strong>Performed by:</strong> SPUP CHORALE</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">01:50 - 02:00</div>
            <div class="details">
              <h3>Intermission Number</h3>
              <p><strong>Performed by:</strong> Selected Students</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">02:00 - 02:10</div>
            <div class="details">
              <h3>Acknowledgement of Participants</h3>
              <p><strong>Speaker:</strong> Marifel Grace C. Kummer, DIT</p>
              <p><strong>Position:</strong> Dean, School of Information Technology and Engineering</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">02:10 - 02:20</div>
            <div class="details">
              <h3>ITE Convention 2025 Rationale</h3>
              <p><strong>Speaker:</strong> Sheena G. Gumarang, DIT</p>
              <p><strong>Position:</strong> Chairman, ITE Convention 2025</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">02:20 - 02:30</div>
            <div class="details">
              <h3>Welcome Address</h3>
              <p><strong>Speaker:</strong> Sister Merceditas O. Ang, SPC</p>
              <p><strong>Position:</strong> University President, St. Paul University Philippines</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">02:30 - 02:40</div>
            <div class="details">
              <h3>Introduction of the Keynote Speaker</h3>
              <p><strong>Speaker:</strong> Ma. Visitacion N. Gumabay, DIT</p>
              <p><strong>Position:</strong> Program Coordinator for Information Technology</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">02:40 - 03:10</div>
            <div class="details">
              <h3>Keynote Speech</h3>
              <p><strong>Speaker:</strong> Dr. Julieta M. Paras, CESO III</p>
              <p><strong>Position:</strong> Director IV, Commission on Higher Education Region 02</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">03:10 - 03:20</div>
            <div class="details">
              <h3>Special Message</h3>
              <p><strong>Speaker:</strong> Engr. Pinky T. Jimenez, PECE, PH.D.</p>
              <p><strong>Position:</strong> Director IV - Region 2, Department of Information and Communications
                Technology</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">03:20 - 03:30</div>
            <div class="details">
              <h3>Awarding of Certificate of Appreciation</h3>
              <p><strong>Presented by:</strong> Sister Merceditas O. Ang, SPC & Dr. Agripina Maribbay</p>
              <p><strong>Positions:</strong> University President & Vice President for Academics, St. Paul University
                Philippines</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">03:30 - 03:40</div>
            <div class="details">
              <h3>Introduction of Plenary Speaker</h3>
              <p><strong>Speaker:</strong> Engr. Nova R. Domingo, DPA</p>
              <p><strong>Position:</strong> Faculty, School of Information Technology and Engineering</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">03:40 - 04:10</div>
            <div class="details">
              <h3>Topic 1: Artificial Intelligence & Robotics</h3>
              <p><strong>Speaker:</strong> Engr. Eric Jude S. Soliman</p>
              <p><strong>Position:</strong> President/CEO, Hytec Power Inc</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">04:10 - 04:20</div>
            <div class="details">
              <h3>Awarding of Certificate of Appreciation</h3>
              <p><strong>Presented by:</strong> Sister Merceditas O. Ang, SPC & Dr. Agripina Maribbay</p>
              <p><strong>Positions:</strong> University President & Vice President for Academics, St. Paul University
                Philippines</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">04:20 - 04:30</div>
            <div class="details">
              <h3>Introduction of Plenary Speaker</h3>
              <p><strong>Speaker:</strong> Engr. Christian Cabuatan</p>
              <p><strong>Position:</strong> Faculty, School of Information Technology and Engineering</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">04:30 - 05:00</div>
            <div class="details">
              <h3>Topic 2: Climate Change and Renewable Energy</h3>
              <p><strong>Speaker:</strong> Dr. Mary Jane Calagui</p>
              <p><strong>Position:</strong> Professor V, Cagayan State University - Carig Campus</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">05:00 - 05:30</div>
            <div class="details">
              <h3>Open Forum</h3>
              <p><strong>Location:</strong> Main Hall</p>
            </div>
          </div>
        </div>

        <!-- Day 2 Schedule -->
        <div class="schedule-content" id="day2">
          <div class="schedule-item">
            <div class="time">08:30 - 09:00</div>
            <div class="details">
              <h3>Morning Coffee &amp; Networking</h3>
              <p>Meet and greet fellow participants.</p>
              <p><strong>Location:</strong> Networking Lounge</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">09:00 - 10:00</div>
            <div class="details">
              <h3>Session 1: Innovations in Software Development</h3>
              <p><strong>Speaker:</strong> John Doe</p>
              <p>Dive into modern development practices and agile methodologies.</p>
              <p><strong>Location:</strong> Conference Room A</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">10:00 - 10:30</div>
            <div class="details">
              <h3>Break</h3>
              <p>Refreshments provided.</p>
              <p><strong>Location:</strong> Expo Area</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">10:30 - 12:00</div>
            <div class="details">
              <h3>Workshop: Hands-on with New Tools</h3>
              <p>Interactive session exploring the latest software tools.</p>
              <p><strong>Location:</strong> Workshop Room</p>
            </div>
          </div>
        </div>

        <!-- Day 3 Schedule -->
        <div class="schedule-content" id="day3">
          <div class="schedule-item">
            <div class="time">09:00 - 09:30</div>
            <div class="details">
              <h3>Morning Recap &amp; Coffee</h3>
              <p>Reflect on the previous days and enjoy a light breakfast.</p>
              <p><strong>Location:</strong> Lobby</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">09:30 - 10:30</div>
            <div class="details">
              <h3>Panel Discussion: Industry Leaders</h3>
              <p>Experts share insights on the state and future of tech.</p>
              <p><strong>Location:</strong> Main Hall</p>
            </div>
          </div>
          <div class="schedule-item">
            <div class="time">10:30 - 11:00</div>
            <div class="details">
              <h3>Closing Remarks</h3>
              <p>Final thoughts and thank-yous from the organizers.</p>
              <p><strong>Location:</strong> Main Hall</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="section-divider"></div>
  <!-- ======= SPEAKERS SECTION ======= -->
  <br><br>
  <section class="speakers-section" id="speakers">
    <h2 class="section-title">
      <img src="assets/img/speaker banner.png" alt="Hero Logo" class="banners-speaker" />
    </h2>
    <p class="speakers-description">
      Meet the ITE Con 2025 speakers participating in this regional convention.
    </p>

    <div class="carousel-container">
      <div class="carousel">
        <div class="speaker-card">
          <img src="assets/img/place.png" alt="Randi Zuckerberg" class="speaker-img">
          <div class="speaker-info">
            <h3 class="speaker-name">Engr. Eric Jude S. Soliman</h3>
            <p class="speaker-title">President/CEO, Hytec Power Inc.</p>
          </div>
        </div>

        <div class="speaker-card">
          <img src="assets/img/place.png" alt="Randi Zuckerberg" class="speaker-img">
          <div class="speaker-info">
            <h3 class="speaker-name">Dr. Mary Jane Calagui</h3>
            <p class="speaker-title">Founder & CEO, Zuckerberg Media and HUG</p>
          </div>
        </div>

        <div class="speaker-card">
          <img src="assets/img/place.png" alt="Engr. Godofredo T. Avena" class="speaker-img">
          <div class="speaker-info">
            <h3 class="speaker-name">Engr. Godofredo T. Avena</h3>
            <p class="speaker-title">Head of Software Development, Academic Technology-Philippines Cambridge
              University Press and Assessment </p>
          </div>
        </div>

        <div class="speaker-card">
          <img src="assets/img/place.png" alt="Dr. Joey Aviles" class="speaker-img">
          <div class="speaker-info">
            <h3 class="speaker-name">Dr. Joey Aviles</h3>
            <p class="speaker-title">Professor, Angeles University Foundation</p>
          </div>
        </div>

        <div class="speaker-card">
          <img src="assets/img/place.png" alt="Engr. Kingston S. Dela Cruz" class="speaker-img">
          <div class="speaker-info">
            <h3 class="speaker-name">Engr. Kingston S. Dela Cruz</h3>
            <p class="speaker-title">Department Head, Provincial Engineer’s Office</p>
          </div>
        </div>

        <div class="speaker-card">
          <img src="assets/img/place.png" alt="Juanito D. Cunanan, F.ASEP., F.PICE." class="speaker-img">
          <div class="speaker-info">
            <h3 class="speaker-name">Juanito D. Cunanan, F.ASEP., F.PICE.</h3>
            <p class="speaker-title">ASEP Past President, ASEP</p>
          </div>
        </div>


      </div>

      <div class="carousel-controls">
        <button class="control-btn prev-btn">←</button>
        <button class="control-btn next-btn">→</button>
      </div>
    </div>

    <div class="carousel-nav"></div>
  </section>

  <div class="section-divider"></div>

  <!-- ======= PREVIOUS CONVENTIONS SECTION ======= -->
  <!-- <br><br>
  <section class="previous-conventions" id="previous">
    <div class="container">
      <h2 class="section-title">
        <img src="assets/img/prev banner.png" alt="Hero Logo" class="banners-about" />
      </h2>
      <div class="convention-grid"> -->
  <!-- Convention 1 -->
  <!-- <div class="video-card">
          <iframe src="https://www.youtube.com/embed/kuG3uTCb5a4" frameborder="0" allowfullscreen></iframe>
          <div class="video-info">
            <h3>Convention 2023</h3>
            <p>Relive the highlights of our 2023 convention.</p>
            <a href="https://www.youtube.com/watch?v=kuG3uTCb5a4" target="_blank" class="video-link">Watch Recap →</a>
          </div>
        </div> -->

  <!-- Convention 2 -->
  <!-- <div class="video-card">
          <iframe src="https://www.youtube.com/embed/7BgRbv59hio" frameborder="0" allowfullscreen></iframe>
          <div class="video-info">
            <h3>Convention 2022</h3>
            <p>See what happened in 2022’s exciting event.</p>
            <a href="https://www.youtube.com/watch?v=7BgRbv59hio" target="_blank" class="video-link">Watch Recap →</a>
          </div>
        </div> -->

  <!-- Convention 3 -->
  <!-- Add more video cards as needed -->
  <!-- </div>
    </div>
  </section> -->

  <!-- <div class="section-divider"></div> -->
  <br><br>

  <!-- ======= COMPETITIONS SECTION ======= -->
  <section class="competitions" id="competitions">
    <div class="container">
      <h2 class="section-title">
        <img src="assets/img/comp banner.png" alt="Hero Logo" class="banners-speaker" />
      </h2>
      <p class="section-subtitle">
        Register and compete in various challenges!<br>
        Please <a href="signin.php">log in</a> to register.
      </p>
      <div class="competition-grid">
        <!-- Competition Card 1: ITE-CON-INNOVATE -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-lightbulb"></i>
          </div>
          <h3>ITE-CON-INNOVATE</h3>
          <p>A research-based project presentation on tech innovation.</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="40">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form>
            <a href="guidelines.html#ite-con" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 2: Mobile Legends -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-gamepad"></i>
          </div>
          <h3>Mobile Legends</h3>
          <p>Join the ultimate 5v5 tournament!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="41">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form>
            <a href="guidelines.html#mobile-legends" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 3: Tower Building -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-building"></i>
          </div>
          <h3>Tower Building</h3>
          <p>For engineering participants. Test your building skills!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="42">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form> <a href="guidelines.html#tower-building" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 4: Bridge Building -->
        <div class="competition-card">
          <div class="icon">
            <i class="fa-solid fa-weight-hanging"></i>
          </div>
          <h3>Bridge Building</h3>
          <p>For engineering participants. Build and test your bridges!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="43">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form>
            <a href="guidelines.html#bridge-building" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 5: Line Follower Robot -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-robot"></i>
          </div>
          <h3>Line Follower Robot</h3>
          <p>For Computer Science participants. Build and program a line-following robot!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="44">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form> <a href="guidelines.html#line-follower" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 6: Sumobot -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-microchip"></i>
          </div>
          <h3>Sumobot</h3>
          <p>For Computer Science participants. Battle with your robot!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="45">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form> <a href="guidelines.html#sumobot" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 7: Quizbee for Engineering -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <h3>Quizbee for Engineering</h3>
          <p>For Civil Engineering participants. Test your knowledge!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="46">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form> <a href="guidelines.html#quizbee" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>

        <!-- Competition Card 8: Coding Competition -->
        <div class="competition-card">
          <div class="icon">
            <i class="fas fa-code"></i>
          </div>
          <h3>Coding Competition</h3>
          <p>For IT participants. Test your coding skills!</p>
          <div class="button-group">
            <form action="details.php" method="POST" class="register_form text-center">
              <input type="hidden" name="program_id" value="47">
              <button type="submit" value="Submit" name="register" class="register-btn">Details</button>
            </form> <a href="guidelines.html#coding" class="guidelines-btn">View Guidelines</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer-container container">
      <!-- Left Side: University Logos & Info -->
      <div class="footer-left">
        <div class="footer-logos">
          <img src="assets/img/unilogo2.png" alt="University Logo 1">
          <img src="assets/img/unilogo1.png" alt="University Logo 1">
          <!-- If you have multiple logos, add more <img> tags -->
          <div class="uni-info">
            <p>St. Paul University Philippines</p>
            <p>School of Information Technology and Engineering</p>
            <p>Mabini Street, Tuguegarao City, Cagayan 2500</p>
          </div>
        </div>

      </div>

      <!-- Right Side: Links & Social Media -->
      <div class="footer-right">
        <div class="footer-links">
          <a href="contact.html">Contact</a>
          <a href="privacy.html">Privacy Policy</a>
          <a href="terms.html">Terms of Service</a>
        </div>
        <div class="footer-social">
          <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
          <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>

    <!-- Developer Note -->
    <!-- <div class="dev-note">
      developed with a 💜 by Serafin Gazzingan & Justin Tan
      <br>jgazzingan@spup.edu.ph | jtan@spup.edu.ph
    </div> -->
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
    document.addEventListener('DOMContentLoaded', function () {
      // Hide navbar on scroll down past hero and show on scroll up
      let lastScrollTop = 0;
      const heroSection = document.querySelector('.hero-section');
      const heroHeight = heroSection ? heroSection.offsetHeight : 0;
      const navbar = document.querySelector('.navbar');

      window.addEventListener('scroll', function () {
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
    document.addEventListener('DOMContentLoaded', () => {
      const carousel = document.querySelector('.carousel');
      const container = document.querySelector('.carousel-container');
      const cards = document.querySelectorAll('.speaker-card');
      const prevBtn = document.querySelector('.prev-btn');
      const nextBtn = document.querySelector('.next-btn');
      const navContainer = document.querySelector('.carousel-nav');

      // Variables for tracking drag
      let isDragging = false;
      let startX;
      let startScrollLeft;
      let autoScrollInterval;
      let cardWidth = cards[0].offsetWidth + 24; // Width + gap
      let scrollPosition = 0;
      let currentPage = 0;

      // Calculate how many cards to show based on container width
      const calcCardsPerView = () => {
        return Math.floor(container.offsetWidth / cardWidth);
      };

      // Calculate number of "pages" for navigation dots
      const calculatePages = () => {
        const cardsPerView = calcCardsPerView();
        return Math.ceil(cards.length / cardsPerView);
      };

      // Create pagination dots
      const createPaginationDots = () => {
        navContainer.innerHTML = '';
        const totalPages = calculatePages();

        for (let i = 0; i < totalPages; i++) {
          const dot = document.createElement('div');
          dot.classList.add('carousel-dot');
          if (i === 0) dot.classList.add('active');

          dot.addEventListener('click', () => {
            currentPage = i;
            scrollToPage(i);
            updateActiveDot();
          });

          navContainer.appendChild(dot);
        }
      };

      // Update active dot based on current page
      const updateActiveDot = () => {
        const dots = document.querySelectorAll('.carousel-dot');
        dots.forEach((dot, index) => {
          if (index === currentPage) {
            dot.classList.add('active');
          } else {
            dot.classList.remove('active');
          }
        });
      };

      // Scroll to specific page
      const scrollToPage = (pageIndex) => {
        const cardsPerView = calcCardsPerView();
        scrollPosition = pageIndex * cardsPerView * cardWidth;
        carousel.style.transform = `translateX(-${scrollPosition}px)`;
        currentPage = pageIndex;
        updateActiveDot();
      };

      // Start auto-scrolling
      const startAutoScroll = () => {
        stopAutoScroll(); // Clear any existing interval
        autoScrollInterval = setInterval(() => {
          const totalPages = calculatePages();
          currentPage = (currentPage + 1) % totalPages;
          scrollToPage(currentPage);
        }, 5000); // Auto scroll every 5 seconds
      };

      // Stop auto-scrolling
      const stopAutoScroll = () => {
        if (autoScrollInterval) {
          clearInterval(autoScrollInterval);
        }
      };

      // Initialize carousel and dots
      const initCarousel = () => {
        cardWidth = cards[0].offsetWidth + 24; // Recalculate with current dimensions
        createPaginationDots();
        scrollToPage(0);
        startAutoScroll();
      };

      // Mouse events for dragging
      const dragStart = (e) => {
        isDragging = true;
        container.classList.add('dragging');
        startX = e.pageX || e.touches[0].pageX;
        startScrollLeft = scrollPosition;
        stopAutoScroll();
      };

      const dragging = (e) => {
        if (!isDragging) return;
        const x = e.pageX || e.touches[0].pageX;
        const delta = startX - x;
        const newPosition = startScrollLeft + delta;

        // Limit scrolling to prevent empty space
        const maxScroll = carousel.scrollWidth - container.offsetWidth;
        scrollPosition = Math.max(0, Math.min(newPosition, maxScroll));

        carousel.style.transform = `translateX(-${scrollPosition}px)`;

        // Update current page based on scroll position
        const cardsPerView = calcCardsPerView();
        currentPage = Math.round(scrollPosition / (cardsPerView * cardWidth));
        updateActiveDot();

        e.preventDefault();
      };

      const dragStop = () => {
        isDragging = false;
        container.classList.remove('dragging');

        // Snap to nearest page
        const cardsPerView = calcCardsPerView();
        currentPage = Math.round(scrollPosition / (cardsPerView * cardWidth));
        scrollToPage(currentPage);

        // Resume auto-scrolling after a brief pause
        setTimeout(startAutoScroll, 2000);
      };

      // Button navigation handlers
      nextBtn.addEventListener('click', () => {
        const totalPages = calculatePages();
        currentPage = (currentPage + 1) % totalPages;
        scrollToPage(currentPage);
        stopAutoScroll();
        setTimeout(startAutoScroll, 2000);
      });

      prevBtn.addEventListener('click', () => {
        const totalPages = calculatePages();
        currentPage = (currentPage - 1 + totalPages) % totalPages;
        scrollToPage(currentPage);
        stopAutoScroll();
        setTimeout(startAutoScroll, 2000);
      });

      // Mouse event listeners
      container.addEventListener('mousedown', dragStart);
      container.addEventListener('mousemove', dragging);
      container.addEventListener('mouseup', dragStop);
      container.addEventListener('mouseleave', dragStop);

      // Touch event listeners for mobile
      container.addEventListener('touchstart', dragStart);
      container.addEventListener('touchmove', dragging);
      container.addEventListener('touchend', dragStop);

      // Handle window resize
      window.addEventListener('resize', () => {
        // Wait for resize to complete
        clearTimeout(window.resizeTimer);
        window.resizeTimer = setTimeout(() => {
          cardWidth = cards[0].offsetWidth + 24;
          createPaginationDots();
          scrollToPage(0);
          currentPage = 0;
        }, 250);
      });

      // Initialize
      initCarousel();
    });
  </script>


</body>

</html>