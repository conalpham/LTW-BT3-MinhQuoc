<?php
$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "qldh";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database);
$setLang=mysqli_query($conn,"SET NAMES 'utf-8'");
if($conn){
    $setLang=mysqli_query($conn,"SET NAMES 'utf-8'");
} else {
    die("kết nối thất bại".mysqli_connect_error());
}
?>