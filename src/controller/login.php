<?php

namespace Suryo\Learn\Controller;

use Suryo\Learn\Controller\user\Users;
use Suryo\Learn\Controller\user\Token;
use Carbon\Carbon;
use Suryo\Learn\Controller\Response\LoginResponses;

use const Suryo\Learn\USERS_FILE;
use const Suryo\Learn\TOKEN_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    // if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    // }

    //dd(apache_request_headers()["Authorization"]);

    $currentData = Users::parseUsers(USERS_FILE);
    $input = json_decode(file_get_contents('php://input'));
    foreach ($currentData as $row) {
        if ($row->userName === $input[0]->userName) {
            if ($row->password === $input[0]->password) {
                $userId = $row->userId;
                break;
            }
            respond(new LoginResponses(401, "Password doesn't match"));
        }
        respond(new LoginResponses(403, "User not found"));
    }
    $userToken = generateToken();
    $newLogin = new Token(
        $userId,
        Carbon::now()->addDays(3),
        $userToken
    );
    $loggedIn = Token::parseTokens(TOKEN_FILE);

    $loggedIn[] = $newLogin;
    if (!writeJSON(TOKEN_FILE, $loggedIn)) {
        die();
    }
    $user[] = $newLogin;
    respond(new LoginResponses(200, "User logged in", $user));
}
