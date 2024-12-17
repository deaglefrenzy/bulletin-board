<?php

namespace Suryo\Learn\Views;

use Carbon\Carbon;
use Suryo\Learn\Controller\Posts;

use const Suryo\Learn\POSTS_FILE;

$data = Posts::parseJSON(POSTS_FILE);
$currentID = getHighestNumber($data, "postId") + 1;
$today = Carbon::today()->toDateString();
require('partials/head.php');
require('partials/nav.php');
?>

<main>

    <h1>Buat Buletin</h1>

    <form action="create" method="post"> <label for="post_id">Post ID:</label><br>
        <input id="post_id" name="post_id" type="hidden" value="<?= $currentID ?>">
        <input disabled value="<?= $currentID ?>"><br><br>

        <label for="post_title">Post Title:</label><br>
        <input type="text" id="post_title" name="post_title" required><br><br>

        <label for="post_privilege">Post Privilege:</label><br>
        <select id="post_privilege" name="post_privilege">
            <option value="true">True</option>
            <option value="false">False</option>
        </select><br><br>

        <label for="post_body">Post Body:</label><br>
        <textarea id="post_body" name="post_body" rows="4" cols="50" required></textarea><br><br>

        <label for="post_creation_date">Post Creation Date:</label><br>
        <input type="date" id="post_creation_date" name="post_creation_date" required value="<?= $today ?>"><br><br>

        <label for="post_expiry_date">Post Expiry Date:</label><br>
        <input type="date" id="post_expiry_date" name="post_expiry_date" value="<?= $today ?>"><br><br> <input type="submit" value="Submit Post">
    </form>

</main>

</html>

<?php require('partials/footer.php'); ?>