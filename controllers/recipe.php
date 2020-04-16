<?php
require "db.php";
$id = $vars["id"];
$recipe = getOneRecipe($id);

//Ta bort id
$arrayShift = array_shift($recipe[1][0]);
$arrayShift = array_shift($recipe[2][0]);

//Ta bort userId
array_pop($recipe[1][0]);
array_pop($recipe[2][0]);
require "views/recipe.view.php";
