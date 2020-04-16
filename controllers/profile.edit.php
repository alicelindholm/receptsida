<?php
require_once "db.php";
session_start();
$user = getUser($_SESSION['username']);
require "views/profile.edit.view.php";