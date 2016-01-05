<?php

namespace templates;

use Repository\FriendRepository;
use Repository\RequestRepository;
use Repository\UserRepository;
use Views\AbstractView;

class UserProfile extends AbstractView
{

    private $user;

    protected function outputHTML()
    {
        ?>

        <div class="container">

            <div class="panel panel-info" id="comments">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $this->user['username']; ?> profile</h3>
                </div>

                <div class="panel-body">
                    <p>First name: <?php echo $this->user['firstname'] ?></p>

                    <p>Last name: <?php echo $this->user['lastname'] ?></p>

                    <p>E-mail address: <?php echo $this->user['email'] ?></p>

                    <p>
                        <a href="<?php echo \route\Route::get("twitterWall")->generate(array("id" => $this->user['userid'])); ?>">User
                            wall</a></p>
                    <?php

                    $userid = UserRepository::getIdByUsername($_SESSION['username']);
                    //ako otvoreni profil nije profil ulogiranog korisnika
                    if (!($this->user['userid'] == $userid)) {

                        $friendsID = FriendRepository::isFriend($userid, $this->user['userid']);

                        //ako su prijatelji ponuditi opciju Unfriend
                        if ($friendsID != null) {
                            ?>
                            <p><a href="#" class="btn btn-danger">Unfriend</a></p>
                            <?php
                            //ako nisu prijatleji ponuditi opcije za prihvaćanje, odbijanje, uklanjanje zahtjeva
                            //i slanje zahtjeva ovisno o situaciji
                        } else {
                            $getRequestID = RequestRepository::getRequest($this->user['userid'], $userid);
                            $fromRequestID = RequestRepository::getRequest($userid, $this->user['userid']);

                            if ($getRequestID != null) {
                                ?>
                                <p><a href="#" class="btn btn-success">Accept</a> | <a href="#" class="btn btn-danger">Ignore</a>
                                </p>
                                <?php
                            } else if ($fromRequestID != null) {
                                ?>
                                <a href="#" class="btn btn-danger">Cancel Request</a>
                                <?php
                            } else {
                                ?>
                                <a href="#" class="btn btn-info">Send Request</a>
                                <?php
                            }
                        }
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}