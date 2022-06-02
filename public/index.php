<?php 
    require_once '../vendor/autoload.php';

    
    spl_autoload_register(function($class){
        $root = dirname(__DIR__);
        $file = $root.'/'.str_replace('\\', '/', $class).'.php';
        if(is_readable($file)){
            require $root.'/'.str_replace('\\', '/', $class).'.php';
        }
    });
    // require '../App/Controllers/Posts.php';
    // require('../Core/Router.php');
    // if(array_key_exists('QUERY_STRING', $_SERVER)){
    //     echo "Requested URL = ".$_SERVER['QUERY_STRING']."";
    // }else{
    //     echo 'No query string found in the URL';
    // }

    $router = new Core\Router();

    $router->add('', ['controller' => 'Home', 'action' => 'index']);
      
    $router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
    //$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);
    $router->add('{controller}/{action}');
    $router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
    $router->add('{controller}/{id:\d+}/{action}');
    //echo get_class($router);

    // echo '<pre>';
    //     var_dump($router->getRoutes());
    // echo '</pre>';

    //$url = array_key_exists('QUERY_STRING',$_SERVER) ? $_SERVER['QUERY_STRING'] : '';
    
    // if($router->match($url)){
    //     echo '<pre>';
    //         var_dump($router->getParams());
    //     echo '</pre>';
    // }else{
    //     echo "No route found for URL '$url'";
    // }
    // echo '<pre>';
    // echo htmlspecialchars(print_r($router->getRoutes(), true));
    // echo '</pre>';

    $url = array_key_exists('QUERY_STRING',$_SERVER) ? $_SERVER['QUERY_STRING'] : '';
    $router->dispatch($url);