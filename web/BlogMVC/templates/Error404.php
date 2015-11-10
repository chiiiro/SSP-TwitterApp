<?php

namespace templates;

use Views\AbstractView;

class Error404 extends \Views\AbstractView {

    protected function outputHTML()
    {
        ?>

        <div class="container">
             <h1>Error 404!</h1>
            <hr />

             <p>Unauthorized acces.</p>

            <a href="../index.php" role="button" class="btn btn-link">Back</a>

        <?php
    }

}

?>