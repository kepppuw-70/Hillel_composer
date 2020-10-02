<?php
namespace liw\core;

class Router
{
    
    private $routes = [];
    private $httpHost;
    private $requestUri;
    
    public function run() 
    {
        if(array_key_exists($this->requestUri, $this->routes)) {
          $parser = new ControllerNameParser;
          $checkController = $parser->parse($this->routes[$this->requestUri]);
          if ($checkController) {
            $controller = $parser->getController();
            $contrObj = new $controller();

            $action = $parser->getActionName();
            $contrObj->$action();
            /*
            $reflectionController = new \ReflectionClass($parser->getController());
            $method = $reflectionController->getMethod($parser->getActionName());
            $method->invokeArgs($contrObj, $this->requestParams);
            */
            
          } else {
               throw new \Exception($parser->getErrorMessage());
          }
        } else {
             throw new \Exception('Controller' . $this->requestUri . 'absent');
        }

        
    }

    public function __construct()
    {
       echo 'Создался экземпляр класса core\Router.php<br>';
       $this->setRoutes();
       $this->setServerParams();
    }

    private function setRoutes(): void
    {
      
        $this->routes = include __DIR__ . '/../app/Config/Route.php';
    }

    private function setServerParams(): void
    {
      $this->httpHost = $_SERVER['HTTP_HOST'];
      $this->requestUri = $_SERVER['REQUEST_URI'];
    
        
      //var_export($this->httpHost);
      var_export($this->requestUri);
      //var_export($_SERVER);
    }



    
}

?>