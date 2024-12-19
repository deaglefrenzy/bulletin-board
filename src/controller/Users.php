<?php

namespace Suryo\Learn\Controller;

use Exception;

$users = [
    [
        "userId" => "1",
        "userName" => "suryo",
        "password" => "123",
        "token" => "abcede",
    ],
    [
        "userId" => "2",
        "userName" => "roon",
        "password" => "321",
        "token" => "edcab",
    ],
];

class Users
{
    public int $userId;
    public string $userName;
    public string $password;
    public string $token;

    function __construct($userId, $userName, $password, $token)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->password = $password;
        $this->token = $token;
    }

    static function parseUsers($file): array
    {
        if ($handle = fopen($file, 'r')) {

            $jsonData = decodeJSON($file);
            $result = [];
            foreach ($jsonData as $row) {
                $result[] = new Users(
                    $row->userId,
                    $row->userName,
                    $row->password,
                    $row->token,
                );
            }
            fclose($handle);

            return $result;
        } else die("Can't open file.");
    }
}
