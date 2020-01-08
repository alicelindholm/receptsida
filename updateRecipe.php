<?php
require "db.php";

$s = uploadFile($_POST, $_FILES);
$img = getOneRecipe($_GET["id"])[0][0]["img"];
//Receptet sparas endast om korrekt fil angetts, alternativt om ingen fil angetts
if ($s[0] === "true") {
    $recipe = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    if ($s[1] === null) {
        updateRecipe($_GET["id"], $recipe, $img);
        header("location: ../");
    }
    else {
        $file = "uploads/$img";
        unlink($file);
        updateRecipe($_GET["id"], $recipe, $s[1]);
        header("location: ../");
    }

}
