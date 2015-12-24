<?php

namespace templates;

class Index extends \Views\AbstractView {

    protected function outputHTML()
    {

        ?>

        <div class="jumbotron">
            <div class="container">
                <h1>Welcome to TwitterApp!</h1>
                <p>This is a simple Twitter application which is used for learning.</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>

        <?php

    }

}