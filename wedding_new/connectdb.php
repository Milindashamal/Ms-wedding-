<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "wedding";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn -> connect_error) {
    echo "failed to connect DB".$conn -> connect_error;
}

?>