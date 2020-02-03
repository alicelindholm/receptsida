<?php
require "db.php";
$search = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
var_dump($search);