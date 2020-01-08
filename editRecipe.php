<?php
require "db.php";
$id = $vars["id"];
$recipe = getOneRecipe($id);

$countIngredients = counts("ingredient", "1", $recipe);
$countInstructions = counts("instruction", "2", $recipe);

function counts($value, $number, $recipe)
{
    $count = 0;
    for ($i = 1; $i < 10; $i++) {
        if ($recipe[$number][0][$value . '_' . $i] != "") {
            $count += 1;
        }
    }
    return $count;
}

require "views/editRecipe.view.php";