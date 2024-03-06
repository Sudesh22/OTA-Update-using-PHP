
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

/* numeric array */
$row = $result->fetch_array(MYSQLI_NUM);

echo "{\"version\" : " . $row[1] . "}";

$conn->close();
?>
