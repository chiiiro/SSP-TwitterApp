<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 11:39
 */

include_once "../lib/html_library.php";
include_once "karta.php";

set_title("Špil");
set_charset("utf-8");

class Spil {

    private static $karte = array("Žir 7", "Žir 8", "Žir 9", "Žir 10", "Žir dečko", "Žir dama", "Žir kralj", "Žir as",
        "Zelje 7", "Zelje 8", "Zelje 9", "Zelje 10", "Zelje dečko", "Zelje dama", "Zelje kralj", "Zelje as",
        "Srce 7", "Srce 8", "Srce 9", "Srce 10", "Srce decko", "Srce dama", "Srce kralj", "Srce as",
        "Bundeva 7", "Bundeva 8", "Bundeva 9", "Bundeva 10", "Bundeva dečko", "Bundeva dama", "Bundeva kralj", "Bundeva as");

    public static function promijesaj(){
        shuffle(self::$karte);
    }

    public static function izvuciKartu() {
        return array_shift(self::$karte);
    }

    /**
     * @return array
     */
    public static function getKarte()
    {
        return self::$karte;
    }

}

$spil = new Spil();
$spil->promijesaj();
$promijesane_karte = $spil->getKarte();
