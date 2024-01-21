<?php
$folder_name = $_POST['version'];
$message = $_POST['info'];

$env = parse_ini_file('.env');
$servername = $env["servername"];
$username = $env["username"];
$password = $env["password"];
$dbname = $env["dbname"];

$target_dir = "uploads/" . $folder_name . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$extension = pathinfo($target_file, PATHINFO_EXTENSION);
echo $extension;
echo "<br>";

echo $folder_name;
echo "<br>";

// Checking if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Checking file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow only bin file format
if($imageFileType != "bin") {
  echo "Sorry, only bin files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {

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

    $sql = "INSERT INTO `version_hist` (version_no, update_info, path, upload_date)
    VALUES ('".strval($folder_name)."', '".$message."', '".$target_file."',CURDATE());";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        mkdir($target_dir);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>