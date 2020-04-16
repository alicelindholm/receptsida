<?php
require "db.php";
$id = $vars["id"];
deleteRecipe($id);

header("location: ../");