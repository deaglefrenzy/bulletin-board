<?php

namespace Suryo\Learn\Controller;

use Exception;

$posts = [
    [
        'postId' => 1,
        'priv' => false,
        'title' => 'My First Post',
        'body' => 'This is the content of my first post.',
        'created' => '2023-11-22 12:34:56',
        'expiry' => '2024-01-01 00:00:00',
    ],
    [
        'postId' => 2,
        'priv' => true,
        'title' => 'Private Thoughts',
        'body' => 'This post is only visible to me.',
        'created' => '2023-12-05 18:23:15',
        'expiry' => '2023-12-10 23:59:59',
    ],
    [
        'postId' => 3,
        'priv' => false,
        'title' => 'A Question for the Community',
        'body' => 'Can anyone help me with this problem?',
        'created' => '2023-12-15 10:45:30',
        'expiry' => null,
    ],
];

function writeJSON($file, array $data, $mode): string
{
    if ($handle = fopen($file, $mode)) {
        fwrite($handle, json_encode($data));
        fclose($handle);
        return "Data written.";
    } else {
        return "Unable to open file for writing.";
    }
}

function parseJSON($file): array
{
    if ($handle = fopen($file, 'r')) {
        $jsonContent = file_get_contents($file);

        if ($jsonContent === false) {
            throw new Exception("Failed to read JSON file: $file");
        }

        $jsonData = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error parsing JSON: ' . json_last_error_msg());
        }

        return $jsonData;
    } else die("Can't open file.");
}
writeJSON("posts.json", $posts, "w");
redirect("posts.json");
