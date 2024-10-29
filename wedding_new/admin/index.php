<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/style.css">

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

    <!-- Top Navbar -->
    <div class="top-navbar">
        <h1>Admin Panel - Welcome, Admin!</h1>
    </div>

    <!-- Side Navbar -->
    <div class="side-navbar">
        <div class="side-header">
            <img
            src="./assets/images/logo.png"
            width="100"
            height="100"
            alt="Swiss Collection"
            />
            <h4 style="margin-top: 15px">mswedding Admin</h5>
        </div>

        <hr
            style="border: 1px solid; background-color: #7436bb; border-color: #7436bb"
        />
        <a href="?tab=home"><i class="fa fa-home"></i> Home</a>
        <a href="?tab=tab1"><i class="fa fa-shopping-basket"></i> Products</a>
        <a href="?tab=tab3"><i class="fa fa-suitcase"></i> Orders</a>
        <a href="?tab=tab4"><i class="fa fa-users"></i> Users</a>
        <a href="?tab=tab5"><i class="fa fa-envelope"></i> Messages</a>
        <a href="../logout.php" id="logout"><i class="fa fa-sign-out"></i> Log Out</a>
    </div>

    <!-- Main Content Area -->
    <div class="content">
        <?php
            // Default to Home if no tab is selected
            $tab = isset($_GET['tab']) ? $_GET['tab'] : 'home';

            // Load content based on the selected tab
            switch ($tab) {
                case 'home':
                    include 'home.php';
                    break;
                case 'tab1':
                    include 'adminView/viewProducts.php';
                    break;
                case 'tab3':
                    include 'adminView/viewOrders.php';
                    break;
                case 'tab4':
                    include 'adminView/viewUsers.php';
                    break;
                case 'tab5':
                    include 'adminView/viewMessages.php';
                    break;
                default:
                    echo "<h2>Page not found</h2>";
                    break;
            }
        ?>
    </div>

</body>
</html>
