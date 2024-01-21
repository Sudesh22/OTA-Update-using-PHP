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
  echo "Connected successfully";

  $selected = mysqli_select_db($conn, $dbname);

  if (!$selected) {
    die('Error: ' . mysqli_error($conn));
  }

  $sql = "SELECT * FROM `version_hist` ORDER BY `Primary key` DESC LIMIT 1;";
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Sr. no.</th><th>Version</th><th>Patch info</th><th>Path</th><th>Date of Upload</th></tr>";
    // output data of each row
    while($row = $result->fetch_array(MYSQLI_NUM)) {
    echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }

// echo $result;
$conn->close();
?>