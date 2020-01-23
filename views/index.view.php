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
          content="w

          idth=device-width, user-scalable=no, initial




          -scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Receptsida</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">
    <div class="text-center"><h1 class="display-3">Receptsida</h1></div>
    <a href="nyttRecept" class="btn btn-success">+</a> <label for=""><h2 class="h5">Nytt recept</h2></label>

    <div class="row">
        <p class="h6"> Sortera efter: </p>
        <div class="mx-1"><a class="text-dark" href="/namn">Namn</a></div>
        <div class="mx-1"><a class="text-dark" href="/nyast">Nyast</a></div>
        <div class="mx-1"><a class="text-dark" href="/äldst">Äldst</a></div>
    </div>
    <div class="row">
        <?php
        foreach ($recipes as $recipe) { ?>
            <div class=" mb-2 d-flex align-content-stretch col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card">
                    <?php if ($recipe["img"] != null) { ?>
                        <a href="recept/<?= $recipe["id"] ?>"><img class="card-img-top"
                                                                   src="uploads/<?= $recipe["img"] ?>"
                                                                   alt="Card image cap"></a>
                    <?php } ?>
                    <div class="card-body">
                        <br>
                        <a href="recept/<?= $recipe["id"] ?>"><h2
                                    class="text-dark"><?= $recipe["name"]; ?></h2></a>

                    </div>
                    <div class="card-footer">
                        <a href="redigeraRecept/<?= $recipe["id"] ?>" class="btn btn-success">Redigera</a>
                        <a onclick="return confirm('Är du säker på att du vill radera receptet?')"
                           href=raderaRecept/<?= $recipe["id"] ?>" class="btn btn-secondary"><i>Radera</i></a>
                    </div>
                </div>
            </div>
        <?php }
        ?>

    </div>
</main>
</body>
</html>
