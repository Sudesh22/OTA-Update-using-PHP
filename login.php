</html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTA Update using PHP Server</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
</head>

<body>

    <nav class="navigation">
        <p>OTA Update using PHP Server</p>
    </nav>

    <?php
    if (isset($_COOKIE["TestCookie"])){
        echo "iohsih";
        header('Location: https://physically-secure-condor.ngrok-free.app/OTA%20UPDATE%20USING%20PHP%20SERVER/form.php');
    }
    ?>

    <section>
        <div class="main-form-container">
            <div id="form_section" class="form-container">
                <div class="login-form form-wraper ">
                    <div>
                        <div class="form-title">
                            <h2>Login</h2>
                        </div>
                        <form name="Form" action="logger.php" method="post">
                            <div class="input-group">
                                <div class="box">
                                    <span>
                                        <input placeholder="Username" class="myInput" type="text" className="user"
                                            name="user" />
                                    </span>
                                </div>
                            </div>
                            <div class="input-group">
                                <div class="box">
                                    <span>
                                        <input placeholder="Password" class="myInput" type="text" className="pass"
                                            name="pass" />
                                    </span>
                                </div>
                            </div>
                            <div class="action-button">
                                <button value="login" name="login" onclick=onSubmitSignIn()>Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>