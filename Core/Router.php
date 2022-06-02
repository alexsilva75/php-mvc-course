<?php

namespace Core;

class Router{

    protected $routes = [];

    protected $params = [];

    public function add($route, $params = []){
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)', $route);

        $route = "/^$route$/i";

        $this->routes[$route] = $params;
    }


    public function getRoutes(){
        return $this->routes;
    }

    public function match($url){
        // foreach($this->routes as $route => $params){
        //     if($url == $route){
        //         $this->params = $params;
        //         return true;
        //     }
        // }

        //$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
        foreach($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                //$params = [];
                
                foreach ($matches as $key => $match){
                    if(is_string($key)){
                        $params[$key] = $match;
                    }
                }
                
                $this->params = $params;
                return true;
            }            
        }    
        
        return false;
    }

    public function getParams(){
        return $this->params;
    }


    public function dispatch($url){
        $url = $this->removeQueryStringVariables($url);

        if($this->match($url)){
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            //$controller = "App\Controllers\\$controller";

            $controller = $this->getNamespace().$controller;

            if(class_exists($controller)){
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(preg_match('/action/i', $action) == 0){
                    $controller_object->$action();
                }else{
                   // echo "Method $action (in controller $controller) not found";
                   throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            }else{
                echo "Controller class $controller not found";

            }
        }else{
            echo 'No route matched';
        }
    }

    protected function convertToStudlyCaps($string){
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string){
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function removeQueryStringVariables($url){
        if($url != ''){
            $parts = explode('&', $url, 2);

            if(strpos($parts[0],'=')=== false){
                $url = $parts[0];
            } else {
                $url = 'home/index';
            }

            return $url;
        }
    }

    protected function getNamespace(){
        $namespace = 'App\Controllers\\';
        if(array_key_exists('namespace', $this->params)){
            $namespace .= $this->params['namespace'].'\\';
        }

        return $namespace;
    }
}