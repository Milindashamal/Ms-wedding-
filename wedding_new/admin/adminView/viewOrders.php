<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- font awesome cdn for icons -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="./assets/css/product.css">
</head>
<body>
    <div class="addBtn">
        <h1>Order List</h1>
    </div>
    
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Method</th>
            <th class="text-center">Total Products</th>
            <th class="text-center">Total Price</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
    <?php
      include_once "./../connectdb.php";
      $sql="SELECT * from `order`";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
      <td><?=$row["number"]?></td>
      <td><?=$row["method"]?></td>
      <td><?=$row["total_products"]?></td>
      <td>Rs.<?= number_format($row["total_price"], 2) ?></td>         
    <td>
        <a href="./controller/deleteOrders.php?id=<?=$row['order_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
    </td>
    </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>
</body>

</html>