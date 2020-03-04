<?php
require "vendor/autoload.php";



$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'home.php');
    $r->addRoute('GET', '//', 'home.php');
    $r->addRoute('GET', '/login', 'login.php');
    $r->addRoute('POST', '/login.inc', 'includes/login.inc.php');
    $r->addRoute('GET', '/signup', 'signup.php');
    $r->addRoute('GET', '/signup.inc', 'includes/signup.inc.php');
    $r->addRoute('GET', '/recept/{id}', 'recipe.php');
    $r->addRoute('GET', '/nyttRecept', 'newRecipe.php');
    $r->addRoute('GET', '/redigeraRecept/{id}', 'editRecipe.php');
    $r->addRoute('POST', '/sparaRecept', 'includes/storeRecipe.php');
    $r->addRoute('POST', '/uppdateraRecept/{id}', 'includes/updateRecipe.php');
    $r->addRoute('GET', '/raderaRecept/{id}', 'includes/deleteRecipe.php');
    $r->addRoute('GET', '/{option}', 'home.php');
    $r->addRoute('POST', '/sökRecept', 'includes/searchRecipe.php');
    // {id} must be a number (\d+)
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        require "home.php";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        require $handler;
        break;
}