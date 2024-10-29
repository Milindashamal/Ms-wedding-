<?php
include_once '../../connectdb.php';

if (isset($_GET['id'])) {
    $contact_id = $_GET['id'];

    $sql = "DELETE FROM contact WHERE contact_id = $contact_id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php");
    } else {
        echo "Error deleting Message: " . $conn->error;
    }
}

$conn->close(); 
?>
