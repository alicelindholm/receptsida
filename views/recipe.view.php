<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $recipe[0][0]["name"] ?> - Receptsida</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="../icon.jpg">
</head>
<body>
<div class="container">
    <h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Hem </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profil">Profil</a>
                </li>
            </ul>
            <form action="/logout.inc" method="post">
                <button type="submit" class="btn btn-secondary" name="logout-submit">Logga ut</button>
            </form>
        </div>
    </nav>


    <div class="row">

        <div class="col align-self-center">
            <h2><?= $recipe[0][0]["name"] ?></a></h2>
            <?php if ($recipe[0][0]["img"] != null) { ?>
                <img src="../uploads/<?= $recipe[0][0]['img'] ?>" alt="Bild på <?= $recipe[0][0]['name'] ?>">
            <?php } ?>

            <h3>Ingredienser</h3>
            <b>Portioner: <?= $recipe[0][0]["portions"] ?> </b>
            <ul>
                <?php
                //Skriver ut ingredienser, men ej id
                foreach ($recipe[1][0] as $ingredient) {
                    //Checkar om ingrediens har innehåll
                    if ($ingredient != "") {
                        ?>
                        <li><?= $ingredient ?></li>
                    <?php }
                }
                ?>
            </ul>
            <h3>Instruktioner</h3>
            <ol>
                <?php
                //Skriver ut instruktioner, men ej id
                foreach ($recipe[2][0] as $instruction) {
                    //Checkar om instruktion har innehåll
                    if ($instruction != "" && $instruction != null) {
                        ?>
                        <li><?= $instruction ?></li>
                    <?php }
                }
                ?>
            </ol>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>

