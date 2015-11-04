<?php

require_once(VIEW_PATH . 'header.php');

?>

    <body>
    <div class="container">
        <h1>Login</h1><hr />

    <form class="form-horizontal" role="form" action="login.php" method="post">
        <div class="form-group">
            <label class="control-label col-sm-1" for="username">Username:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-1" for="pwd">Password:</label>

            <div class="col-sm-2">
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
        </div>
        <input type="submit" class="btn btn-default" name="login" id="login" value="Login">
        <a href="../index.php" role="button" class="btn btn-link">Back</a>
    </form>

<?php
require_once(VIEW_PATH . 'footer.php');