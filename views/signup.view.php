<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skapa konto</title>
</head>
<body>
<?php
var_dump($_GET);
?>
<main>
    <h1>Skapa konto</h1>
    <form action="/signup.inc" method="post">
        <input type="text" name="username" placeholder="Användarnamn">
        <input type="text" name="email" placeholder="E-postaddress">
        <input type="password" name="pwd" placeholder="Lösenord">
        <input type="password" name="pwd-repeat" placeholder="Bekräfta lösenord">
        <input type="submit" name="signup-submit" value="Skapa konto">
    </form>
</main>
</body>
</html>