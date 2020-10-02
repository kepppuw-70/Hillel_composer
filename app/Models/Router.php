<?php
namespace liw\app\Models;

class Router
{
    
    private $routes = [];
    private $httpHost;
    private $requestUri;
    
    public function run() 
    {  
      
        var_export($this->routes);
        echo '<br>';
        var_export($this->httpHost);
        echo '<br>';
        var_export($this->requestUri);
        echo '<br><br><br><br><br>';
        var_dump($_SERVER);
        echo '<br><br><br><br><br>';
      /*
        if(array_key_exists($this->requestUri, $this->routes)) {
          $parser = new ControllerNameParser;
          $checkController = $parser->parse($this->routes[$this->requestUri]);
          if ($checkController) {
            $controller = $parser->getController();
            $contrObj = new $controller();
            $reflectionController = new \ReflectionClass($parser->getController());
            $method = $reflectionController->getMethod($parser->getActionName());
            $method->invokeArgs($contrObj, $this->requestParams);
            //$action = $parser->getActionName();
            //$actionObj = new $action();
          } else {
               throw new \Exception($parser->getErrorMessage());
          }
        } else {
             throw new \Exception('Controller' . $this->requestUri . 'absent');
        }
        */
    }

    public function __construct()
    {
       echo 'Создался экземпляр класса app\Models\Router.php<br>';
       $this->setRoutes();
       $this->setServerParams();
    }

    private function setRoutes(): void
    {
      //$this->routes = include APP_ABSOLUTE_PATH . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'route.php';
        $this->routes = include __DIR__ . '/../../app/Config/Route.php';
    }

    private function setServerParams(): void
    {
      $this->httpHost = $_SERVER['HTTP_HOST'];
      $this->requestUri = $_SERVER['REQUEST_URI'];
      /*
      var_export($this->httpHost);
      var_export($this->requestUri);
      var_export($_SERVER);
      */
    }



    
}

?>