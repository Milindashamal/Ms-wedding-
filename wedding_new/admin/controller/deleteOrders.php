<?php
include_once '../../connectdb.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $sql = "DELETE FROM `order` WHERE order_id = $order_id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error deleting Order: " . $conn->error;
    }
}

$conn->close(); 
?>
