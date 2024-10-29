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
        <h1>User List</h1>
    </div>
    
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Wedding Date</th>
            <th class="text-center">Service Type</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
        </thead>
    <?php
      include_once "./../connectdb.php";
      $sql="SELECT * from user where isAdmin=0";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["name"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["wed_date"]?></td>      
      <td><?=$row["servicetype"]?></td>           
    <td>
        <a href="./controller/editUsers.php?id=<?=$row['id']?>" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <a href="./controller/deleteUsers.php?id=<?=$row['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
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