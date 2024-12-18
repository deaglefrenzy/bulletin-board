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

function getHighestValue(array $objects, string $propertyName): ?float
{
    if (empty($objects)) {
        return null; // Handle empty array case
    }

    $highestValue = -INF; // Initialize with negative infinity

    foreach ($objects as $object) {
        if (isset($object->$propertyName) && is_numeric($object->$propertyName)) {
            if ($object->$propertyName > $highestValue) {
                $highestValue = $object->$propertyName;
            }
        }
    }

    return $highestValue;
}
