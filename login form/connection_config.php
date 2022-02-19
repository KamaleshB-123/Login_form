<?php

$dbhost = 'localhost';
$dbusername = "root";
$dbpassword = "";
$dbname= "login_info";
$port = 3308;

$con = mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname,$port);
if(!$con){
    die( "<script>alert('Connection Failed')</script>");
}
?>