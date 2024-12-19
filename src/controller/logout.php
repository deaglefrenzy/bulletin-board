<?php

namespace Suryo\Learn\Controller;

use Suryo\Learn\Controller\Users;

use const Suryo\Learn\BASE_PATH;
use const Suryo\Learn\USERS_FILE;
use const Suryo\Learn\SESSION_FILE;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $sessionData[] = "{}";
    if (writeJSON(SESSION_FILE, $sessionData)) {
        redirect(SESSION_FILE);
    }
    //dd($currentData);
}
