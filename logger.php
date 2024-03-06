<?php
$user = $_POST['user'];
$pass = $_POST['pass'];

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

$select = mysqli_select_db($conn, $dbname);

if (!$select) { 
die('Error: ' . mysqli_error($conn));
}

$sql = "SELECT * FROM `user_creds` WHERE `Username` = '" . $user . "' AND `Password` = '" . $pass . "'";
$result = $conn->query($sql); 

if ($result->num_rows > 0) {
    $row = $result->fetch_array(MYSQLI_NUM);
    $value = 1;
    setcookie("TestCookie", $value, time() + (86400), "/", "physically-secure-condor.ngrok-free.app");
    header('Location: https://physically-secure-condor.ngrok-free.app/OTA%20UPDATE%20USING%20PHP%20SERVER/form.php');
} else {
    if ($pass == "" & $user == ""){
        header('Location: https://physically-secure-condor.ngrok-free.app/OTA%20UPDATE%20USING%20PHP%20SERVER/login.html');
    }
echo "Wrong Credentials...";
}
?>