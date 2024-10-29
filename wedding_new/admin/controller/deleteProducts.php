<?php
include_once '../../connectdb.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT product_img FROM product WHERE product_id = $product_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_img = $row['product_img'];
        
        $image_path = realpath(__DIR__ . '/../uploads/' . basename($product_img));

        // Check if the image exists and delete it from the server
        if (file_exists($image_path)) {
            unlink($image_path);  
        }

        // SQL to delete the product from the database
        $delete_sql = "DELETE FROM product WHERE product_id = $product_id";
        
        if ($conn->query($delete_sql) === TRUE) {
            header("Location: ../index.php");
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
}
?>
