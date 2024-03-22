<?php
$servername = "localhost";
$username = "root";
$password = "";
$fims = "fims";

// Create connection
$conn = new mysqli($servername, $username, $password, $fims);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else 
{
    echo "Connection succesful";
}
?>
