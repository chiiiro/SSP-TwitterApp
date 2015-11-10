<?php

namespace templates;

use Views\AbstractView;

class Login extends AbstractView {

    protected function outputHTML()
    {
        ?>

<div class="container">
    <h1>Login</h1>
    <hr />

    <form class="form-horizontal" role="form" action="Login.php" method="post">
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

        <p id="display"></p>

        <input type="submit" class="btn btn-default" name="login" id="login" value="Login">
        <a href="index.php" role="button" class="btn btn-link">Back</a>
    </form>

    <?php
    }

}