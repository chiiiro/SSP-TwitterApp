<?php

namespace templates;

use templates\components\LoggedNavbar;
use templates\components\MainNavbar;
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

            <style>
                body {
                    background-color: aliceblue;
                }
            </style>

            <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<!--            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
            <script>
                $(document).ready(function() {
                    startTime();
                    $('#txt').on('click', function() {
                        alert('Vrijeme prikazano u 24-satnom formatu.');
                    });
                });

                function startTime() {
                    var today = new Date();
                    var h = today.getHours();
                    var m = today.getMinutes();
                    var s = today.getSeconds();
                    m = checkTime(m);
                    s = checkTime(s);
                    document.getElementById('txt').innerHTML =
                        h + ":" + m + ":" + s;
                    var t = setTimeout(startTime, 500);
                }
                function checkTime(i) {
                    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                    return i;
                }
            </script>

        <head/>

        <body onload="startTime()">

        <div>

            <div class="container">

                <?php
                    if(isLoggedIn()) {
                        $loggedNavbar = new LoggedNavbar();
                        echo $loggedNavbar;
                    } else {
                        $mainNavbar = new MainNavbar();
                        echo $mainNavbar;
                    }
                ?>

                </div>

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
