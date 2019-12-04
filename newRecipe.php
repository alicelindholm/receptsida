<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nytt recept</title>
</head>
<body>
<h1> Nytt recept </h1>
<form action="storeRecipe.php" method="post">
    <label for="name">Namn: </label>
    <input type="text" name="name" id="name">
    <br>
    <h3>Ingredienser</h3>
    <p> Glöm inte att fylla i mängd!</p>
    <label for="ingredient_1">Ingrediens 1: </label>
    <input type="text" name="ingredient_1" id="ingredient_1">
    <br>
    <label for="ingredient_2">Ingrediens 2: </label>
    <input type="text" name="ingredient_2" id="ingredient_2">
    <br>
    <label for="ingredient_3">Ingrediens 3: </label>
    <input type="text" name="ingredient_3" id="ingredient_3">
    <br>
    <label for="ingredient_4">Ingrediens 4: </label>
    <input type="text" name="ingredient_4" id="ingredient_4">
    <br>
    <label for="ingredient_5">Ingrediens 5: </label>
    <input type="text" name="ingredient_5" id="ingredient_5">
    <br>
    <label for="ingredient_6">Ingrediens 6: </label>
    <input type="text" name="ingredient_5" id="ingredient_6">
    <br>
    <label for="ingredient_7">Ingrediens 7: </label>
    <input type="text" name="ingredient_7" id="ingredient_7">
    <br>
    <label for="ingredient_8">Ingrediens 8: </label>
    <input type="text" name="ingredient_8" id="ingredient_8">
    <br>
    <label for="ingredient_9">Ingrediens 9: </label>
    <input type="text" name="ingredient_9" id="ingredient_9">
    <br>
    <label for="ingredient_10">Ingrediens 10: </label>
    <input type="text" name="ingredient_10" id="ingredient_10">
    <br>
    <h3>Instruktioner</h3>
    <label for="instruction_1">Steg 1: </label> <br>
    <textarea id="instruction_1" name="instruction_1" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_2">Steg 2: </label> <br>
    <textarea id="instruction_2" name="instruction_2" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_3">Steg 3: </label> <br>
    <textarea id="instruction_3" name="instruction_3" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_4">Steg 4: </label> <br>
    <textarea id="instruction_4" name="instruction_4" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_5">Steg 5: </label> <br>
    <textarea id="instruction_5" name="instruction_5" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_6">Steg 6: </label> <br>
    <textarea id="instruction_6" name="instruction_6" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_7">Steg 7: </label> <br>
    <textarea id="instruction_7" name="instruction_7" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_8">Steg 8: </label> <br>
    <textarea id="instruction_8" name="instruction_8" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_9">Steg 9: </label> <br>
    <textarea id="instruction_9" name="instruction_9" rows="10" cols="70"></textarea>
    <br>
    <label for="instruction_10">Steg 10: </label> <br>
    <textarea id="instruction_10" name="instruction_10" rows="10" cols="70"></textarea>
    <br>
    <input type="submit" value="Lägg till recept">

</form>

</body>
</html>
<?php
