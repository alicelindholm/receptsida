<?php
require "db.php";

$s = uploadFile($_POST,$_FILES);


//Receptet sparas endast om korrekt fil angetts, alternativt om ingen fil angetts
if($s[0] === "true") {
    $recipe = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    storeRecipe($recipe, $s[1]);
    header("location: index.php");
}


