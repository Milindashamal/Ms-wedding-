<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Form</title>

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

    <style>
      body {
        font-family: Arial, sans-serif;
        background-image: url("assets/images/home/log1.jpg");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: flex-start;
        align-items: center;
      }

      .container {
        width: 400px;
        margin-left: 5%;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h1 {
        text-align: center;
        color: #ff69b4;
        font-size: 24px;
        margin-bottom: 10px;
      }

      h2 {
        text-align: center;
        color: #333;
        font-size: 28px;
        margin-bottom: 20px;
      }

      .form-group {
        margin-bottom: 15px;
      }

      label {
        display: block;
        margin-bottom: 5px;
        color: #666;
        font-size: 16px;
      }

      input,
      select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
      }

      button {
        width: 100%;
        padding: 10px;
        background-color: #ff69b4;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
      }

      button:hover {
        background-color: #ff1493;
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
        background-color: #ff69b4;
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
        background-color: #ff1493;
        transform: translateY(-3px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>MS Wedding</h1>
      <h2>Register</h2>
      <form id="registrationForm" action="RegisterForm.php" method="post" onsubmit="return validateRegisterForm()">
        <div class="form-group">
          <label for="fullname">Name:</label>
          <input type="text" id="fullname" name="fullname" />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" id="email" name="email" />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" />
        </div>
        <div class="form-group">
          <label for="weddingdate">Wedding Date:</label>
          <input type="date" id="weddingdate" name="weddingdate" />
        </div>
        <div class="form-group">
          <label for="servicetype">Service Type:</label>
          <select id="servicetype" name="servicetype">
            <option value="">Select a service</option>
            <option value="bridal">Bridal Gown</option>
            <option value="groom">Groom Attire</option>
            <option value="planning">Wedding Planning</option>
          </select>
        </div>
        <button type="submit" value="sign Up" name="signUp">Register</button>
      </form>
    </div>

    <div id="back" class="backBtn">
      <a href="login.php"
        ><i class="fa-solid fa-arrow-left"></i>Back to Login</a
      >
    </div>

    <script>
      function validateRegisterForm() {
        const name = document.getElementById("fullname").value.trim();
        const email = document.getElementById("email").value.trim();
        const password = document.getElementById("password").value.trim();
        const date = document.getElementById("weddingdate").value.trim();
        const service = document.getElementById("servicetype").value.trim();

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
        if (name === "") {
          Toast.fire({
            icon: "error",
            title: "Name is Required!",
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

        // password validation
        if (password === "") {
          Toast.fire({
            icon: "error",
            title: "Password is Required!",
          });
          return false;
        }

        // wedding date validation
        if (date === "") {
          Toast.fire({
            icon: "error",
            title: "Date is Required!",
          });
          return false;
        }

        // Service validation
        if (service === "") {
          Toast.fire({
            icon: "error",
            title: "Service is Required!",
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
