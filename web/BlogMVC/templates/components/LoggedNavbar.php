<?php

namespace templates\components;

use Views\AbstractView;

class LoggedNavbar extends AbstractView {

    protected function outputHTML()
    {
        ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo \route\Route::get("userIndex")->generate();?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo \route\Route::get("addPost")->generate();?>">Add post</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo \route\Route::get("logout")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo \route\Route::get("changePwd")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change password</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo \route\Route::get("changeUser")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Change username</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a type="button" id="txt" role="button" class="btn btn-link""></a></li>
                    </ul>


                </div>

            </div>
        </nav>

        <?php
    }

}