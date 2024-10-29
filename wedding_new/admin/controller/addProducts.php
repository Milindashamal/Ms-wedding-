<?php
    include_once "../../connectdb.php";
    
    if(isset($_POST['upload'])) {
       
        $pname = $_POST['product_name'];
        $price = $_POST['product_price'];
        $desc = $_POST['product_descp'];
        $category = $_POST['category_id'];
       
        $name = $_FILES['product_img']['name'];
        $temp = $_FILES['product_img']['tmp_name'];
    
        $location = "./uploads/";
        $image = $location . basename($name);

        $target_dir = "../uploads/";
        $finalImage = $target_dir . basename($name);

        // Check if the file was moved successfully
        if (move_uploaded_file($temp, $finalImage)) {
            // Perform the database insert query
            $insert = mysqli_query($conn, "INSERT INTO product
            (product_name, product_img, product_price, product_descp, category_id)
            VALUES ('$pname', '$image', $price, '$desc', '$category')");
    
            if(!$insert) {
                echo "Error inserting data: " . mysqli_error($conn);
            } else {
                echo "<script>
                        alert('Records added successfully!');
                        window.location.href = '../index.php';
                    </script>";
            }
        } else {
            echo "File upload failed.";
        }
    }
?>
