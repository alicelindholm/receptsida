<?php
require "db.php";
var_dump($_POST);
$recipe = filter_input_array(INPUT_POST,FILTER_SANITIZE_SPECIAL_CHARS);

storeRecipe($recipe);

