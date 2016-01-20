<?php
require_once '../nana_website/include/database.php';
session_start();

//If our session doesn't exist, redirect & exit script
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
    exit;
}

//Get variable from session to use
$name = $_SESSION['name'];


//get values from form
if (isset($_POST['submit']))
{
    //prevent code injection
    $date = mysqli_escape_string($db, $_POST['date']);
    $time = mysqli_escape_string($db, $_POST['time']);

    //add to db
    $query = "INSERT INTO reservations(email, date, time)
                  VALUES ('$name', '$date', '$time')";
    mysqli_query($db, $query);
}

//show reservations already made
if (isset($_SESSION['name']) || ($_POST['submit']))
{
     //query for retrieving all reservations made by user
    $query = "SELECT * FROM reservations WHERE email= '$name'";


    //results from query
    $result = mysqli_query($db, $query);

    //array for results
    $reservations = [];

    while ($row = mysqli_fetch_assoc($result))
    {
        $reservations [] = $row;
    }
}

//delete reservation

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
        <label for="time">Time</label><br>
        <input type="time" name="time" id="time" required/><br><br>
        <input type="submit" name="submit" value="Make Reservation"/>
    </fieldset>
</form>

<ul>
    <?php

    foreach ($reservations as $reservation)
    {
               ?>
        <li><?= $reservation['date'] ?> - <?= $reservation['time'] ?></li><input type="submit" name="delete" value="delete"><br>
        <?php
    }

    ?>
</ul>
</body>
</html>    
