<?php
require_once '../nana_website/include/database.php';
session_start();

//check if already logged in
if (isset($_SESSION['name']))
{
    header('Location: reservation.php');
    exit;
}

//get values from form
if (isset($_POST['submit']))
{
    //prevent code injection
    $name = mysqli_escape_string($db, $_POST['name']);
    $surname = mysqli_escape_string($db, $_POST['surname']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];
    /*$hashed_password = password_hash($password, PASSWORD_DEFAULT);*/

    //add to db
    $query = "INSERT INTO users(id, name, surname, email, password)
              VALUES ('', '$name', '$surname', '$email', '$password')";
    mysqli_query($db, $query);

    //go to login page afterwards
    header('Location: login.php');
}

?>
<!doctype html>
<html>
<head>
    <title></title>
    <meta></meta>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="normalize.css"/>
</head>
<body class="wrapper">

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
        <h1>Register</h1><br><br>
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" required/><br><br>
        <label for="surname">Surname</label><br>
        <input type="text" name="surname" id="surname" required/><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required/><br><br>
        <label for="password">Password</label><br>
        <input type="text" name="password" id="password" required/><br><br>
        <input type="submit" name="submit" value="submit"/>
    </fieldset>
</form>
</body>
</html>    
