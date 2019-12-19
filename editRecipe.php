<?php
require "db.php";
echo "<p>Visar recept med id <strong>".$vars['id']."</strong></p>";
var_dump($vars);
$id = $vars["id"];
$recipe = getOneRecipe($id);
//Ta bort id
$arrayShift = array_shift($recipe[1][0]);
$arrayShift = array_shift($recipe[2][0]);
require "views/editRecipe.view.php";