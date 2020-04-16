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
    <div class="text-center"><h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1>
    <?php
    if(isset($_GET)){
        if(isset($_GET['update']) && $_GET['update'] === 'success'){
    ?>
        <div class="text-center">
            <div class="text-center"><h2 class="display-5">Lyckades ändra! Varsågod att logga in igen.</div>
            </h2>

            <?php
            }
        if(isset($_GET['signup']) && $_GET['signup'] === 'success'){
            ?>
            <div class="text-center"><h2 class="display-5">Välkommen! Varsågod att logga in</h2></div>
            <?php
            }
    }
    else{
        ?>
            <div class="text-center"><h2 class="display-5">Här är det just nu tomt. Logga in eller skapa ett konto för
                    att fylla den här sidan med goda recept!</h2></div>

            <?php
            }
            ?>
            <form action="/loggain" method="post">
        <div class="form-group">

           <input type="text" name="mailuid" placeholder="Användarnamn...">
        </div>
        <div class="form-group">
            <input type="password" name="pwd" placeholder="Password...">
        </div>
            <div class="form-group">
        <button type="submit" name="login-submit" class="btn btn-success">Logga in</button>
       </div>
           <a href="/skapaKonto" class="btn btn-secondary">Skapa konto</a>

    </form>
        </div>
</div>
</main>
</body>
</html>
