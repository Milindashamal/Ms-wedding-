<?php
session_destroy();
echo '<script type="text/javascript">
        alert("You have been logged out.");
        window.location.href = "index.php";
      </script>';
// header("location: index.php");
?>
