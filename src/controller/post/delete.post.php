<?php

namespace Suryo\Learn\Controller\post;

use Suryo\Learn\Controller\Response\PostResponses;
use Suryo\Learn\Controller\user\Token;

use const Suryo\Learn\POSTS_FILE;

dd($_SERVER["REQUEST_METHOD"]);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $currentData = Posts::parsePosts(POSTS_FILE);
    $input = json_decode(file_get_contents('php://input'))[0];
    dd($input->userId);
    $user = Token::authUser();
    // $newData = new Posts(
    //     $input->postId,
    //     $user->userId,
    //     $input->priv,
    //     $input->title,
    //     $input->body,
    //     $input->created,
    //     $input->expiry
    // );
    // $currentData[] = $newData;
    // $newPost[] = $newData;
    // if (!writeJSON(POSTS_FILE, $currentData)) {
    //     respond(new PostResponses(401, "Post creation failed"));
    // }
    // respond(new PostResponses(200, "Post created", $newPost));
}
