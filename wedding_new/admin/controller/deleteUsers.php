<?php
include_once '../../connectdb.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql = "DELETE FROM user WHERE id = $user_id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close(); 
?>
