<?php
require_once '../nana_website/include/database.php';

//define username and password
$username = $_POST['username'];
$password = $_POST['password'];

//anti sql injection
$username = stripslashes($username);
$username = mysqli_real_escape_string($db, $username);
$password = stripslashes($password);
$password = mysqli_real_escape_string($db, $password);
$sql = "SELECT * FROM $database WHERE email='$username' and password='$password'";
$result = mysqli_query($db,$sql);

//scan table for matching combo
$scan = mysqli_num_rows($result);

//if matched
if($scan == 1)
{
    //register and go to reservation page
    $_SESSION['username']= $username;
    $_SESSION['password']= $password;
    header('Location: reservation.php');
}
//if incorrect
else
{
    echo"Verkeerde Username of Password";
}
mysqli_close($db);
?>
