<?php

namespace Core\Exception\Router;

use Exception;

class RouterException extends Exception{

    function __construct($action, $route)
    {
        parent::__construct("Invalid routing: Action '$action' does not exists or route '$route' can not be called.",500);
    }
}