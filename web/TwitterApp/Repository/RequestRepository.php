<?php

namespace Repository;

use includes\libraries\Database;

class RequestRepository {

    public static function getRequest($otherID, $myID) {
        $db = Database::getInstance();
        $query = $db->prepare('SELECT id FROM requests WHERE (fromid = ? AND toid = ?)');
        $query->execute([$otherID, $myID]);
        return $query->fetch()['id'];
    }

    public static function sendRequest($myID, $otherID) {
        $db = Database::getInstance();
        $query = $db->prepare('SELECT id FROM requests WHERE (fromid = ? AND toid = ?)');
        $query->execute([$myID, $otherID]);
        return $query->fetch()['id'];
    }

}