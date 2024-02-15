<?php

use MyFramework\Framework\Http\Kernel;
use MyFramework\Framework\Http\Request;
use MyFramework\Framework\Http\Response;

define('BASE_PATH', dirname(__DIR__));
const BASE_URL = 'http://localhost:8000';

require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . "/framework/lib/dev/dev.php";

$request = Request::createFromGlobals();

$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
