<?php

namespace Suryo\Learn\Controller;

use Suryo\Learn\Controller\Users;

use const Suryo\Learn\BASE_PATH;
use const Suryo\Learn\USERS_FILE;
use const Suryo\Learn\TOKEN_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sessionData[] = "{}";
    if (writeJSON(TOKEN_FILE, $sessionData)) {
        redirect(TOKEN_FILE);
    }
    //dd($currentData);
}
