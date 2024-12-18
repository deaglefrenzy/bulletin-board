<?php

use const Suryo\Learn\BASE_PATH;
?>
<nav>
    <ul>
        <li><a class="active" href="<?= BASE_PATH; ?>">Home</a></li>
        <li><a href="<?= BASE_PATH . "posts/create"; ?>">Create Post</a></li>
        <li><a href="<?= BASE_PATH . "posts/file"; ?>" target="_blank">Get Posts File</a></li>
        <li><a href="<?= BASE_PATH . "login"; ?>">Login</a></li>
    </ul>
</nav>