<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>ITE Convention '25</title>
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
      <img src="assets/img/logo_new_main.png" alt="Your Conference Logo">
    </a>
    <ul class="nav-links">
      <li><a href="#about">About</a></li>
      <li><a href="#schedule">Schedule</a></li>
      <li><a href="#speakers">Speakers</a></li>
      <li><a href="#previous">Previous Conventions</a></li>
      <li><a href="#competitions">Competitions</a></li>
    </ul>
    <a href="signin.php" class="btn btn-ticket">Login</a>
  </nav>


  <!-- ======= HERO SECTION ======= -->
  <header class="hero-section" id="home">
    <div class="overlay"></div>
    <div class="hero-content">
      <img src="assets/img/logo_new_main.png" alt="Hero Logo" class="hero-logo" />
      <p>
        City. Date Range, 2025<br />
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
          <img src="assets/img/about-image.jpg" alt="About the Conference" />
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
          <p><strong>Date:</strong> April 2, 2024</p>
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
        <button class="tab" data-day="day2">Day 2<br>(Conference)</button>
        <button class="tab" data-day="day3">Day 3<br>(Closing)</button>
      </div>

      <!-- Day 1 Schedule -->
      <div class="schedule-content active" id="day1">
        <div class="schedule-item">
          <div class="time">08:00 - 09:00</div>
          <div class="details">
            <h3>Registration &amp; Coffee</h3>
            <p>Pick up your badges and enjoy a warm welcome.</p>
            <p><strong>Location:</strong> Lobby</p>
          </div>
        </div>
        <div class="schedule-item">
          <div class="time">09:00 - 09:30</div>
          <div class="details">
            <h3>Welcome Remarks</h3>
            <p>Opening words from our event coordinator.</p>
            <p><strong>Location:</strong> Main Hall</p>
          </div>
        </div>
        <div class="schedule-item">
          <div class="time">09:30 - 10:30</div>
          <div class="details">
            <h3>Keynote: The Future of Tech</h3>
            <p><strong>Speaker:</strong> Jane Smith</p>
            <p>Explore emerging trends and innovations in technology.</p>
            <p><strong>Location:</strong> Auditorium</p>
          </div>
          <div class="speaker-img">
            <img src="assets/img/speaker-2.jpg" alt="Jane Smith">
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
  </section>

  <!-- ======= SPEAKERS SECTION ======= -->
  <section class="speakers" id="speakers">
    <div class="container">
      <h2 class="section-title">
        <img src="assets/img/speaker banner.png" alt="Hero Logo" class="banners-speaker" />
      </h2>
      <div class="speakers-grid">
        <!-- Speaker Card 1 -->
        <div class="card">
          <img src="assets/img/speaker (1).jpg" alt="James Doe" class="card-img">
          <div class="card-body">
            <h3 class="card-title">James Doe</h3>
            <p class="card-text">Senior Software Developer</p>
            <p class="card-text">Angular Core Team</p>
            <a href="james-doe.html" class="card-link">Read more →</a>
          </div>
          <div class="card-footer">
            <ul class="social-list">
              <li><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Speaker Card 2 -->
        <div class="card">
          <img src="assets/img/speaker (2).jpg" alt="Sarah Doe" class="card-img">
          <div class="card-body">
            <h3 class="card-title">Sarah Doe</h3>
            <p class="card-text">Developer Advocate</p>
            <p class="card-text">Google</p>
            <a href="sarah-doe.html" class="card-link">Read more →</a>
          </div>
          <div class="card-footer">
            <ul class="social-list">
              <li><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Speaker Card 3 -->
        <div class="card">
          <img src="assets/img/speaker (1).jpg" alt="James Doe" class="card-img">
          <div class="card-body">
            <h3 class="card-title">James Doe</h3>
            <p class="card-text">Senior Software Developer</p>
            <p class="card-text">Angular Core Team</p>
            <a href="james-doe.html" class="card-link">Read more →</a>
          </div>
          <div class="card-footer">
            <ul class="social-list">
              <li><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Speaker Card 4 -->
        <div class="card">
          <img src="assets/img/speaker (2).jpg" alt="Sarah Doe" class="card-img">
          <div class="card-body">
            <h3 class="card-title">Sarah Doe</h3>
            <p class="card-text">Developer Advocate</p>
            <p class="card-text">Google</p>
            <a href="sarah-doe.html" class="card-link">Read more →</a>
          </div>
          <div class="card-footer">
            <ul class="social-list">
              <li><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Speaker Card 5 -->
        <div class="card">
          <img src="assets/img/speaker (1).jpg" alt="James Doe" class="card-img">
          <div class="card-body">
            <h3 class="card-title">James Doe</h3>
            <p class="card-text">Senior Software Developer</p>
            <p class="card-text">Angular Core Team</p>
            <a href="james-doe.html" class="card-link">Read more →</a>
          </div>
          <div class="card-footer">
            <ul class="social-list">
              <li><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Speaker Card 6 -->
        <div class="card">
          <img src="assets/img/speaker (2).jpg" alt="Sarah Doe" class="card-img">
          <div class="card-body">
            <h3 class="card-title">Sarah Doe</h3>
            <p class="card-text">Developer Advocate</p>
            <p class="card-text">Google</p>
            <a href="sarah-doe.html" class="card-link">Read more →</a>
          </div>
          <div class="card-footer">
            <ul class="social-list">
              <li><a href="#" class="social-link"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-linkedin"></i></a></li>
              <li><a href="#" class="social-link"><i class="fab fa-github"></i></a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </section>

  <div class="section-divider"></div>

  <!-- ======= PREVIOUS CONVENTIONS SECTION ======= -->
  <br><br>
  <section class="previous-conventions" id="previous">
    <div class="container">
      <h2 class="section-title">
        <img src="assets/img/prev banner.png" alt="Hero Logo" class="banners-about" />
      </h2>
      <div class="convention-grid">
        <!-- Convention 1 -->
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/kuG3uTCb5a4" frameborder="0" allowfullscreen></iframe>
          <div class="video-info">
            <h3>Convention 2023</h3>
            <p>Relive the highlights of our 2023 convention.</p>
            <a href="https://www.youtube.com/watch?v=kuG3uTCb5a4" target="_blank" class="video-link">Watch Recap →</a>
          </div>
        </div>

        <!-- Convention 2 -->
        <div class="video-card">
          <iframe src="https://www.youtube.com/embed/7BgRbv59hio" frameborder="0" allowfullscreen></iframe>
          <div class="video-info">
            <h3>Convention 2022</h3>
            <p>See what happened in 2022’s exciting event.</p>
            <a href="https://www.youtube.com/watch?v=7BgRbv59hio" target="_blank" class="video-link">Watch Recap →</a>
          </div>
        </div>

        <!-- Convention 3 -->
        <!-- Add more video cards as needed -->
      </div>
    </div>
  </section>

  <div class="section-divider"></div>
  <br>

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
            <a href="signin.php" class="register-btn">Register</a>
            <a href="guidelines.html#tower-building" class="guidelines-btn">View Guidelines</a>
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
            <a href="signin.php" class="register-btn">Register</a>
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
            <a href="signin.php" class="register-btn">Register</a>
            <a href="guidelines.html#line-follower" class="guidelines-btn">View Guidelines</a>
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
            <a href="signin.php" class="register-btn">Register</a>
            <a href="guidelines.html#sumobot" class="guidelines-btn">View Guidelines</a>
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
            <a href="signin.php" class="register-btn">Register</a>
            <a href="guidelines.html#quizbee" class="guidelines-btn">View Guidelines</a>
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
            <a href="signin.php" class="register-btn">Register</a>
            <a href="guidelines.html#coding" class="guidelines-btn">View Guidelines</a>
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
    <div class="dev-note">
      design made with 💜 by Serafin Gazzingan
      <br>jgazzingan@spup.edu.ph
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


</body>

</html>