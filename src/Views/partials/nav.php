<?php

use const Suryo\Learn\BASE_PATH;
?>
<nav>
    <ul>
        <li><a class="active" href="<?= BASE_PATH; ?>">Home</a></li>
        <li><a href="<?= BASE_PATH . "posts/create"; ?>">Create Post</a></li>
        <li><a href="<?= BASE_PATH . "posts/file"; ?>">Get Posts File</a></li>
    </ul>
</nav>