<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="conainer">
    <h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1>
    <h2><?= $recipe[0][0]["name"] ?></a></h2>
    <?php if ($recipe[0][0]["img"] != null) { ?>
        <img src="../uploads/<?= $recipe[0][0]['img'] ?>" alt="Bild på <?= $recipe[0][0]['name'] ?>">
    <?php } ?>
    <h3>Ingredienser</h3>
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
</body>
</html>

