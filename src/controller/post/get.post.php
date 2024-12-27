<?php

namespace Suryo\Learn\Controller\post;

use PostsJSONRepository;
use Suryo\Learn\Controller\Response\PostResponses;
use Suryo\Learn\Controller\user\Token;

use const Suryo\Learn\POSTS_FILE;

$user = Token::authUser();

//$repository = new PostsJSONRepository()

$allPosts = Posts::parsePosts(POSTS_FILE);
//respond(new PostResponses(200, "User logged in: " . $user->userName, $repository->getAll()));
respond(new PostResponses(200, "User logged in: " . $user->userName, $allPosts));
