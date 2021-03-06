<?php
namespace app\classes\models;

use PDO;

if(!defined('BASE_DIR')) die('no direct script access');

/*
* Model pro administraci
*/

class AdministraceKnih{

    /**
     * @var PDO $db
     */
    private $db;

    /**
     * model potrebuje spojeni k databazi
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        $this->db = $db;
    }


    public function pridatKnihu($autor, $nazev, $popis, $cena, $kategorie)
    {
        $sql = "INSERT INTO knihy (autor, nazev, popis, cena, kategorie) 
                VALUES ('$autor', '$nazev', '$popis', '$cena', '$kategorie')";
        vratZDatabaze::query($this->db, $sql);
    }

    public function odstranitKnihu($id)
    {
        $sql = "DELETE FROM knihy WHERE id='$id'";
        vratZDatabaze::query($this->db, $sql);
    }

    // -> co se vse bude predavat? 
    public function upravKnihu(){

    }

    public function getBooks()
    {
        $sql = "SELECT * FROM knihy";
        return vratZDatabaze::vratVse($this->db, $sql);
    }

}
