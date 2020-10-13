
<?php
require_once 'connection.php';
require __DIR__ . '/../vendor/autoload.php';
use Core\Router;
$route = include __DIR__ . '/../app/Config/Route.php';
$view = new App\View\View();
$view->onView();
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
        $notfound = new App\Controllers\ControllerNotFound();
        $notfound->priceNotFound();
        
    });
}

$connecter = new Core\Db\Connecter();
$connecter->setConnecter($host, $database, $user, $password);
$connecter->connecterDb();


