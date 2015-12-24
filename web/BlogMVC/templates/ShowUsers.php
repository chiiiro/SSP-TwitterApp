<?php

namespace templates;

class ShowUsers extends \Views\AbstractView {

    private $users;

    protected function outputHTML()
    {
        ?>

        <div class="container">

        <div class="panel panel-info" id="comments">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            <?php

            foreach ($this->users as $user) {

                ?>

                <div class="panel-body">
                    <p><?php echo $user['username']; ?></p>
                </div>

                <?php
            }
            ?>
        </div>

    </div>

        <?php
    }

    /**
     * @param mixed $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
        return $this;
    }

}