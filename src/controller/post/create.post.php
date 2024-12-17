<?php

namespace Suryo\Learn\Controller\post;

use Suryo\Learn\Controller\Posts;

use const Suryo\Learn\BASE_PATH;
use const Suryo\Learn\POSTS_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentData = Posts::parseJSON(POSTS_FILE);
    $newData = [
        'postId' => $_POST['post_id'],
        'priv' => $_POST['post_privilege'],
        'title' => $_POST['post_title'],
        'body' => $_POST['post_body'],
        'created' => $_POST['post_creation_date'],
        'expiry' => $_POST['post_expiry_date']
    ];
    $currentData[] = $newData;
    if (Posts::writeJSON(POSTS_FILE, $currentData, "w")) {
        redirect(BASE_PATH);
    }
}

view("create.post.view.php");
