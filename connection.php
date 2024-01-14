<?php 
$host = "localhost:3307";
$user = "root";
$pass = "";
$db = "phpfinal";

$conn = mysqli_connect($host,$user,$pass,$db);
if(!$conn) {
    echo "Unable to connect to database";
}


?>