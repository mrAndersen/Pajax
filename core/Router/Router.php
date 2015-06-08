<?php

namespace Core\Router;

use Symfony\Component\HttpFoundation\Request;
use Core\Exception\Router\RouterException;
use Symfony\Component\Filesystem\Filesystem;

abstract class Router {

    const TYPE_AJAX = 0;
    const TYPE_KERNEL = 1;

    private static $routes;


    public static function process(Request $request)
    {

        die;

    }

    private static function addKernelRoute()
    {

    }

    private static function isValidAction($action)
    {
        $parts              = explode(':',$action);
        $controllerFileName = $parts[0];
        $actionName         = $parts[1]."Action";

        $targetControllerClass  = __DIR__."../../src/Controller/".$controllerFileName.".php";


        return  method_exists($controllerFileName,$actionName);
    }

    private static function isValidRouteString($string)
    {
        return true;
    }

    public static function addRoute($route,$action,$type)
    {
        if($route && $action && $type && in_array($type,[self::TYPE_AJAX,self::TYPE_KERNEL])){
            if(self::isValidAction($action) && self::isValidRouteString($route)){
                $route = [
                    'route' => $route,
                    'action' => $action,
                    'type' => $type
                ];
                self::$routes[] = $route;
            }else{
                throw new RouterException($action,$route);
            }
        }else{
            throw new RouterException($action,$route);
        }
    }


    public static function executeAction($roting)
    {

    }





}