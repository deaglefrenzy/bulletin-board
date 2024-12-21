<?php

namespace Suryo\Learn\Controller;

use Suryo\Learn\Controller\user\Users;
use Suryo\Learn\Controller\user\Token;
use Carbon\Carbon;

use const Suryo\Learn\BASE_PATH;
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
    //dd($input);
    foreach ($currentData as $row) {
        if ($row->userName === $input->userName) {
            if ($row->password === $input->password) {
                $userId = $row->userId;
                break;
            }
            respond(401, "Wrong password");
        }
        respond(403, "User not found");
    }

    $newLogin = new Token(
        $userId,
        Carbon::now()->addDays(3),
        generateToken()
    );

    $loggedIn = Token::parseTokens(TOKEN_FILE);

    //filter token dari user yg sama
    foreach ($loggedIn as $row) {
        if ($row->userId <> $userId) {
            $newData[] = new Token(
                $row->userId,
                $row->expiry,
                $row->value
            );
        }
    }

    $newData[] = $newLogin;
    if (writeJSON(TOKEN_FILE, $newData)) {
        //Token::sendToken();
        respond(200, "User logged in", $newLogin);
    }
}
