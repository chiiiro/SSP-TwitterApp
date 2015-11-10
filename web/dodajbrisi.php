<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 21/10/15
 * Time: 08:20
 */

include_once "lib/html_library.php";

set_title("Dodaj");
set_charset("utf-8");

try {
    $db = new \PDO("pgsql:dbname=learning;host=localhost;user=iciric;password=iciric12345");
    $db->exec("SET NAMES utf8");
} catch (PDOException $e) {
    echo "Greška kod spajanja: " . $e->getMessage();
}

create_table(array("border" => "1", "style" => "width:50%"));
create_table_row(array("contents" => array("id", "naziv", "cijena", "dodano", "akcija")));
unosPodataka();

if(isset($_POST['dodaj'])) {
    $query = $db->prepare("INSERT INTO artikli (id, naziv, cijena, dodano) VALUES (:id, :naziv, :cijena, :dodano)");
    $naziv = $_POST['naziv'];
    $cijena = $_POST['cijena'];
    $vrijeme = date('Y-m-d H:i:s');
    $query->execute(array(":id" => "", ":naziv" => $naziv,
            ":cijena" => $cijena, ":dodano" => $vrijeme));
}

//dodajKomentar();
end_table();

function unosPodataka() {
    start_form("", "post");
    create_table_row(array("contents" => array("-",
        "<input type='text' name='naziv' style='width: 50%'>",
        "<input type='text' name='cijena' style='width: 50%'>",
        "NOW()",
        "<input type='submit' name='dodaj' value='Dodaj' style='width: 50%'>")));
    end_form();
}

//function dodajKomentar() {
//    if(isset($_POST['dodaj'])) {
//        global $db;
//        global $counter;
//        $query = $db->prepare("INSERT INTO artikli (id, naziv, cijena, dodano) VALUES (:id, :naziv, :cijena, :dodano)");
//        $naziv = $_POST['naziv'];
//        $cijena = $_POST['cijena'];
//        $vrijeme = date('Y-m-d H:i:s');
//        $query->execute(array(":id" => $counter, ":naziv" => $naziv,
//            ":cijena" => $cijena, ":dodano" => $vrijeme));
//        $counter++;
//        create_table_row(array("contents" => array($counter, $naziv, $cijena, $vrijeme, "<input type='submit' name='brisi' value='Briši' style='width: 50%'>")));
//    }
//}