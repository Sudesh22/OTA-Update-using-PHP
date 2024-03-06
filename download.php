<?php

$env = parse_ini_file('.env');
$servername = $env["servername"];
$username = $env["username"];
$password = $env["password"];
$dbname = $env["userdb"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selected = mysqli_select_db($conn, $dbname);

if (!$selected) {
    die('Error: ' . mysqli_error($conn));
}

$sql = "SELECT * FROM `version_hist` ORDER BY `Primary key` DESC LIMIT 1;";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_NUM);
} else {
    echo "0 results";
}

$file_path = $row[3];
if (file_exists($file_path)){
    header('Content-type: application/bin');
    header('Content-Disposition: attachment; filename="OTA_update.ino.generic.bin"');
    header('content-length:'.filesize($file_path));
    readfile("OTA_update.ino.generic.bin");
}else{
    echo "file does not exist";
}
?>