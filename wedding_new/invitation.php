<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wedding Invitation Design</title>

    <!-- favicon -->
    <link
      rel="shortcut icon"
      href="assets/images/icons/logo.png"
      type="image/x-icon"
    />

    <style>
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      .invitation {
        color: #3e3b39;
        background: url(./assets/images/invitation/back.jpg);
        height: auto;
        background-size: cover;
        padding: 20px;
      }

      .wrapper {
        width: 1000px;
        margin: 0 auto;
      }

      .invitation h1 {
        text-align: center;
        padding-top: 20px;
        font-size: 1.75rem;
        margin: 40px 0;
        color: #fff;
        text-shadow: 0 2px 2px white;
      }

      .invitation h2 {
        text-align: center;
        margin: 25px auto;
        font-style: italic;
      }

      .invitation hr {
        border: 0;
        height: 2px;
        background-image: linear-gradient(
          to right,
          rgba(0, 0, 0, 0),
          rgba(0, 0, 0, 0.75),
          rgba(0, 0, 0, 0)
        );
      }

      .btnGroup {
        text-align: center;
      }

      .btnGroup button {
        padding: 10px 15px;
        cursor: pointer;
        border: none;
      }

      .grid-col {
        display: grid;
        gap: 0.5rem;
        grid-template-columns: 1fr 1fr;
      }

      .left-half {
        background: url(./assets/images/invitation/b1.jpg);
        background-size: cover;
        opacity: 1;
        box-shadow: 5px 10px 8px 0 rgb(34, 60, 80, 0.16);
        grid-column: 1;
        border-radius: 10px;
      }

      .right-half {
        filter: brightness(0.8); /*text goes to center when removed*/
        box-shadow: 5px 10px 8px 0 rgb(34, 60, 80, 0.16);
        grid-column: 2;
        border-radius: 10px;
      }

      #myImage {
        border-radius: 10px;
      }

      .image-wrapper {
        justify-self: center;
        position: relative;
      }

      /*fitting image choices in wrapper*/
      .invitation img {
        position: inherit;
        width: 100%;
        height: auto;
        display: block;
        overflow: hidden;
      }

      .imgtext {
        text-align: center;
        position: absolute;
        top: 40%;
        left: 50%;
        font-size: 25px;
        font-style: italic;
        font-family: Luminari;
        transform: translate(-50%, -50%);
      }

      .form {
        position: relative;
        text-align: center;
        padding: 1rem;
      }

      .invitation label {
        display: inline-block;
        width: 90px;
        text-align: right;
        font-weight: 800;
        padding-right: 15px;
      }

      .invitation input {
        font: 1em sans-serif;
        width: 250px;
        height: 30px;
        box-sizing: border-box;
        border: 2px solid #999;
      }
    </style>

    <link rel="stylesheet" href="assets/css/style.css" />
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
    <section class="invitation">
      <h1>Wedding Invitation Designer</h1>
      <div class="wrapper">
        <hr />
        <br />
        <!--form input begins-->
        <section class="grid-col">
          <div class="left-half">
            <br />
            <h2>Choose Your Design</h2>
            <nav class="btnGroup">
              <button class="btn_hover2" onclick="design1();">Design 1</button>
              <button class="btn_hover2" onclick="design2();">Design 2</button>
              <button class="btn_hover2" onclick="design3();">Design 3</button>
              <button class="btn_hover2" onclick="design4();">Design 4</button>
            </nav>
            <!--design choices begins-->
            <div class="form">
              <hr />
              <br /><br /><br />
              <label>Hosts:</label>
              <input
                type="text"
                placeholder="First & Last Name Please!"
                id="name"
                onkeyup="getName()"
              />
              <br />
              <br />
              <label>Date:</label>
              <input
                type="text"
                placeholder="Enter the Date its Happening!"
                id="date"
                onkeyup="getDate()"
              />
              <br />
              <br />
              <label>Venue:</label>
              <input
                type="text"
                placeholder="Where are you having it!"
                id="venue"
                onkeyup="getVenue()"
              />
            </div>
          </div>

          <!--live typing begins-->
          <div class="right-half" id="right-col">
            <div class="image-wrapper">
              <img id="myImage" src="./assets/images/invitation/image1.jfif" />
            </div>
            <div class="imgtext">
              <p>&hearts;&hearts;&hearts;</p>
              <p>You are cordially invited to the Wedding of</p>
              <span id="input"></span>
              <p>&hearts; on the &hearts;</p>
              <span id="input2"></span>
              <p>&hearts; @ &hearts;</p>
              <span id="input3"></span>
            </div>
          </div>
        </section>
      </div>
    </section>

    <footer>
      <div class="footer-container">
        <div class="logo-section">
          <img
            src="assets/images/icons/logo3.png"
            alt="mswedding Logo"
            class="logo"
          />
          <h2>MS Wedding</h2>
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
      //image change- 4 choices- 4 functions
      function design1() {
        document.getElementById("myImage").src =
          "./assets/images/invitation/image1.jfif";
      }

      function design2() {
        document.getElementById("myImage").src =
          "./assets/images/invitation/image2.jfif";
      }

      function design3() {
        document.getElementById("myImage").src =
          "./assets/images/invitation/image3.jfif";
      }

      function design4() {
        document.getElementById("myImage").src =
          "./assets/images/invitation/image4.jfif";
      }

      //Form field live text
      //Displays value from <input>
      function getName() {
        var nam = document.getElementById("name").value;
        document.getElementById("input").innerHTML = "" + nam;
      }

      function getDate() {
        var d = document.getElementById("date").value;
        document.getElementById("input2").innerHTML = "" + d;
      }

      function getVenue() {
        var v = document.getElementById("venue").value;
        document.getElementById("input3").innerHTML = "" + v;
      }
    </script>
    
    <!-- customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
