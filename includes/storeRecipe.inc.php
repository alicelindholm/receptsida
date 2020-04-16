<?php
require "db.php";
session_start();
$userId = $_SESSION['id'];
$file = uploadFile($_POST,$_FILES);
require "views/storeRecipe.view.php";
//Receptet sparas endast om korrekt fil angetts, alternativt om ingen fil angetts
if($file[0] === "true") {
    $recipe = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    storeRecipe($recipe, $file[1], $userId);
    header("location: ../");
}
