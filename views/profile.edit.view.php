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
        <div class="text-center"><h1 class="display-3"><a class="text-dark" href="../../">Receptsida</a></h1></div>


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
                    <li class="nav-item active">
                        <a class="nav-link" href="/profil">Profil<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form action="/loggaUt.inc" method="post">
                    <button type="submit" class="btn btn-secondary" name="logout-submit">Logga ut</button>
                </form>
            </div>
        </nav>
        <div class="row">
            <h2 class="col-sm-3">Din profil</h2>
            <a href="/profil/redigera/<?= $user['id'] ?>">Redigera</a>
        </div>
        <h3>Dina uppgifter:</h3>
        <form action="/uppdateraAnvändare" method="post">
            <div class="form-group">
                <div class="m-1">
                    <div class="bg-light">
                        <div class="row">
                            <h4 class="col-sm">Användarnamn: </h4>
                            <div class="col">
                                <input type="text" class="form-control" name="username"
                                       value="<?= $user['username'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-1">
                    <div class="bg-light">
                        <div class="row">
                            <h4 class="col-sm">Email: </h4>
                            <div class="col">
                                <input type="text" class="form-control" name="email" value="<?= $user['email'] ?>">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="m-1">
                    <div class="bg-light">
                        <div class="row">
                            <h4 class="col-sm">Nytt lösenord </h4>
                            <div class="col">
                                <input type="password" class="form-control" name="pwd" placeholder="***">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="bg-light">
                    <div class="row">
                        <h4 class="col-sm">Bekräfta nytt lösenord: </h4>
                        <div class="col">
                            <input type="password" class="form-control" name="pwd-repeat" value="" placeholder="***">
                        </div>

                    </div>
                </div>
                <div class="mt-1">
                    <div class="float-right">
                        <input type="submit" class="btn btn-success" name="submit" value="Spara ändringar">
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_GET['error'])) {
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
