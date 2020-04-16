<!doctype html>
<html lang="en">
<head>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Receptsida</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="icon.jpg">
</head>

<body>
<main role="main" class="container">
    <div class="col">
        <div class="text-center"><h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1></div>
    </div>
    <h1>Skapa konto</h1>
    <form action="/sparaKonto" method="post">
        <input type="text" name="username" placeholder="Användarnamn" <?php if(isset($_GET['username'])){echo"value=".$_GET['username'];}?>>
        <input type="text" name="email" placeholder="E-postaddress"<?php if(isset($_GET['email'])){echo"value=".$_GET['email'];}?>>
        <input type="password" name="pwd" placeholder="Lösenord">
        <input type="password" name="pwd-repeat" placeholder="Bekräfta lösenord">
        <input type="submit" name="signup-submit" value="Skapa konto">
    </form>
    <?php
    if(isset($_GET['error'])) {
        if ($_GET['error'] === 'emptyfields') {
            ?>
            <p>Du måste fylla i alla fält!</p>
            <?php
        }
        if ($_GET['error'] === 'sqlerror=usertaken') {
            ?>
            <p>Användarnamnet är upptaget!</p>
        <?php
        }
    if ($_GET['error'] === 'passwordcheck') {
        ?>
        <p>Lösenorden matchar inte!</p>
        <?php
    }
        if ($_GET['error'] === 'invalidemail') {
            ?>
            <p>Inkorrekt email!</p>
    <?php
        }

    }
    ?>
</main>
</body>
</html>

