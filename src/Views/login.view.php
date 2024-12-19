<?php
require('partials/head.php');
require('partials/nav.php')
?>
<h1>Login</h1>

<form action="login" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>
<?php require('partials/footer.php') ?>