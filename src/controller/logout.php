<?php

namespace Suryo\Learn\Controller;

use Suryo\Learn\Controller\response\LoginResponses;
use Suryo\Learn\Controller\user\Token;
use const Suryo\Learn\TOKEN_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $allTokens = Token::parseTokens(TOKEN_FILE);
    $token = apache_request_headers()["Authorization"];
    foreach ($allTokens as $row) {
        if ($row->value <> $token) {
            $newData[] = new Token(
                $row->userId,
                $row->expiry,
                $row->value
            );
        }
    }
    if (!$writeJSON(TOKEN_FILE, $newData)) {
        respond(new LoginResponses(401, "Token not found"));
    }
    header_remove('Authorization');
    respond(new LoginResponses(200, "User logged out"));
}
