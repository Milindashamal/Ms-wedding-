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
        <h1>Product List</h1>
        <button onclick="showForm()" ><i class="fa fa-plus-circle"></i> Add Product</button>
    </div>
    
    <table class="table">
        <thead>
        <tr>
            <th class="text-center">No.</th>
            <th class="text-center">Product Image</th>
            <th class="text-center">Product Name</th>
            <th class="text-center">Product Price</th>
            <th class="text-center"> Description</th>
            <th class="text-center">Category</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
        </thead>
    <?php
      include_once "./../connectdb.php";
      $sql="SELECT * from product, category WHERE product.category_id=category.category_id";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='150px' src='<?=$row["product_img"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["product_price"]?></td>
      <td><?=$row["product_descp"]?></td>      
      <td><?=$row["category_name"]?></td> 
           
    <td>
        <a href="./controller/editProducts.php?id=<?=$row['product_id']?>" class="btn btn-primary">Edit</a>
    </td>
    <td>
        <a href="./controller/deleteProducts.php?id=<?=$row['product_id']?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
    </td>
    </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

   <!-- Hidden Add Product Form -->
   <div class="overlay" id="overlay"></div>
    <div class="form-container" id="addProductForm">
        <h3>Add Product</h3>
        <form action="./controller/addProducts.php" method="POST" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required><br><br>

            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" required><br><br>

            <label for="product_descp">Description:</label>
            <textarea id="product_descp" name="product_descp" required></textarea><br><br>

            <label for="category">Category:</label>
            <select id="category" name="category_id" required>
                <!-- Add dynamic categories from DB here -->
                <?php
                $category_sql = "SELECT * FROM category";
                $category_result = $conn->query($category_sql);
                if ($category_result->num_rows > 0) {
                    while ($category = $category_result->fetch_assoc()) {
                        echo "<option value='" . $category['category_id'] . "'>" . $category['category_name'] . "</option>";
                    }
                }
                ?>
            </select><br><br>

            <label for="product_img">Product Image:</label>
            <input type="file" id="product_img" name="product_img" required><br><br>

            <input type="submit" value="Add Product" name="upload">
        </form>
        <button class="closeBtn" onclick="closeForm()">Close</button>
    </div>
    
    <script>
        // Function to show the form and overlay
        function showForm() {
            document.getElementById('addProductForm').classList.add('show');
            document.getElementById('overlay').classList.add('show');
        }

        // Function to close the form and overlay
        function closeForm() {
            document.getElementById('addProductForm').classList.remove('show');
            document.getElementById('overlay').classList.remove('show');
        }
    </script>
</body>

</html>