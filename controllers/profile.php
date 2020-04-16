<?php
require "db.php";
session_start();
$user = getUser($_SESSION['username']);
    require "views/profile.view.php";

