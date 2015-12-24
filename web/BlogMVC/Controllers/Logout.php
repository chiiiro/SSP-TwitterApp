<?php

namespace Controllers;

use Repository\UserRepository;

class Logout implements Controller {
    public function action()
    {
        UserRepository::logout();
        redirect(\route\Route::get("index")->generate());
    }

}