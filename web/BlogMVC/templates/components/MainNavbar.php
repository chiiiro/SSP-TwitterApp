<?php

namespace templates\components;

use Views\AbstractView;

class MainNavbar extends AbstractView {

    protected function outputHTML()
    {
        ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo \route\Route::get("index")->generate();?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                </div>


                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo \route\Route::get("register")->generate(); ?>" role="button" class="btn btn-link"">Register</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo \route\Route::get("login")->generate(); ?>" role="button" class="btn btn-link"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a></li>
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