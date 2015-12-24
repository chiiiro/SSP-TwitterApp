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
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Enter new password" onchange="addCheck('password1', 'p1')">
                </div>

                <label id="p1"></label>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-1" for="pwd1">Confirm password:</label>

                <div class="col-sm-2">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm new password" onchange="addCheck('password2', 'p2')">
                </div>

                <label id="p2"></label>
            </div>

            <p id="error"></p>

            <input type="submit" class="btn btn-default" name="change" id="change" value="Submit">
        </form>

            <script>
                function addCheck(id, location) {
                    var x = document.getElementById(id);
                    if(x.value.length > 4 && x.value.length < 15) {
                        if(id == 'password2') {
                            var u1 = document.getElementById('password1');
                            var u2 = document.getElementById('password2');
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