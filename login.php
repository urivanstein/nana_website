<?php
require_once '../nana_website/include/database.php'

?>
<!doctype html>
<html>
<head>
    <title></title>
    <meta></meta>
    <link rel="stylesheet" href=""/>
</head>
<body>
<!--login form-->
<form method="post" action="verifylogin.php">
    <fieldset>
        <legend>Login</legend>
        Username:<br>
        <input type="email" name="username" placeholder="name@email.com" required><br>
        Password:<br>
        <input type="password" name="password" placeholder="password"><br><br>
        <input type="submit" value="login">
    </fieldset>
</form>
</body>
</html>    
