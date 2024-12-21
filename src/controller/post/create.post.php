<?php

namespace Suryo\Learn\Controller\post;

use const Suryo\Learn\BASE_PATH;
use const Suryo\Learn\POSTS_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //http_response_code(402);
    //dd("UNAUTHORIZED");
    $currentData = Posts::parsePosts(POSTS_FILE);
    //dd($_POST);
    $input = json_decode(file_get_contents('php://input'));
    //dd($input);
    $newData = new Posts(
        $input->postId,
        $input->priv,
        $input->title,
        $input->body,
        $input->created,
        $input->expiry
    );
    //dd($newData);
    $currentData[] = $newData;
    //dd($currentData);
    if (writeJSON(POSTS_FILE, $currentData)) {
        dd("POST CREATED");
    }
}

// dd("HELLO WORLD 2");

//view("create.post.view.php");
