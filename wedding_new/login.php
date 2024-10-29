<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>

    <!-- favicon -->
    <link
      rel="shortcut icon"
      href="assets/images/icons/logo.png"
      type="image/x-icon"
    />

    <!-- font awesome cdn for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <style>
    body {
      font-family: "Arial", sans-serif;
      background-image: url("assets/images/home/sign2.jpg");
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background-color: rgba(255, 255, 255, 0.8);
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 350px;
      margin-left: 5%;
    }

    h1 {
      color: #6b3e26;
      text-align: center;
      margin-bottom: 1.5rem;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #6b3e26;
    }

    input {
      width: 100%;
      padding: 0.5rem;
      margin-bottom: 0.5rem;
      border: 1px solid #6b3e26;
      border-radius: 4px;
      font-size: 1rem;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      background-color: #6b3e26;
      color: white;
      padding: 0.75rem;
      border: none;
      border-radius: 4px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #513020;
    }

    .forgot-password {
      text-align: right;
      margin-bottom: 1rem;
    }

    .forgot-password a {
      color: #6b3e26;
      text-decoration: none;
      font-size: 0.9rem;
    }

    p {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #6b3e26;
    }

    p a {
      color: #6b3e26;
      text-decoration: none;
      font-weight: bold;
    }

    .backBtn {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    .backBtn a {
      text-decoration: none;
      font-size: 18px;
      font-family: "Poppins", sans-serif;
      color: #ffffff;
      background-color: #6b3e26;
      padding: 10px 20px;
      border-radius: 25px;
      display: inline-block;
      transition: background-color 0.3s ease, transform 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .backBtn a i {
      margin-right: 8px;
    }

    .backBtn a:hover {
      background-color: #643922;
      transform: translateY(-3px);
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
    }

  </style>
  <body>
    <div class="login-container">
      <h1>MS Wedding</h1>
      <form id="loginForm" action="RegisterForm.php" method="post" onsubmit="return validateLoginForm()">
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" id="email" name="email" />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" />
        </div>
        <div class="forgot-password">
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" value="submit" name="signIn">Log In</button>
      </form>
      <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    </div>

    <div id="back" class="backBtn">
      <a href="index.php"
        ><i class="fa-solid fa-arrow-left"></i>Back to Home</a
      >
    </div>

    <script>
      function validateLoginForm() {
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();

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

        // password validation
        if (password === "") {
          Toast.fire({
            icon: "error",
            title: "Password is Required!",
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
