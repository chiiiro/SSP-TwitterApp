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

                        <?php
                        $activeUser = getUsername();
                        ?>

                        <li><a href="<?php echo \route\Route::get("showUsers")->generate(array()); ?>" id="active">Active user: <?php echo $activeUser ?></a></li>
<!--                        <li><img src="--><?php //echo '/BlogMVC/assets/images/clouds.jpg' ?><!--" style="width:50px;height:30px;"></li>-->
                        <li><a href="<?php echo \route\Route::get("addPost")->generate();?>">Add post</a></li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">

                        <li><a type="button" id="txt" role="button" class="btn btn-link""></a></li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a type="button" id="profilepic" role="button" class="btn btn-link"">Change profile picture</a></li>
                                <li><a href="<?php echo \route\Route::get("changeUser")->generate(); ?>">Change username</a></li>
                                <li><a href="<?php echo \route\Route::get("changePwd")->generate(); ?>">Change password</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo \route\Route::get("logout")->generate(); ?>" role="button" class="btn btn-link""><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
                    </ul>

                </div>

            </div>
        </nav>

        <script>
//            $('#active').on('click', function() {
//                alert('Korisnik koji je trenutno ulogiran.');
//            });
            $('#txt').on('click', function() {
                alert('Vrijeme prikazano u 24-satnom formatu.');
            });
        </script>

        <?php
    }

}