<?php

namespace templates\components;

use Views\AbstractView;

class UserNavbar extends AbstractView
{

    protected function outputHTML()
    {
        ?>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo \route\Route::get("twitterWall")->generate(); ?>"><span
                            class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                </div>


                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"
                                                                                aria-hidden="true"></span> Settings
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Upload profile picture</a></li>
                                <li><a href="<?php echo \route\Route::get("changeUsername")->generate(); ?>">Change username</a></li>
                                <li><a href="<?php echo \route\Route::get("changePassword")->generate(); ?>">Change password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo \route\Route::get("logout")->generate(); ?>">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <?php
    }

}