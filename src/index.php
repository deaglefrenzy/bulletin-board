<?php

namespace Suryo\Learn;

use Suryo\Learn\Core\Functions;

require '../vendor/autoload.php';

use Carbon\Carbon;
use Suryo\Learn\Core\Router;

use Suryo\Learn\Test;
use Suryo\Learn\Test\TestFunctions;

const BASE_PATH = "/routing/src/";
require_once "routes.php";

//Functions::dd($routes);
$router = new Router();
$uri = $_SERVER['REQUEST_URI'];
//$test = new TestFunctions;
//$test->test();
//Functions::dd($_SERVER);
$router->route($uri, $routes);
//Functions::dd($router);
