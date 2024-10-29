<?php 
session_start();
include("../connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Font Awesome CDN for icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
</head>
<body>
    <h2>Dashboard</h2>
    <div class="card-container">
        <div class="card">
            <i class="fa fa-shopping-basket"></i>
            <h3>Total Products</h3>
            <h4 class="counter" data-target="<?php 
                $sql="SELECT * from product";
                $result=$conn-> query($sql);
                $count=0;
                if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {
                        $count=$count+1;
                    }
                }
                echo $count;
            ?>">0</h4>
        </div>
        <div class="card">
            <i class="fa fa-users"></i>
            <h3>Total Users</h3>
            <h4 class="counter" data-target="<?php 
                $sql="SELECT * from user where isAdmin=0";
                $result=$conn-> query($sql);
                $count=0;
                if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {
                        $count=$count+1;
                    }
                }
                echo $count;
            ?>">0</h4>
        </div>
        <div class="card">
            <i class="fa fa-envelope"></i>
            <h3>Total Messages</h3>
            <h4 class="counter" data-target="<?php 
                $sql="SELECT * from contact";
                $result=$conn-> query($sql);
                $count=0;
                if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {
                        $count=$count+1;
                    }
                }
                echo $count;
            ?>">0</h4>
        </div>
        <div class="card">
            <i class="fa fa-suitcase"></i>
            <h3>Total Orders</h3>
            <h4 class="counter" data-target="<?php 
                $sql="SELECT * from `order`";
                $result=$conn-> query($sql);
                $count=0;
                if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {
                        $count=$count+1;
                    }
                }
                echo $count;
            ?>">0</h4>
        </div>
    </div>

    <script>

        // Counter Animation Script
        const counters = document.querySelectorAll('.counter');
        counters.forEach(counter => {
            const updateCount = () => {
                const target = +counter.getAttribute('data-target');
                const count = +counter.innerText;
                const increment = target / 50;

                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(updateCount, 70);
                } else {
                    counter.innerText = target;
                }
            };
            updateCount();
        });
    </script>
</body>
</html>
