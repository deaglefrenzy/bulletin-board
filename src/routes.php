<?php

namespace Suryo\Learn;

$routes = [
    "" => "index.php",
    "login" => "login.php",
    "logout" => "logout.php",
    "user" => "user/get.user.php",
    "posts" => "post/get.post.php",
    "posts/create" => "post/create.post.php",
    "posts/delete" => "post/delete.post.php",
];

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
}
