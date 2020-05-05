<!doctype html>
<html lang="en">
<head>
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


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Hem <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profil">Profil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Sortera efter
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/namn">Namn</a>
                            <a class="dropdown-item" href="/nyast">Nyast</a>
                            <a class="dropdown-item" href="/äldst">Äldst</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Kategorier
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/maträtter">Maträtter</a>
                            <a class="dropdown-item" href="/efterrätter">Efterrätter</a>
                            <a class="dropdown-item" href="/bakverk">Bakverk</a>
                            <a class="dropdown-item" href="/drycker">Drycker</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/slumpa">Slumpa fram en maträtt</a>
                    </li>
                </ul>
                <form action="/sökning " class="form-inline my-2 my-lg-0" method="get">
                    <input class="form-control mr-sm-2" type="search" name="search" id="search"
                           placeholder="Sök recept/ingrediens..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <form action="/loggaUt" method="post">
                    <button type="submit" class="btn btn-secondary" name="logout-submit">Logga ut</button>
                </form>
            </div>
        </nav>
    </div>
    <a href="nyttRecept" class="btn btn-success">+</a> <label for=""><h2 class="h5">Nytt recept</h2></label>

    <?php
    if (empty($recipes)) {

        if (!empty($option) && $option != "") {
            if ($option["option"] === "sökning") {
                echo "<p>Du sökte på: '" . $search . "'</p><p> Din sökning gav tyvärr inga resultat. :( </p>";
            } else {
                echo "<p>Den här kategorin är tyvärr tom. Tryck på plusset för att lägga till ett nytt!</p>";
            }

        } else {
            ?>
            <h2> Här är det tyvärr tomt! </h2>
            <h3> Klicka på "Nytt recept" för att lägga till ditt första recept"</h3>
        <?php }

    }
    ?>
    <div class="row">
        <?php
        foreach ($recipes as $recipe) {
            ?>
            <div class=" mb-2 d-flex align-content-stretch col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card">
                    <?php if ($recipe["img"] != null) { ?>
                        <a href="recept/<?= $recipe["id"] ?>"><img class="card-img-top"
                                                                   src="uploads/<?= $recipe["img"] ?>"
                                                                   alt="<?= $recipe['name'] ?>>"></a>
                    <?php } ?>
                    <div class="card-body">
                        <br>
                        <a href="recept/<?= $recipe["id"] ?>"><h2
                                    class="text-dark"><?= $recipe["name"]; ?></h2></a>
                        <p><?= $recipe["category"] ?></p>
                        <p><?= $recipe["date"] ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="redigeraRecept/<?= $recipe["id"] ?>" class="btn btn-success">Redigera</a>
                        <a onclick="return confirm('Är du säker på att du vill radera receptet?')"
                           href="raderaRecept/<?= $recipe["id"] ?>" class="btn btn-secondary"><i>Radera</i></a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</main>
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
