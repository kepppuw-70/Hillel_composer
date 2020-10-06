<?php

namespace Core;

class Router
{
    protected $routes = [];
    
    protected $requestUri;
    
    protected $requestMethod;
    
    protected $requestHandler;
    
    protected $params = [];
    
    protected $placeholders = [
        ':seg' => '([^\/]+)',
        ':num'  => '([0-9]+)',
        ':any'  => '(.+)'
    ];
    
    
    public function __construct($uri, $method = 'GET')
    {
        $this->requestUri = $uri;
        $this->requestMethod = $method;
    }
    
    public static function fromGlobals()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);

        }
        $uri = rawurldecode($uri);

        

        return new static($uri, $_SERVER['REQUEST_METHOD']);
    }

    
    public function getRequestUri()
    {
        return $this->requestUri; // ?: '/';
    }
    
    
    public function getRequestMethod()
    {
        return $this->requestMethod;
    }
    
    
    public function getRequestHandler()
    {
        return $this->requestHandler;
    }
    
    
    public function setRequestHandler($handler)
    {
        $this->requestHandler = $handler;
    }
    
    
    public function getParams()
    {
        return $this->params;
    }
    
    public function add($route, $handler = null)
    {
        if ($handler !== null && !is_array($route)) {
            $route = array($route => $handler);
        }
        $this->routes = array_merge($this->routes, $route);

        return $this;
    }

    public function isFound()
    {
        $uri = $this->getRequestUri();
        
        if (isset($this->routes[$uri])) {
            $this->requestHandler = $this->routes[$uri];
            return true;
        }
       
        $find    = array_keys($this->placeholders);
        $replace = array_values($this->placeholders);
        
        foreach ($this->routes as $route => $handler) {
            
            if (strpos($route, ':') !== false) {
                $route = str_replace($find, $replace, $route);
            }

           
            if (preg_match('#^' . $route . '$#', $uri, $matches)) {
                $this->requestHandler = $handler;
                $this->params = array_slice($matches, 1);
                return true;
                //var_export($handler);
            }
        }
        
        return false;
    }

    
    public function executeHandler($handler = null, $params = array())
    {
        if ($handler === null) {
            throw new \InvalidArgumentException(
                'Request handler not setted out. Please check '.__CLASS__.'::isFound() first'
            );
        }
        
       
        if (is_callable($handler)) {
            return call_user_func_array($handler, $params);
        }

        if (strpos($handler, '@')) {
            $ca = explode('@', $handler);
            $controllerName = $ca[0];
            $action = $ca[1];

            if (class_exists($controllerName)) {
                $controller = new $controllerName();
            } else {
                throw new \RuntimeException("Controller class '{$controllerName}' not found");
            }
            if (!method_exists($controller, $action)) {
                throw new \RuntimeException("Method '{$controllerName}::{$action}' not found");
            }
            
            return call_user_func_array(array($controller, $action), $params);
        }
    }
}
