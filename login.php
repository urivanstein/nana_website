<?php
require_once '../nana_website/include/database.php';
session_start();

//check if already logged in
if (isset($_SESSION['name']))
{
    header('Location: reservation.php');
    exit;
}

//check if submitted login info matches db
if (isset($_POST['submit']))
{
    //prevent code injection and retrieve submit values
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    //retrieve name and password from db corresponding to email
    $query = "SELECT password, name FROM users
              WHERE email = '$email'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    //If above results conclude to a match go on
    if ($user)
    {
        //password validation
        if (password_verify($password, $user['password']))
        {
            $_SESSION['name'] = $user['name'];
            header('Location: reservation.php');
            exit;
        }
        else
        {
            $message = "Incorrecte email en/of passwoord";
        }
    }

}

?>
<!doctype html>
<html>
<head>
    <title>Login</title>
    <meta>
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

<!--login form-->
<form  action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
        <h1>Login</h1><br><br>

        <?php if (isset($message)){ ?>
        <div><?= $message; ?></div>
        <?php } ?>

        <label for="email">Username</label><br>
        <input type="email" name="email" id="email" placeholder="name@email.com" required><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" placeholder="password" required><br><br>
        <input type="submit" name="submit" value="login">
    </fieldset>
</form>
</body>
</html>    
