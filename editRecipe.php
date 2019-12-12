<?php
require "db.php";
$id = $_GET["id"];
$recipe = getOneRecipe($id);
//Ta bort id
$arrayShift = array_shift($recipe[1][0]);
$arrayShift = array_shift($recipe[2][0]);
require "views/editRecipe.view.php";