<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 20/10/15
 * Time: 11:28
 */

include_once "../lib/html_library.php";

set_charset("utf-8");
set_title("Karte");

class Karta {
    private static $boja = array("Žir", "Zelje", "Srce", "Bundeva");
    private static $jacina = array("7", "8", "9", "10", "Dečko", "Dama", "Kralj", "As");

    /**
     * @return array
     */
    public static function getBoja()
    {
        return self::$boja;
    }

    /**
     * @return array
     */
    public static function getJacina()
    {
        return self::$jacina;
    }

    public static function toString() {
        $returnString = "Boje: ";
        foreach(self::$boja as $b) {
            $returnString .= $b . " ";
        }
        $returnString .= "\n";
        foreach(self::$jacina as $j) {
            $returnString .= $j . " ";
        }
        echo $returnString;
    }

}