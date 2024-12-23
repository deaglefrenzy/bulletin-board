<?php

namespace Suryo\Learn\Controller\post;

use Suryo\Learn\Controller\response\LoginResponses;
use Suryo\Learn\Controller\user\Token;

use const Suryo\Learn\POSTS_FILE;

$userId = Token::authUser();
$allPosts = Posts::parsePosts(POSTS_FILE);
echojson($allPosts);
