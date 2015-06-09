<?php

namespace Lib\Config;

use Core\Router\Router;

Router::addRoute('/','MainController:index',Router::TYPE_KERNEL);