<?php
require "db.php";
$file = uploadFile($_POST,$_FILES);
var_dump($_POST);
require "views/storeRecipe.view.php";
//Receptet sparas endast om korrekt fil angetts, alternativt om ingen fil angetts
if($file[0] === "true") {
    $recipe = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    storeRecipe($recipe, $file[1]);
    //header("location: ../");
}
