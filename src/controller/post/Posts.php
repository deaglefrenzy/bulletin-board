<?php

namespace Suryo\Learn\Controller\post;

use DateTime;
use Exception;

$posts = [
    [
        'postId' => 1,
        'userId' => 1,
        'priv' => false,
        'title' => 'My First Post',
        'body' => 'This is the content of my first post.',
        'created' => '2023-11-22',
        'expiry' => '2024-01-01',
    ],
    [
        'postId' => 2,
        'userId' => 2,
        'priv' => true,
        'title' => 'Private Thoughts',
        'body' => 'This post is only visible to me.',
        'created' => '2023-12-05',
        'expiry' => '2023-12-10',
    ],
    [
        'postId' => 3,
        'userId' => 1,
        'priv' => false,
        'title' => 'A Question for the Community',
        'body' => 'Can anyone help me with this problem?',
        'created' => '2023-12-15',
        'expiry' => '2023-12-15',
    ],
];

class Posts
{
    public int $postId;
    public int $userId;
    public bool $priv = false;
    public string $title;
    public string $body;
    public string $created;
    public string $expiry;

    function __construct($postId, $userId, $priv, $title, $body, $created, $expiry)
    {
        $this->postId = $postId;
        $this->userId = $userId;
        $this->priv = filter_var($priv, FILTER_VALIDATE_BOOLEAN);
        $this->title = $title;
        $this->body = $body;
        $this->created = $created;
        $this->expiry = $expiry;
    }

    static function parsePosts($file): array
    {
        if ($handle = fopen($file, 'r')) {
            $jsonData = decodeJSON($file);
            $result = [];
            foreach ($jsonData as $row) {
                $result[] = new Posts(
                    $row->postId,
                    $row->userId,
                    $row->priv,
                    $row->title,
                    $row->body,
                    $row->created,
                    $row->expiry
                );
            }
            fclose($handle);

            return $result;
        } else die("Can't open file.");
    }
}
