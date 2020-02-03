
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="icon.jpg">
    <title>Receptsida</title>
</head>
<body>
<div class="text-center"><h1 class="display-3"><a class="text-dark" href="../">Receptsida</a></h1></div>
<?php

//Receptet sparas endast om korrekt fil angetts, alternativt om ingen fil angetts
if($file[0] === "true") {
    $recipe = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    storeRecipe($recipe, $file[1]);
    header("location: ../");
}

?>
</body>
</html>