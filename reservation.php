<?php
session_start();

//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

//Get variable from session to use
$name = $_SESSION['name'];

?>
<!doctype html>
<html>
<head>
    <title></title>
    <meta>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="normalize.css"/>
</head>
<body>

<!--navigation bar-->
<div id="navigation">
    <ul>
        <li><a href="index.php#home">Home</a></li>
        <li><a href="index.php#about">About Us</a></li>
        <li><a href="index.php#pictures">Pictures</a></li>
        <li><a href="index.php#contact">Contact</a></li>
        <li><a href="login.php">Login</a></li>
    </ul>
</div>

<form method="post">
    <fieldset>
        <label for="date">Date</label><br>
        <input type="date" name="date" id="date" required/><br><br>
        <label for="time">Date</label><br>
        <input type="time" name="time" id="time" required/><br><br>
        <input type="submit" name="submit" value="Make Reservation"/>
    </fieldset>
</form>
</body>
</html>    
