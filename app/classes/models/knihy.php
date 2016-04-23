<?php
namespace app\classes\models;

use PDO;

if(!defined('BASE_DIR')) die('no direct script access');

/*
* Model pro clanky
*/

class Knihy{

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

    /**
     * vsechny knihy z databaze
     * nepouzivame parametr => neni potreba pouzit prepared statements
     * @return array of objects
     */
    public function getAll() {
        $sql = "SELECT id, autor, nazev, popis FROM knihy";
        $result = $this->db->query($sql);
        return $result->fetchAll();
    }

    /**
     * kniha s konkretnim id
     * @param string url id z databaze
     * @return object clanek
     */
    public function getByUrl($url_id) {
        $params = array( ':url' => $url_id);
        $sql = "SELECT id, autor, nazev, popis FROM knihy WHERE id = :url";
        // diky prepared statement mame automatickou ochranu proti SQL injection
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query->fetch();
    }

}
