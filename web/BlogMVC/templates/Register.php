<?php

namespace templates;

use Views\AbstractView;

class Register extends AbstractView {

    protected function outputHTML()
    {
        ?>

<div class="container">
    <h1>Register</h1><hr />

    <form class="form-horizontal" role="form" id="registerform" action="<?php echo \route\Route::get("register")->generate(); ?>" method="post">
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

        <div class="form-group">
            <label class="control-label col-sm-1" for="email">E-mail:</label>

            <div class="col-sm-2">
                <input type="text" class="form-control" name="email" placeholder="Enter e-mail adress">
            </div>
        </div>

        <input type="submit" class="btn btn-default" name="register" id="register" value="Register">
        <a href="<?php echo \route\Route::get("index")->generate(); ?>" role="button" class="btn btn-link">Back</a>
    </form>

    <script src="assets/js/RegisterValidation.js"></script>

        <?php
    }

}

?>

