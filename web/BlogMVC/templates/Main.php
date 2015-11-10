<?php

namespace templates;

use Views\AbstractView;

class Main extends AbstractView {

    private $pageTitle;
    private $body;

    public function outputHTML()
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

        <body background="includes/pictures/clouds.jpg" style="background-size: cover; repeat: no-repeat">
        <div>

            <?php echo $this->body; ?>

        </div>

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
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

}

?>
