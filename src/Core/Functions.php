<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function redirect($url, $statusCode = 302)
{
    if (headers_sent() === false) {
        header('Location: ' . $url, true, $statusCode);
        exit;
    }
}


function view($path)
{
    require 'Views/' . $path;
}
