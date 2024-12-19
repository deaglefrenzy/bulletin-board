<?php

namespace Suryo\Learn\Controller;

use Suryo\Learn\Controller\Users;

use const Suryo\Learn\BASE_PATH;
use const Suryo\Learn\USERS_FILE;
use const Suryo\Learn\SESSION_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $currentData = Users::parseUsers(USERS_FILE);
    $input = json_decode(file_get_contents('php://input'));
    //dd($input);
    foreach ($currentData as $row) {
        //dd($input->userName);
        if ($row->userName === $input->userName) {
            if ($row->password === $input->password) {
                $id = $row->userId;
                break;
            }
            http_response_code(401);
            dd("PASSWORD DOESN'T MATCH");
        }
        http_response_code(403);
        dd("USER NOT FOUND");
    }
    $token = md5($input->userName . rand(1, 1000));
    $loginData = new Users(
        $id,
        $input->userName,
        "-REDACTED-",
        $token
    );
    $sessionData[] = $loginData;
    if (writeJSON(SESSION_FILE, $sessionData)) {
        dd("LOGGED IN");
    }
    //dd($currentData);
}

// dd("HELLO WORLD 2");

//view("create.post.view.php");
