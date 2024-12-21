<?php

namespace Suryo\Learn\Controller\user;

use Exception;

$users = [
    [
        "userId" => "1",
        "userName" => "suryo",
        "password" => "123",
    ],
    [
        "userId" => "2",
        "userName" => "roon",
        "password" => "321",
    ],
];

class Users
{
    public int $userId;
    public string $userName;
    public string $password;

    function __construct($userId, $userName, $password)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->password = $password;
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
                );
            }
            fclose($handle);

            return $result;
        } else die("Can't open file.");
    }
}
