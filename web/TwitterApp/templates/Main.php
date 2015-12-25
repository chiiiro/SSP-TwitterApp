<?php

namespace templates;

use templates\components\IndexNavbar;
use templates\components\UserNavbar;
use Views\AbstractView;

class Main extends AbstractView {

    private $pageTitle;
    private $pageBody;

    protected function outputHTML()
    {
        ?>

        <!DOCTYPE HTML>
        <html>

    <head>
        <title><?php echo $this->pageTitle ?></title>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
              crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <head/>

    <body>

    <div class="container">

        <?php
        if (!isLoggedIn()) {
            $indexNavbar = new IndexNavbar();
            echo $indexNavbar;
        } else {
            $userNavbar = new UserNavbar();
            echo $userNavbar;
        }
        ?>

    </div>

    <?php echo $this->pageBody ?>

    </body>

    </html>

    <?php
    }

    /**
     * @param mixed $pageTitle
     */
    public function setPageTitle($pageTitle)
    {
        $this->pageTitle = $pageTitle;
        return $this;
    }

    /**
     * @param mixed $pageBody
     */
    public function setBody($pageBody)
    {
        $this->pageBody = $pageBody;
        return $this;
    }



}