<?php
$file_path = "uploads/0.0.2/OTA_ver_0.1.ino.nodemcu.bin";
if (file_exists($file_path)){
    header('Content-type: application/bin');
    header('Content-Disposition: attachment; filename="OTA_ver_0.1.ino.nodemcu.bin"');
    readfile($file_path);
}else{
    echo "nooo";
}
?>