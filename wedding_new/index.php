<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MS Wedding</title>

    <!-- favicon -->
    <link
      rel="shortcut icon"
      href="assets/images/icons/logo.png"
      type="image/x-icon"
    />

    <!-- link css -->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- font awesome cdn for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <header class="menu-bar">
      <div class="menu-container">
        <h1 class="logo2">
          MS
          <span>Wedding<img src="assets/images/icons/logo1.png" alt="" /></span>
        </h1>
        <nav>
          <ul>
            <li>
              <a href="index.php" class="active">Home</a>
            </li>
            <li class="dropdown">
              <a href="">Catalog</a>
              <div class="dropdown-content">
                <a href="weddingPackage.php">Wedding Package</a>
                <a href="bridalGown.php">Bridal Gown</a>
                <a href="groomSuit.php">Groom Suit</a>
              </div>
            </li>
            <li>
              <a href="">about</a>
            </li>
            <li>
              <a href="contact.php">Contact</a>
            </li>
            <li>
              <div class="log_btn">
                <a href="login.php" class="btn_log">Log In</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <main>
      <!-- Hero section -->
      <section class="slider">
        <div class="slides">
          <!-- Radio buttons for manual navigation -->
          <input type="radio" name="radio-btn" id="radio1" />
          <input type="radio" name="radio-btn" id="radio2" />
          <input type="radio" name="radio-btn" id="radio3" />
          <input type="radio" name="radio-btn" id="radio4" />

          <!-- Slide images -->
          <div class="slide first">
            <img src="assets/images/home/h1.jpg" alt="Image 1" />
          </div>
          <div class="slide">
            <img src="assets/images/home/h4.jpg" alt="Image 2" />
          </div>
          <div class="slide">
            <img src="assets/images/home/h3.jpg" alt="Image 3" />
          </div>
          <div class="slide">
            <img src="assets/images/home/h2.jpg" alt="Image 4" />
          </div>

          <!-- Navigation buttons -->
          <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
          </div>
        </div>

        <!-- Manual navigation -->
        <div class="navigation-manual">
          <label for="radio1" class="manual-btn"></label>
          <label for="radio2" class="manual-btn"></label>
          <label for="radio3" class="manual-btn"></label>
          <label for="radio4" class="manual-btn"></label>
        </div>
      </section>

      <section class="features" id="services">
        <div class="container">
          <h2>Our Services</h2>
          <div class="feature-grid">
            <div class="feature">
              <h3>Bridal Gowns</h3>
              <figure>
                <img src="assets/images/icons/feature1.png" alt="img" />
              </figure>
              <p>Find your dream wedding dress from our extensive collection</p>
              <div>
                <a href="bridalGown.php" class="btn_hover2">View More</a>
              </div>
            </div>
            <div class="feature">
              <h3>Groom Suits</h3>
              <figure>
                <img src="assets/images/icons/feature5.png" alt="img" />
              </figure>
              <p>Find your atrractive wedding suits from our extensive collection</p>
              <div>
                <a href="groomSuit.php" class="btn_hover2">View More</a>
              </div>
            </div>
            <div class="feature">
              <h3>Custom Invitation</h3>
              <figure>
                <img src="assets/images/icons/feature2.png" alt="img" />
              </figure>
              <p>
                Let us craft your perfect day with personalized elegance of
                wedding Card
              </p>
              <div>
                <a href="invitation.php" class="btn_hover2">View More</a>
              </div>
            </div>
            <div class="feature">
              <h3>Wedding Planning</h3>
              <figure>
                <img src="assets/images/icons/feature3.png" alt="img" />
              </figure>
              <p>
                Let our experts help you plan everything runs smoothly for your
                special day
              </p>
              <div>
                <a href="weddingPackage.php" class="btn_hover2">View More</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="about-section">
        <div class="about-text">
          <h2>Our Story</h2>
          <p>
            At <span class="highlight">mswedding</span>, we believe in the beauty
            of unforgettable moments and timeless love stories. For years, we've
            been helping couples transform their dream weddings into
            breathtaking realities. Our dedicated team of planners and designers
            brings expertise, creativity, and passion to each event, ensuring
            that every detail is taken care of with precision.
          </p>
          <p>
            From the smallest personal touches to grand floral arrangements, we
            work with you to create a wedding experience that is uniquely yours.
            Whether it's a cozy intimate ceremony or a lavish celebration,
            <span class="highlight">mswedding</span> is here to turn your vision
            into a day you'll cherish forever.
          </p>
        </div>
        <div class="about-photo">
          <img
            src="assets/images/home/www3.jpg"
            alt="mswedding Wedding Planning"
          />
        </div>
      </section>

      <section id="inspirations" class="inspirations">
        <h2>Our Latest Inspirations</h2>
        <div class="card-container">
          <div class="card">
            <img src="assets/images/inspirations/john.jpg" alt="Wedding 1" />
            <h3>John & Mary</h3>
            <p>Package: Gold</p>
            <p>Place: Bali</p>
          </div>
          <div class="card">
            <img src="assets/images/inspirations/adam.jpg" alt="Wedding 2" />
            <h3>Adam & Eve</h3>
            <p>Package: Silver</p>
            <p>Place: Paris</p>
          </div>
          <div class="card">
            <img src="assets/images/inspirations/tom.jpg" alt="Wedding 3" />
            <h3>Tom & Jane</h3>
            <p>Package: Platinum</p>
            <p>Place: Hawaii</p>
          </div>
          <div class="card">
            <img src="assets/images/inspirations/Shan.jpeg" alt="Wedding 4" />
            <h3>Shan & Nisha</h3>
            <p>Package: Bronze</p>
            <p>Place: Colombo</p>
          </div>
          <div class="card">
            <img src="assets/images/inspirations/Mickey.jpg" alt="Wedding 5" />
            <h3>Mickey & Minnie</h3>
            <p>Package: Gold</p>
            <p>Place: Berlin</p>
          </div>
          <div class="card">
            <img src="assets/images/inspirations/ben.jpg" alt="Wedding 6" />
            <h3>Ben & Clara</h3>
            <p>Package: Classic</p>
            <p>Place: California</p>
          </div>
        </div>
      </section>

      <section id="testimonials" class="testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial-container">
          <div class="testimonial">
            <p>"Our wedding was magical thanks to the team!"</p>
            <h4>- Sarah & Michael</h4>
          </div>
          <div class="testimonial">
            <p>
              "Everything was beyond perfect, they handled it all beautifully."
            </p>
            <h4>- Emily & James</h4>
          </div>
          <div class="testimonial">
            <p>
              "The venue, the decorations, and the organization were spot on!"
            </p>
            <h4>- Alex & Sophia</h4>
          </div>
          <div class="testimonial">
            <p>"We felt stress-free as they managed everything with care."</p>
            <h4>- David & Emma</h4>
          </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="footer-container">
        <div class="logo-section">
          <img
            src="assets/images/icons/logo3.png"
            alt="Logo"
            class="logo"
          />
          <h2>MS Wedding</h2>
        </div>
        <div class="contact-info">
          <p>184 Temple Street, Pore,</p>
          <p>Athurugiriya, Colombo, 10200</p>
          <p>
            Email: <a href="mailto:msweddingt@gmail.com">mswedding@gmail.com</a>
          </p>
          <p>Phone: <a href="tel:011-2750714">011-2750714</a></p>
        </div>
      </div>
    </footer>

    <!-- Custom js -->
    <script src="assets/js/script.js"></script>

    <!-- customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
