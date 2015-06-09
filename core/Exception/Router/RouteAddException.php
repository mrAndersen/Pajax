<?php

namespace Core\Exception\Router;

use Exception;

class RouteAddException extends Exception{

    function __construct($action, $route)
    {
        parent::__construct("Error while adding route: Action '$action' can not be called or route '$route' does not exists.",200);
    }
}