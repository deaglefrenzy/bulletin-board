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

    static function parseUsers($file, $search = NULL): array
    {
        if ($handle = fopen($file, 'r')) {

            $jsonData = decodeJSON($file);
            $result = [];
            $found = [];
            foreach ($jsonData as $row) {
                $user = new Users(
                    $row->userId,
                    $row->userName,
                    $row->password,
                );
                $result[] = $user;
                if ($row->userId == $search) {
                    $found[] = $user;
                    return $found;
                    exit;
                }
            }
            fclose($handle);

            return $result;
        } else die("Can't open file.");
    }
}
