<?php
$servername = "localhost";
$username = "root";
$password = "willian10";
$dbname= "sheshe_fyp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>