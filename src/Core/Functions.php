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

function getHighestNumber(array $arr, string $key): ?float
{
    if (empty($arr)) {
        return null; // Handle empty array
    }

    $highest = null;

    foreach ($arr as $item) {
        if (!is_array($item) || !array_key_exists($key, $item)) {
            continue; // Skip items without the key or if not an array
        }

        $value = $item[$key];

        if (is_numeric($value)) {
            $numValue = (float)$value; // Convert to float for accurate comparisons
            if ($highest === null || $numValue > $highest) {
                $highest = $numValue;
            }
        }
    }

    return $highest;
}
