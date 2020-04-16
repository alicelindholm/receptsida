<?php
require "vendor/autoload.php";



$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/[/]', 'controllers/home.php');

    $r->addRoute('GET', '/profil[/]', 'controllers/profile.php');
    $r->addRoute('GET', '/profil/redigera/{id}[/]', 'controllers/profile.edit.php');
    $r->addRoute('POST', '/loggain[/]', 'includes/login.inc.php');
    $r->addRoute('GET', '/skapaKonto[/]', 'controllers/signup.php');
    $r->addRoute('POST', '/sparaKonto[/]', 'includes/signup.inc.php');
    $r->addRoute('GET', '/recept/{id}[/]', 'controllers/recipe.php');
    $r->addRoute('GET', '/nyttRecept[/]', 'controllers/newRecipe.php');
    $r->addRoute('GET', '/redigeraRecept/{id}[/]', 'controllers/editRecipe.php');
    $r->addRoute('POST', '/sparaRecept[/]', 'includes/storeRecipe.inc.php');
    $r->addRoute('POST', '/uppdateraRecept/{id}[/]', 'includes/updateRecipe.inc.php');
    $r->addRoute('GET', '/raderaRecept/{id}[/]', 'includes/deleteRecipe.inc.php');
    $r->addRoute('GET', '/{option}[/]', 'controllers/home.php');
    $r->addRoute('POST', '/loggaUt[/]', 'includes/logout.inc.php');
    $r->addRoute('POST', '/uppdateraAnvändare[/]', 'includes/updateUser.inc.php');
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