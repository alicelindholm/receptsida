<?php
require "db.php";
$option = $vars;
$recipes = getAllNames($option);
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
if (isset($get["search"])) {
    $search = $get["search"];
}
require "views//index.view.php";
