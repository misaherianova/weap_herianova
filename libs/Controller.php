<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 *
 * zakladni Controller - pro odvozovani vlastnich
 */

namespace libs;

use PDO;
use PDOException;

class Controller
{
    /**
     * propojeni s databazi
     * @var $db null
     */
    public $db = null;

    /**
     * Template
     * @var View
     */
    public $template = null;


    /**
     * Database connector method
     */
    protected function openDatabaseConnection()
    {
        //PDO options - tohle vubec netusim co to je ? nejaky naplneni pole asi / co je to PDO
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        // database PDO connector
        $db_init = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME;

        //PDO connector vzdy musi byt v try catch bloku - proc?
        try {
            $this->db = new PDO($db_init, DB_USER, DB_PASS, $options);
        }
        catch (PDOException $e) {
            //muzeme vyjimku zalogovat do extra logu pro DB admina - co znamena zalogovat vyjimku?
            // priklad : logDBException($e);
            //znovu vyhodime pro vychozi error handler
            throw $e;
        }

    }


    /**
     * Set View template
     * @param $template - template name
     */

    protected function setTemplate($template) {

        $this->template = new View($template);

    }
}