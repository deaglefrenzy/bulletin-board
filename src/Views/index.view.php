<?php

namespace Suryo\Learn\Views;

use Carbon\Carbon;
use Suryo\Learn\Controller\Posts;

use const Suryo\Learn\POSTS_FILE;

require('partials/head.php');
require('partials/nav.php')
?>
<main>
    <table border=1 style="margin: 40px;">
        <thead align="center">
            <th>Post ID</th>
            <th>Privilege</th>
            <th>Title</th>
            <th>Body</th>
            <th>Creation Date</th>
            <th>Expiry Date</th>
        </thead>
        <?php
        $data = Posts::parseJSON(POSTS_FILE);
        foreach ($data as $row) {
            Carbon::setLocale('id');
            $datecr = Carbon::createFromFormat('Y-m-d', $row->created);
            $dateex = Carbon::createFromFormat('Y-m-d', $row->expiry);
        ?>
            <tr>
                <td><?php echo $row->postId; ?></td>
                <td><?php echo $row->priv; ?></td>
                <td><?php echo $row->title; ?></td>
                <td><?php echo $row->body; ?></td>
                <td><?php echo $datecr->isoFormat('dddd, DD MMMM YYYY') ?></td>
                <td><?php echo $dateex->isoFormat('dddd, DD MMMM YYYY') ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</main>
<?php require('partials/footer.php') ?>