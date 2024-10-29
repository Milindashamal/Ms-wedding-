<?php
include_once '../../connectdb.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "user not found!";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_wed_date = $_POST['wed_date'];
    $user_servicetype = $_POST['servicetype'];

        $sql = "UPDATE user SET 
                name = '$user_name',
                email = '$user_email',
                wed_date = '$user_wed_date',
                servicetype = '$user_servicetype'
                WHERE id = $user_id";
    

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
        input[type="email"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
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
            <label for="name">User Name:</label>
            <input type="text" id="name" name="name" value="<?= $user['name'] ?>" required><br><br>

            <label for="email">User Email:</label>
            <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required><br><br>

            <label for="wed_date">Wedding Date:</label>
            <input type="date" id="wed_date" name="wed_date" value="<?= $user['wed_date'] ?>" required><br><br>

            <label for="servicetype">Service Type:</label>
            <select id="servicetype" name="servicetype" required>
                <?php
                    $service_types = ['bridal', 'planning', 'groom'];

                    foreach ($service_types as $service) {
                        $selected = ($user['servicetype'] == $service) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($service) . "' $selected>" . htmlspecialchars($service) . "</option>";
                    }
                ?>
            </select><br><br>

            <input type="submit" value="Update User">
        </form>
        <a href="../index.php">Back to User List</a>
    </div>
</body>
</html>

