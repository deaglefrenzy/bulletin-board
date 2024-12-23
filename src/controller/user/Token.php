<?php

namespace Suryo\Learn\Controller\user;

use Carbon\Carbon;
use Exception;
use Suryo\Learn\Controller\response\LoginResponses;

use const Suryo\Learn\TOKEN_FILE;

class Token
{
    public int $userId;
    public string $expiry;
    public string $value;

    function __construct($userId, $expiry, $value)
    {
        $this->userId = $userId;
        $this->expiry = $expiry;
        $this->value = $value;
    }

    static function parseTokens($file): array
    {
        if ($handle = fopen($file, 'r')) {

            $jsonData = decodeJSON($file);
            $result = [];
            foreach ($jsonData as $row) {
                if (Carbon::now() < $row->expiry) {
                    $result[] = new Token(
                        $row->userId,
                        $row->expiry,
                        $row->value,
                    );
                }
            }
            fclose($handle);

            return $result;
        } else die("Can't open file.");
    }


    static function authUser(): int
    {
        $token = apache_request_headers()["Authorization"];
        $loggedIn = Token::parseTokens(TOKEN_FILE);
        foreach ($loggedIn as $row) {
            if ($row->value === $token) {
                return $row->userId;
                break;
            }
        }
        \respond(new LoginResponses(401, "You are not authorized to do this"));
    }
}
