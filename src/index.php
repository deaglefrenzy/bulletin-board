<?php

namespace Suryo\Learn;

require '../vendor/autoload.php';

use Carbon\Carbon;
use Suryo\Learn\Core\Router;

const BASE_PATH = "/bulletin-board/src/";
const POSTS_FILE = "posts.json";
const USERS_FILE = "users.json";
const SESSION_FILE = "session.json";

require_once "routes.php";

$router = new Router();
$uri = $_SERVER['REQUEST_URI'];
//dd($uri);
$router->route($uri, $routes);
