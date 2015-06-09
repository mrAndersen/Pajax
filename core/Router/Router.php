<?php

namespace Core\Router;

use Controller\MainController;
use Symfony\Component\HttpFoundation\Request;
use Core\Exception\Router\RouteAddException;

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
        $projectDir         = str_replace('/web','',$_SERVER['DOCUMENT_ROOT']);

       return is_callable($controllerFileName,$actionName) && file_exists($projectDir."/src/Controller/".$controllerFileName.".php");
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
                throw new RouteAddException($action,$route);
            }
        }else{
            throw new RouteAddException($action,$route);
        }
    }


    public static function executeAction($roting)
    {

    }





}