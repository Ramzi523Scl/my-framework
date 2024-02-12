<?php

use MyFramework\Framework\Http\Kernel;
use MyFramework\Framework\Http\Request;
use MyFramework\Framework\Http\Response;

define('BASE_PATH', dirname(__DIR__));
require BASE_PATH . "/vendor/autoload.php";

$request = Request::createFromGlobals();

$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
