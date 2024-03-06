<?php
$value = 0;
setcookie("TestCookie", $value, time() - (86400), "/", "physically-secure-condor.ngrok-free.app");
// unset ($_COOKIE['cookieName']);
header('Location: https://physically-secure-condor.ngrok-free.app/OTA%20UPDATE%20USING%20PHP%20SERVER/login.php');

?>