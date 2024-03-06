</html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <title>OTA Update using PHP Server</title>
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="./form.css">
</head>

<body>

    

    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                OTA Update using PHP Server
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
            </label>
        </div>

        <div class="nav-links">
            <a href="https://github.com/Sudesh22/OTA-Update-using-PHP" target="_blank">Github</a>
            <a href="version.php" target="_self">Version History</a>
            <a href="download.php" target="_blank">Download</a>
            <a href="update.php" target="_self">Update</a>
            <a href="logout.php" target="_self">Logout</a>
        </div>
    </div>


    <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
              Select file to upload: <br>
              Version: <input type="text/number" className="version" name="version"> 
              Patch info: <input type="text" className="info" name="info"> 
              <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="submit" value="Upload" name="submit">
            </form> -->

    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <form class="form-container" action="upload.php" method="post" enctype='multipart/form-data'>
        <div class="upload-files-container">
            <h3 class="dynamic-message">
                Upload a new file:
            </h3>
            <input type="text/number" class="verinp" className="version" name="version" placeholder="Version Number">
            <input type="text" class="verinp" className="info" name="info" placeholder="Patch info">
            <input type="file" name="fileToUpload" id="fileToUpload" class="uppp">
            <input type="submit" value="Upload" name="submit" class="upload-button"> </input>
        </div>
    </form>
    <!-- partial -->
    <script src="./form.js"></script>
</body>

</html>