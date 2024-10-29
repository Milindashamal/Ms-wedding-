<?php
session_start();
include("../connectdb.php");

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET product_quantity = '$update_value' WHERE cart_id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
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
    <link rel="stylesheet" href="../assets/css/user.css">

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
    <section class="shopping-cart">
        <h1 class="heading">Shopping Cart</h1>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $grand_total = 0;
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $sub_total = $fetch_cart['product_price'] * $fetch_cart['product_quantity'];
                        $grand_total += $sub_total;
                        ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($fetch_cart['product_img']); ?>" height="100" alt=""></td>
                            <td><?php echo htmlspecialchars($fetch_cart['product_name']); ?></td>
                            <td>Rs.<?php echo number_format($fetch_cart['product_price'], 2); ?>/-</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="update_quantity_id" value="<?php echo htmlspecialchars($fetch_cart['cart_id']); ?>">
                                    <input type="number" name="update_quantity" min="1" value="<?php echo htmlspecialchars($fetch_cart['product_quantity']); ?>">
                                    <input type="submit" value="Update" name="update_update_btn">
                                </form>
                            </td>
                            <td>Rs.<?php echo number_format($sub_total, 2); ?>/-</td>
                            <td><a href="cart.php?remove=<?php echo htmlspecialchars($fetch_cart['cart_id']); ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"><i class="fas fa-trash"></i> Remove</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr class="table-bottom">
                    <td><a href="homepage.php" class="option-btn" style="margin-top: 0;">Continue</a></td>
                    <td colspan="3">Grand Total</td>
                    <td>Rs.<?php echo number_format($grand_total, 2); ?>/-</td>
                    <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"><i class="fas fa-trash"></i> Delete All</a></td>
                </tr>
            </tbody>
        </table>
        <div class="checkout-btn">
            <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Checkout</a>
        </div>
    </section>
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
