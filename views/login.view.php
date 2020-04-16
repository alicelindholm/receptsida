<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logga in</title>
</head>
<body>
<header>
    <nav>
        <a href="">
            <img src="icon.jpg" alt="picture">
        </a>
    </nav>
    <div>
        <form action="/login.inc" method="post">
            <input type="text" name="mailuid" placeholder="Användarnamn...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="login-submit">Logga in</button>
        </form>
        <a href="/signup">Skapa konto</a>
        <form action="/logout.inc" method="post">
            <button type="submit" name="logout-submit">Logga ut</button>
        </form>
    </div>
</header>
</body>
</html>
<?php
