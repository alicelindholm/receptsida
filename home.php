<?php
require "db.php";
$option = $vars;
$recipes = getAllNames($option);
require "views//index.view.php";
