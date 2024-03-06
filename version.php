<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Version History</title>
  <link rel="stylesheet" href="version.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
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

  $sql = "SELECT * FROM `version_hist`;";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="container my-5">
  <h1 class="display-4 fw-bold text-center">Version History</h1>
  <div class="table-responsive my-4">
      <table class="table table-bordered table-hover">
          <thead class="table-danger">
              <tr>
                  <th>Version No.</th>
                  <th>Patch Info</th>
                  <th>Path</th>
                  <th>Date</th>
              </tr>
          </thead>';
  // output data of each row
  while($row = $result->fetch_array(MYSQLI_NUM)) {
  echo "<tr><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
  }
  echo "</table> </div> </div>";
} else {
  echo "0 results";
}

  $conn->close();
  ?>

</body>

</html>