<?php
require "db.php";
session_start();
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    if (!isset($vars)) {
        $vars = "";
    }
    $option = $vars;
    $recipes = getAllRecipes($option, $userId);
    $get = filter_input_array(INPUT_GET, FILTER_SANITIZE_SPECIAL_CHARS);
    if (isset($get["search"])) {
        $search = $get["search"];
    }
    require "views//index.view.php";
} else {
    require_once "views/loggedOut.view.php";
}


