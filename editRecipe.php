<?php
require "db.php";
var_dump($vars);
$id = $vars["id"];
$recipe = getOneRecipe($id);

$countIngredients = countNotEmpty("ingredient", "1", $recipe);
$countInstructions = countNotEmpty("instruction", "2", $recipe);

/**
 * @param $value
 * @param $number
 * @param $recipe
 * @return int
 */
function countNotEmpty($value, $number, $recipe)
{
    $count = 0;
    for ($i = 1; $i < 10; $i++) {
        if ($recipe[$number][0][$value . '_' . $i] != "") {
            $count += 1;
        }
    }
    return $count;
}

require "views/editRecipe.view.php"; ?>


<script src="main.js"></script>


