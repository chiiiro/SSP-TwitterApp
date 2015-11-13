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
                        <input type="text" class="form-control" name="username1" id="username1" placeholder="Enter new username" onchange="addCheck('username1', 'u1')">
                    </div>

                    <label id="u1"></label>

                </div>

                <div class="form-group">
                    <label class="control-label col-sm-1" for="user2">Confirm username:</label>

                    <div class="col-sm-2">
                        <input type="text" class="form-control" name="username2" id="username2" placeholder="Confirm new username" onchange="addCheck('username2', 'u2')">
                    </div>

                    <label id="u2"></label>

                </div>

                <p id="error"></p>

                <input type="submit" class="btn btn-default" name="change" id="change" value="Submit">
            </form>

            <script>
                function addCheck(id, location) {
                    var x = document.getElementById(id);
                    if(x.value.length > 4 && x.value.length < 20) {
                        if(id == 'username2') {
                            var u1 = document.getElementById('username1');
                            var u2 = document.getElementById('username2');
                            if(u1.value.length == u2.value.length) {
                                document.getElementById(location).innerHTML = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
                            }
                        } else {
                            document.getElementById(location).innerHTML = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
                        }
                    } else {
                        document.getElementById(location).innerHTML = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
                        x.focus();
                    }

                }
            </script>

        <?php
    }

}