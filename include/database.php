<?php
$host = "localhost";
$database = "reservation_system";
$user = "root";
$dbpassword = "";

$db = mysqli_connect($host, $user, $dbpassword, $database) or die("Error: " . mysqli_connect_error());;
