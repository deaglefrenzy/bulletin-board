<?php

namespace Suryo\Learn;

require '../vendor/autoload.php';

use Carbon\Carbon;
use Suryo\Learn\Core\Router;

const BASE_PATH = "/bulletin-board/src/";
const POSTS_FILE = "Controller/post/posts.json";
const USERS_FILE = "Controller/user/users.json";
const TOKEN_FILE = "Controller/user/token.json";

require_once "routes.php";

$router = new Router();
$uri = $_SERVER['REQUEST_URI'];
//dd($uri);
$router->route($uri, $routes);
