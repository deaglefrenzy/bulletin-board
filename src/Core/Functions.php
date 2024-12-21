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

function decodeJSON($file): array
{
    $jsonContent = file_get_contents($file);
    if ($jsonContent === false) {
        throw new Exception("Failed to read JSON file: $file");
    }

    $jsonData = json_decode($jsonContent);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Error parsing JSON: ' . json_last_error_msg());
    }
    return $jsonData;
}

function writeJSON($file, array $data): string
{
    if ($handle = fopen($file, "w")) {
        $array = (array) $data;
        fwrite($handle, json_encode($array));
        fclose($handle);
        return "Data written.";
    } else {
        return "Unable to open file for writing.";
    }
}

function generateToken($length = 20): string
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $tokenValue = '';

    for ($i = 0; $i < $length; $i++) {
        $tokenValue .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $tokenValue;
}

function respond($statusCode, $message, $data = [])
{
    http_response_code($statusCode);
    header('Content-Type: application/json');

    $response = [
        'status' => $statusCode,
        'message' => $message,
        'data' => $data
    ];

    echo json_encode($response);
    die();
}
