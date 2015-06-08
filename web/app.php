<?php
require_once "../vendor/autoload.php";
require_once "../src/Config/routes.php";

\Core\Router\Router::process(\Symfony\Component\HttpFoundation\Request::createFromGlobals());