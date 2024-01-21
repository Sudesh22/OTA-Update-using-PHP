<?php
$servername = "localhost";
$username = "Sudesh";
$password = "Sudesh@2023";
$dbname = "ota_update";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

$sql = "USE ota_update";
$result = $conn->query($sql);
$sql = "SELECT * FROM `version_hist` WHERE version='0.0.1'";
$result = $conn->query($sql);

echo $result;
$conn->close();
?>