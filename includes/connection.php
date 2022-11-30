<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db = "online_shopping";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn) {
    echo "Error:" . mysqli_connect_error($conn);
}

