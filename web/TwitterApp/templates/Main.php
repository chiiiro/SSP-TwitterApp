<?php

namespace templates;

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

    <head/>

    <body>

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