<?php

namespace templates;

use Views\AbstractView;

class ChangeUser extends AbstractView {

    protected function outputHTML()
    {
        ?>

        <div class="container">
            <h1>Change username</h1>
            <hr />

            <form class="form-horizontal" role="form" id="changeform" action="" method="post">

                <div class="form-group">
                    <label class="control-label col-sm-1" for="user1">Username:</label>

                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="username1" id="username1" placeholder="Enter new username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-1" for="user2">Confirm username:</label>

                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="username2" id="username2" placeholder="Confirm new username">
                    </div>
                </div>

                <p id="error"></p>

                <input type="submit" class="btn btn-default" name="change" id="change" value="Submit">
            </form>

        <?php
    }

}