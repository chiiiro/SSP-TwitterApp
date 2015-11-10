<?php

namespace Controllers;

use Repository\PostRepository;

class Delete implements Controller {

    public function action()
    {
        // Check the querystring for a numeric id
        if (isset($_GET['id']) && intval($_GET['id']) > 0) {

            // Get id from querystring
            $id = $_GET['id'];

            PostRepository::delete($id);
        }

    }

}