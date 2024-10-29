<?php
session_start();
include("../connectdb.php");

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:homepage.php');
 }

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $flat = mysqli_real_escape_string($conn, $_POST['flat']);
   $street = mysqli_real_escape_string($conn, $_POST['street']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $state = mysqli_real_escape_string($conn, $_POST['state']);

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $product_name = []; // Initialize the array

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['product_name'] .' ('. $product_item['product_quantity'] .') ';
         $product_price = $product_item['product_price'] * $product_item['product_quantity'];
         $price_total += $product_price;
      }
   }

   if(!empty($product_name)){
      $total_product = implode(', ', $product_name);
      $detail_query = mysqli_query($conn, "INSERT INTO `order`(name, number, email, method, flat, street, city, state, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$city','$state','$total_product','$price_total')");

      if($cart_query && $detail_query){
         echo "
         <div class='order-message-container'>
         <div class='message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
               <span>".$total_product."</span>
               <span class='total'> Total: Rs.".$price_total."/- </span>
            </div>
            <div class='customer-details'>
               <p> Your name: <span>".$name."</span> </p>
               <p> Your number: <span>".$number."</span> </p>
               <p> Your email: <span>".$email."</span> </p>
               <p> Your address: <span>".$flat.", ".$street.", ".$city.", ".$state."</span> </p>
               <p> Your payment mode: <span>".$method."</span> </p>
               <p>(*Pay when product arrives*)</p>
            </div>
               <a href='checkout.php?delete_all' class='order_btn' onclick=\"return alert('Your order is received!');\">Continue Shopping</a>
            </div>
         </div>
         ";
      } else {
         echo "<p class='error'>There was an issue placing your order. Please try again.</p>";
      }
   } else {
      echo "<p class='error'>Your cart is empty!</p>";
   }
}
?>

<?php
  $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('Query failed');
  $row_count = mysqli_num_rows($select_rows);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MS Wedding</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="../assets/images/icons/logo.png" type="image/x-icon" />

    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/user.css">

    <!-- font awesome cdn for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
  <header class="menu-bar">
      <div class="menu-container">
        <h1 class="logo2">
          Love
          <span>Knot<img src="../assets/images/icons/logo1.png" alt="" /></span>
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
              <a href="">About</a>
            </li>
            <li>
                <a href="contactUs.php">Contact</a>
            </li>
            <li>
                <p style="color: #7436bb; font-size: 16px; font-weight: 700; padding: 0 20px">Hi, <?php
                    if(isset($_SESSION['email'])){
                        $email = $_SESSION['email'];
                        $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$email'");
                        if($row = mysqli_fetch_array($query)){
                            echo $row['name'];
                        }
                    }
                    ?>
                    <a href="cart.php"><i class="fa-solid fa-shopping-cart" style="color: #7436bb; font-size:20px;"></i>
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

 <div class="container">

    <section class="checkout-form">

    <h1 class="heading">Complete Your Order</h1>

    <form action="" method="post">

    <div class="display-order">
        <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $total = 0;
            $grand_total = 0;
            if(mysqli_num_rows($select_cart) > 0){
                while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    $total_price = $fetch_cart['product_price'] * $fetch_cart['product_quantity'];
                    $grand_total += $total_price;
        ?>
        <span><?= htmlspecialchars($fetch_cart['product_name']); ?> (<?= $fetch_cart['product_quantity']; ?>)</span>
        <?php
                }
            }else{
                echo "<div class='display-order'><span>Your cart is empty!</span></div>";
            }
        ?>
        <span class="grand-total"> Grand Total: Rs.<?= number_format($grand_total); ?>/- </span>
    </div>

        <div class="flex">
            <div class="inputBox">
                <span>Your Name</span>
                <input type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputBox">
                <span>Your Number</span>
                <input type="text" placeholder="Enter your number" name="number" required>
            </div>
            <div class="inputBox">
                <span>Your Email</span>
                <input type="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="inputBox">
                <span>Payment Method</span>
                <select name="method">
                <option value="cash on delivery" selected>Cash on Delivery</option>
                <option value="card payment">Card Payment</option>
                <option value="online banking">Online Banking</option>
                </select>
            </div>
            <div class="inputBox">
                <span>Address Line 1</span>
                <input type="text" placeholder="e.g. Address No." name="flat" required>
            </div>
            <div class="inputBox">
                <span>Address Line 2</span>
                <input type="text" placeholder="e.g. Street Name" name="street" required>
            </div>
            <div class="inputBox">
                <span>City</span>
                <input type="text" placeholder="e.g. Colombo" name="city" required>
            </div>
            <div class="inputBox">
                <span>State</span>
                <input type="text" placeholder="e.g. Western" name="state" required>
            </div>
        </div>
        <input type="submit" value="Order Now" name="order_btn" class="order_btn">
    </form>

    </section>

 </div>
 </main>

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

    <!-- Custom js -->
    <script src="../assets/js/script.js"></script>

    <!-- customizable, accessible (WAI-ARIA) replacement for JavaScript's popup boxes -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>
