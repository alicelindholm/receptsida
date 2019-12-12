<?php
require "db.php";
$id = $_GET;
deleteRecipe($id);

header("location: ../");