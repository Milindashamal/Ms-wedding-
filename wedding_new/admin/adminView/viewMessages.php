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
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Message</th>
            <th class="text-center">Upload Date</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
    <?php
      include_once "./../connectdb.php";
      $sql="SELECT * from contact";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["contact_fname"]?></td>
      <td><?=$row["contact_lname"]?></td>
      <td><?=$row["contact_email"]?></td>
      <td><?=$row["contact_phone"]?></td>
      <td><?=$row["contact_message"]?></td>
      <td><?=$row["upload_date"]?></td>                
    <td>
        <a href="./controller/deleteMessages.php?id=<?=$row['contact_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?');">Delete</a>
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