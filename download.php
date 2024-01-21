<?php

$env = parse_ini_file('.env');
$servername = $env["servername"];
$username = $env["username"];
$password = $env["password"];
$dbname = $env["dbname"];

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
    header('Content-Disposition: attachment; filename="OTA_ver_0.1.ino.nodemcu.bin"');
    readfile($file_path);
}else{
    echo "file does not exist";
}
?>