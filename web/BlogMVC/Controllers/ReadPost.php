<?php

namespace Controllers;

use Repository\PostRepository;

class ReadPost implements Controller {

    public function action() {
        if (isset($_GET['id']) && intval($_GET['id']) > 0) {

            // Get id from querystring
            $id = $_GET['id'];

            $username = $_SESSION['username'];

            $post = PostRepository::getById($id);

            if($post['username'] !== $username) {
                redirect("404.php");
            }

        } else {

            // Redirect to site root
            redirect("user_index.php");
        }

        $mainView = new \templates\Main();
        $readTemplate = new \templates\Read();
        $readTemplate->setPost($post);
        $mainView->setPageTitle('User post')->setBody((string) $readTemplate);
        echo $mainView;
    }

}