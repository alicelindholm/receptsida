<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receptsida</title>
</head>
<body>
<?php
$recipes = getAllNames();
?>
<h1>Receptsida test igen</h1>
<a href="newRecipe.php">Nytt recept</a>
<hr>
<?php
foreach ($recipes as $recipe) { ?>
    <br>
    <a href="recipe.view.php/?id=<?=$recipe["id"]?>"><?= $recipe["name"]; ?></a>
    <a href="deleteRecipe.view.php/?id=<?=$recipe["id"]?>">Radera </a>

<?php }
?>

</body>
</html>
