<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<a href="//localhost/receptsida">Kom hem igen!</a>
<h1><?= $recipe[0][0]["name"] ?></h1>
<h2>Ingredienser</h2>
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
<h2>Instruktioner</h2>
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
</body>
</html>

