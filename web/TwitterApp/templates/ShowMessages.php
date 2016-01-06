<?php

namespace templates;

use Repository\UserRepository;
use Views\AbstractView;

class ShowMessages extends AbstractView
{

    private $messages;

    protected function outputHTML()
    {
        ?>

        <div class="container">

            <div class="panel panel-info" id="comments">
                <div class="panel-heading">
                    <h3 class="panel-title">Messages</h3>
                </div>

                <div class="panel-body">
                    <?php
                    foreach ($this->messages as $message) {
                        $user = UserRepository::getUserByID($message['senderid']);

                        ?>
                        <p style="color: red"><a
                                href="<?php echo \route\Route::get("readMessage")->generate(array("id" => $message['id'])); ?>">From: <?php echo $user['username']; ?> </a><?php if ($message['readflag'] == 0) {
                                echo " Unread";
                            } ?></p>
                        <?php
                    }
                    ?>
                </div>

            </div>
        </div>

        <?php
    }

    /**
     * @return mixed
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

}