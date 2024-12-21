<?php

namespace Suryo\Learn\Controller\user;

use Carbon\Carbon;
use Exception;

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

    static function sendToken()
    {
        $loggedIn[] = Token::parseTokens(TOKEN_FILE);
        header("token: " . $loggedIn[array_key_last($loggedIn)]->value);
    }
}
