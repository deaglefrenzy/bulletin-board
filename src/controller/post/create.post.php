<?php

namespace Suryo\Learn\Controller\post;

use Suryo\Learn\Controller\Posts;

use const Suryo\Learn\BASE_PATH;
use const Suryo\Learn\POSTS_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentData = Posts::parseJSON(POSTS_FILE);
    $newData = new Posts(
        $_POST['post_id'],
        $_POST['post_privilege'],
        $_POST['post_title'],
        $_POST['post_body'],
        $_POST['post_creation_date'],
        $_POST['post_expiry_date']
    );

    $currentData[] = $newData;
    //dd($currentData);
    if (Posts::writeJSON(POSTS_FILE, $currentData)) {
        redirect(BASE_PATH);
    }
}

view("create.post.view.php");
