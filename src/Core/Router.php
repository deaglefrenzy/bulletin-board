<?php

namespace Suryo\Learn\Core;

use Suryo\Learn\Core\Functions;

use const Suryo\Learn\BASE_PATH;

class Router
{
    function route(string $uri, array $routes): void
    {
        $path = parse_url($uri)['path'];
        $path = str_replace(BASE_PATH, '', $path);
        //dd($path);
        if (array_key_exists($path, $routes)) {
            require "Controller/" . $routes[$path];
        } else echo "route not found";
    }
}
