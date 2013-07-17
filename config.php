<?php
$dbusername  = "gauthify-phplogin";
$dbpassword  = "password";
$database  = "gauthify-phplogin";
$dbhost    = "localhost";

$dbconn = new PDO('mysql:host='.$dbhost.';dbname='.$database.'', $dbusername, $dbpassword);

$GAuthAPI = "gauthifyapikey";



?>
