<?php
require "db.php";
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

<!--<script>
   // let amountIngredient = <?=$countIngredients?>;
   // let amountInstruction = <?=$countInstructions?>;

/*    function addIngredient() {
        amountIngredient += 1;
        if (amountIngredient < 11) {
            document.getElementById("ingredientBox" + amountIngredient).innerHTML += "<label>Ingrediens "+amountIngredient+":<input type='text' class='form-control' name='ingredient_" + amountIngredient + "' id='ingredient_" + amountIngredient + "' ></label> <br>";
        } else {
            alert("Du kan inte ha mer än 10 ingredienser!")
        }
    }

    function addInstruction() {
        amountInstruction += 1;
        if (amountInstruction < 11) {
            document.getElementById("instructionBox" + amountInstruction).innerHTML += "<label>Steg "+amountInstruction+":<br> <textarea type='text' class='form-control' name='instruction_" + amountInstruction + "' id='instruction_" + amountInstruction + "' rows='5' cols='50'></textarea> </label> <br>";
        } else {
            alert("Du kan inte ha mer än 10 instruktioner!")
        }
    } */
</script> !-->


