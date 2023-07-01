<?php
$keks = "veryuniqueid";

define('DB_SERVER', 'host');
define('DB_USERNAME', 'test');
define('DB_PASSWORD', 'pswd');
define('DB_NAME', 'test');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>