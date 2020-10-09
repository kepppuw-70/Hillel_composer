<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use Core\Router;
include 'template/template.php';
$route = include __DIR__ . '/../app/Config/Route.php';
$router = Router::fromGlobals();
$router->add('/', function () {
    echo '<h1>Hello Wold!</h1>';
});
$router->add($route);
if ($router->isFound()) {
    $router->executeHandler(
        $router->getRequestHandler(),
        $router->getParams()
    );
} 
else {
       $router->executeHandler(function () {
        http_response_code(404);
        $_SESSION['path'] = $_SERVER['REQUEST_URI'];
        $notfound = new App\Controllers\ControllerNotFound();
        $notfound->priceNotFound();
        
    });
}
