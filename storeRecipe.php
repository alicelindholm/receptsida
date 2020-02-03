<?php
require "db.php";

$file = uploadFile($_POST,$_FILES);
require "views/storeRecipe.view.php";
