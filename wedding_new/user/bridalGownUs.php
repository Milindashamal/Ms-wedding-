<?php
session_start();
include("../connectdb.php");

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE product_name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $_SESSION['alert_message'] = 'Product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(product_name , product_price, product_img, product_quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $_SESSION['alert_message'] = 'Product added to cart successfully!';
   }

   // Redirect to avoid form resubmission
   header("Location: " . $_SERVER['PHP_SELF']);
   exit();
}
?>
<?php
if (isset($_SESSION['alert_message'])) {
    echo "<script>alert('" . $_SESSION['alert_message'] . "');</script>";
    unset($_SESSION['alert_message']); // Clear the message after displaying it
}
?>
<?php
  $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
  $row_count = mysqli_num_rows($select_rows);
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
      href="../assets/images/icons/logo.png"
      type="image/x-icon"
    />

    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/style.css" />

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

    <main>

      <section id="products" class="product_category">
        <h2 id="product_head">Bridal Gown</h2>
        <div class="product-container">
        <?php
          // Fetch bridal category data (category_id = 1)
          $sql = "SELECT * FROM product WHERE category_id = 1";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              echo "<div class='productContainer'>";
              while($row = $result->fetch_assoc()) {
                  echo "<div class='productCard'>";
                  $imagePath = "../admin/" . $row["product_img"];
                  echo "<img src='" . $imagePath . "' alt='' class='card-img'/>";
                  echo "<div class='card-content'>";
                  echo "<h2>" . $row["product_name"] . "</h2>";
                  echo "<p><strong>Price:</strong> Rs. " . $row["product_price"] . "</p>";
                  echo "<div class='card-buttons'>";

                  // Form to add product to cart
                  echo "<form method='post' action=''>";
                  echo "<input type='hidden' name='product_name' value='" . $row["product_name"] . "'>";
                  echo "<input type='hidden' name='product_price' value='" . $row["product_price"] . "'>";
                  echo "<input type='hidden' name='product_image' value='" . $imagePath . "'>";
                  echo "<button type='submit' id='cartBtn' name='add_to_cart'><i class='fa-solid fa-cart-plus'></i> Add to Cart</button>";
                  echo "</form>";

                  echo "<button id='detailBtn' onclick=\"showDetails('" . htmlspecialchars($imagePath) . "', '" . htmlspecialchars($row['product_name']) . "', '" . htmlspecialchars($row['product_price']) . "', '" . htmlspecialchars($row['product_descp']) . "')\">Details</button>";
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
        
        function showDetails(imagePath, productName, productPrice, productDescription) {
            document.getElementById('productDetailsContent').innerHTML = `
                <div class="details-content">
                    <img src="${imagePath}" alt="Product Image" class="details-image"/>
                    <div class="details-text">
                        <h2>${productName}</h2>
                        <p><strong>Price:</strong> Rs. ${productPrice}</p>
                        <p>${productDescription}</p>

                        <!-- Form to add product to cart -->

                        <form method="post" action="">
                        <input type="hidden" name="product_name" value="${productName}">
                        <input type="hidden" name="product_price" value="${productPrice}">
                        <input type="hidden" name="product_image" value="${imagePath}">
                        <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
                </form>
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
    <script src="../assets/js/script.js"></script>

    <!-- customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
