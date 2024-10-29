<?php 
session_start();
include("connectdb.php");
?>

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

      <section id="products" class="product_category">
        <h2 id="product_head">Groom Suit</h2>
        <div class="product-container">
        <?php
          // Fetch bridal category data (category_id = 1)
          $sql = "SELECT * FROM product WHERE category_id = 2";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              echo "<div class='productContainer'>";
              while($row = $result->fetch_assoc()) {
                  echo "<div class='productCard'>";
                  $imagePath = "admin/" . $row["product_img"];
                  echo "<img src='" . $imagePath . "' alt='' class='card-img'/>";
                  echo "<div class='card-content'>";
                  echo "<h2>" . $row["product_name"] . "</h2>";
                  echo "<p><strong>Price:</strong> Rs. " . $row["product_price"] . "</p>";
                  echo "<div class='card-buttons'>";
                  echo "<button onclick=\"addToCart()\"><i class='fa-solid fa-cart-plus'></i> Add to Cart</button>";
                  echo "<button onclick=\"showDetails('" . htmlspecialchars($imagePath) . "', '" . htmlspecialchars($row['product_name']) . "', '" . htmlspecialchars($row['product_price']) . "', '" . htmlspecialchars($row['product_descp']) . "')\">Details</button>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
              }
              echo "</div>";
          } else {
              echo "<p>No Product found.</p>";
          }

          $conn->close();
        ?>
 
        </div>
        <!-- Hidden Add Product Form -->
        <div class="overlay" id="overlay"></div>
          <div class="form-container" id="productForm">       
          <button class="closeBtn" onclick="closeDetails()">Close</button>
          <div id="productDetailsContent"></div>
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
        
      function addToCart() {
          Swal.fire({
          title: "Important!",
          text: "You have to be log in Account!",
          icon: "warning"
        });
        }

        function showDetails(imagePath, productName, productPrice, productDescription) {
            document.getElementById('productDetailsContent').innerHTML = `
                <div class="details-content">
                    <img src="${imagePath}" alt="Product Image" class="details-image"/>
                    <div class="details-text">
                        <h2>${productName}</h2>
                        <p><strong>Price:</strong> Rs. ${productPrice}</p>
                        <p>${productDescription}</p>
                        <button onclick="addToCart()"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                    </div>
                </div>
            `;
            document.getElementById('productForm').classList.add('show');
            document.getElementById('overlay').classList.add('show');
        }

        function closeDetails() {
            document.getElementById('productForm').classList.remove('show');
            document.getElementById('overlay').classList.remove('show');
        }
    </script>
    <!-- Custom js -->
    <script src="assets/js/script.js"></script>

    <!-- customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
