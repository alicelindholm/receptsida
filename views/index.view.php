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
</head>
<body>
<?php
$recipes = getAllNames();
?>

<div class="container mt-3">
    <h1 class="display-3">Receptsida</h1>
</div>
<a href="newRecipe.php" class="btn btn-success">+</a> <label for=""><h2 class="h5">Nytt recept</h2></label>
<div class=" mb-2 d-flex align-content-stretch col-12 col-md-6 col-lg-4 col-xl-3">

    <div class="row">
        <?php
        foreach ($recipes

                 as $recipe) { ?>
    <!-- Lägg till bootstrap-->
                <div class="card">
                    <?php if($recipe["img"] != null){?>
                        <a href="recipe.php/?id=<?= $recipe["id"] ?>"><img class="card-img-top" src="uploads/<?=$recipe["img"]?>" alt="Card image cap"></a>
                    <?php } ?>
                    <div class="card-body">
                        <br>
                        <a href="recipe.php/?id=<?= $recipe["id"] ?>"><h2
                                    class="text-dark"><?= $recipe["name"]; ?></h2></a>
                    </div>
                    <div class="card-footer">
                        <a href="editRecipe.php/?id=<?= $recipe["id"] ?>" class="btn btn-success">Redigera</a>
                        <a href="deleteRecipe.php/?id=<?= $recipe["id"] ?>" class="btn btn-secondary"><i>Radera</i></a>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>
</body>
</html>
