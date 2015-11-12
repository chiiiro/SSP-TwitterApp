<?php

namespace templates;

use Views\AbstractView;

class ChangePwd extends AbstractView {

    protected function outputHTML()
    {
        ?>

        <div class="container">
        <h1>Change password</h1>
        <hr />

        <form class="form-horizontal" role="form" id="changeform" action="" method="post">

            <div class="form-group">
                <label class="control-label col-sm-1" for="pwd1">Password:</label>

                <div class="col-sm-2">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter new password">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-1" for="pwd1">Confirm password:</label>

                <div class="col-sm-2">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Enter new password">
                </div>
            </div>

            <p id="error"></p>

            <input type="submit" class="btn btn-default" name="change" id="change" value="Submit">
        </form>

<?php
    }

}