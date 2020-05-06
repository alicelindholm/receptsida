<?php
require_once "db.php";
session_start();
$dines = getAllDines($_SESSION['id']);
$number = array_rand($dines,1);
$recipe = getOneRecipe($dines[$number]['id']);

//Ta bort id
$arrayShift = array_shift($recipe[1][0]);
$arrayShift = array_shift($recipe[2][0]);

//Ta bort userId
array_pop($recipe[1][0]);
array_pop($recipe[2][0]);
require "views/recipe.view.php";