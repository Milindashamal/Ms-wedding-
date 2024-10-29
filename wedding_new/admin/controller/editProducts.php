<?php
include_once '../../connectdb.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT * FROM product WHERE product_id = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_descp = $_POST['product_descp'];
    $category_id = $_POST['category_id'];

    if (isset($_FILES['product_img']['name']) && $_FILES['product_img']['name'] != "") {
        $target_dir = "./uploads/";
        $target_file = $target_dir . basename($_FILES["product_img"]["name"]);
        move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file);

        $sql = "UPDATE product SET 
                product_name = '$product_name',
                product_price = '$product_price',
                product_descp = '$product_descp',
                category_id = '$category_id',
                product_img = '$target_file'
                WHERE product_id = $product_id";
    } else {

        $sql = "UPDATE product SET 
                product_name = '$product_name',
                product_price = '$product_price',
                product_descp = '$product_descp',
                category_id = '$category_id'
                WHERE product_id = $product_id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style> 
        .form-contain {
            max-width: 500px;
            margin: 0 auto;
            padding: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h3 {
            text-align: center;
            margin-bottom: 10px;
            color: #333;
            font-family: Arial, sans-serif;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
            font-family: Arial, sans-serif;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        input[type="file"] {
            padding: 5px;
        }

        img {
            margin-top: 10px;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #d12bec;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        input[type="submit"]:hover {
            background-color: #bf2ad6;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-family: Arial, sans-serif;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-contain">
        <h3>Edit Product</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="<?= $product['product_name'] ?>" required><br><br>

            <label for="product_price">Product Price:</label>
            <input type="number" id="product_price" name="product_price" value="<?= $product['product_price'] ?>" required><br><br>

            <label for="product_descp">Description:</label>
            <textarea id="product_descp" name="product_descp" required><?= $product['product_descp'] ?></textarea><br><br>

            <label for="category">Category:</label>
            <select id="category" name="category_id" required>
                <!-- Fetch categories dynamically from the DB -->
                <?php
                $category_sql = "SELECT * FROM category";
                $category_result = $conn->query($category_sql);
                if ($category_result->num_rows > 0) {
                    while ($category = $category_result->fetch_assoc()) {
                        $selected = ($product['category_id'] == $category['category_id']) ? 'selected' : '';
                        echo "<option value='" . $category['category_id'] . "' $selected>" . $category['category_name'] . "</option>";
                    }
                }
                ?>
            </select><br><br>

            <label for="product_img">Product Image:</label>
            <input type="file" id="product_img" name="product_img"><br>

            <input type="submit" value="Update Product">
        </form>
        <a href="../index.php">Back to Product List</a>
    </div>
</body>
</html>

