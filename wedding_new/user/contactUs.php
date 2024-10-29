<?php 
session_start();
include("../connectdb.php");
?>
<?php
  $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
  $row_count = mysqli_num_rows($select_rows);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>

    <!-- favicon -->
    <link
      rel="shortcut icon"
      href="../assets/images/icons/logo.png"
      type="image/x-icon"
    />

    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/contact.css" />

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
          <span>Wedding<img src="../assets/images/icons/logo1.png" alt="" /></span>
        </h1>
        <nav>
          <ul>
            <li>
              <a href="homepage.php" class="active">Home</a>
            </li>
            <li class="dropdown">
              <a href="">Catalog</a>
              <div class="dropdown-content">
                <a href="weddingPackageUs.php">Wedding Package</a>
                <a href="bridalGownUs.php">Bridal Gown</a>
                <a href="groomSuitUs.php">Groom Suit</a>
              </div>
            </li>
            <li>
              <a href="">about</a>
            </li>
            <li>
                <a href="contactUs.php">Contact</a>
            </li>
            <li>
                <p style="color: #7436bb; font-size: 16px; font-weight: 700; padding: 0 20px">Hi, <?php
                    if(isset($_SESSION['email'])){
                        $email=$_SESSION['email'];
                        $query=mysqli_query($conn, "SELECT user. * FROM `user` WHERE user.email='$email'");
                        while($row=mysqli_fetch_array($query)){
                            echo $row['name'];
                        }
                    }
                    ?>
                    <a href="cart.php"><i class="fa-solid fa-shopping-cart" style="color: #7436bb; font-size:20px;" ></i>
                      <span class="cart-num"><?php echo $row_count; ?></span>
                    </a>
                </p>
            </li>
            <li>
              <div class="log_btn">
                <a href="../logout.php" class="btn_log">Log Out</a>
              </div>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <section class="contactUs">
      <div class="container">
        <div class="contactInfo">
          <div>
            <h2>Contact Info</h2>
            <ul class="info">
              <li>
                <span><i class="fa-solid fa-map-marker"></i></span>
                <span
                  >184 Temple Street, Pore<br />
                  Athurugiriya, Colombo<br />
                  10200</span
                >
              </li>
              <li>
                <span><i class="fa-solid fa-envelope"></i></span>
                <span
                  ><a href="mailto: mswedding@gmail.com"
                    >mswedding@gmail.com</a
                  ></span
                >
              </li>
              <li>
                <span><i class="fa-solid fa-phone"></i></span>
                <span>011-2750714</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="contactForm">
          <h2>Send a Message</h2>
          <form action="RegisterForm.php" method="post" onsubmit="return validateContactForm()" class="formBox">
            <div class="inputBox w50">
              <input type="text" id="firstName" name="firstName" />
              <span>First Name</span>
            </div>
            <div class="inputBox w50">
              <input type="text" id="lastName" name="lastName" />
              <span>Last Name</span>
            </div>
            <div class="inputBox w50">
              <input type="email" id="email" name="email" />
              <span>Email Address</span>
            </div>
            <div class="inputBox w50">
              <input type="text" id="phone" name="phone" />
              <span>Mobile Number</span>
            </div>
            <div class="inputBox w100">
              <textarea id="message" name="message"></textarea>
              <span>Write your message here...</span>
            </div>
            <div class="inputBox w100">
              <input type="submit" value="Send" name="contactUp" />
            </div>
          </form>
        </div>
      </div>
    </section>

    <footer>
      <div class="footer-container">
        <div class="logo-section">
          <img
            src="../assets/images/icons/logo3.png"
            alt="mswedding Logo"
            class="logo"
          />
          <h2>mswedding</h2>
        </div>
        <div class="contact-info">
          <p>184 Temple Street, Pore,</p>
          <p>Athurugiriya, Colombo, 10200</p>
          <p>
            Email: <a href="mailto:mswedding@gmail.com">mswedding@gmail.com</a>
          </p>
          <p>Phone: <a href="tel:011-2750714">011-2750714</a></p>
        </div>
      </div>
    </footer> 
      <script>
        // Function to validate contact form
        function validateContactForm() {
          // Get form field values
          const fname = document.getElementById("firstName").value.trim();
          const lname = document.getElementById("lastName").value.trim();
          const phone = document.getElementById("phone").value.trim();
          const email = document.getElementById("email").value.trim();
          const message = document.getElementById("message").value.trim();

          //Get the custom popup boxes
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            },
          });

          // Name validation
          if (fname === "") {
            Toast.fire({
            icon: "error",
            title: "First Name is Required!",
            });
            return false;
          }

          // Name validation
          if (lname === "") {
            Toast.fire({
            icon: "error",
            title: "Last Name is Required!",
            });
            return false;
          }

          // Email validation
          const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

          if (email === "") {
            Toast.fire({
            icon: "error",
            title: "Email address is Required!",
            });
            return false;
          }

          if (!emailPattern.test(email)) {
            Toast.fire({
            icon: "error",
            title: "Please enter a valid email address!",
            });
            return false;
          }

          // Phone validation (basic pattern for international numbers, adjust as necessary)
          const phonePattern = /^\+94[0-9]{9}$/;

          if (phone === "") {
            Toast.fire({
            icon: "error",
            title: "Phone Number is Required!",
            });
            return false;
          }

          if (!phonePattern.test(phone)) {
            Toast.fire({
            icon: "error",
            title: "Please enter a valid phone number!",
            });
            return false;
          }

          // Message validation
          if (message === "") {
            Toast.fire({
            icon: "error",
            title: "Message is Required!",
            });
            return false;
          }

          // If all validations pass, allow form submission
            return true;   
        }
      </script>

      <!-- customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
