<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 */

namespace app\classes\controllers;

/*
* Home controller 
* ukazka pouziti View
*/

use libs\Controller;
use libs\View;

if(!defined('BASE_DIR')) die('no direct script access');

class Administrace extends Controller {

    public function __construct() {
        $this->setTemplate('app/templates/administrace_temp');
    }

    /**
     * zakladni metoda controlleru
     * -> kam dat html kody?
     */

    public function index() {
        $this->template->set('title', 'semestralni_prace');
        $this->template->set('content', '<h1>Administrace</h1>');
        $this->template->set('zahlavi', '<div class="zahlavi"><p>ADMINISTRACE</p></div>');
        $this->template->set('topmenu', ' 
        <a href="index.php?url=home">ESHOP</a> |
        <a href="index.php?url=pridaniKnihy">Pridat knihu</a> |
        <a href="index.php?page=book_edit">Upavit knihu</a> |
        <a href="index.php?url=odebraniKnihy">Odebrat knihu</a> |
        <a href="index.php?page=logout">Odhlasit se</a>');
        
        echo $this->template->render();

    }

    /**
     * akce demo - zobrazi predane parametry
     * @param null $params
     * @throws \Exception
     */
    public function demo($params = null) {

        $this->template->set('title', 'vypis parametru na obrazovku');

        $content = new View('app/views/params');
        $content->set('data', $params);
        $this->template->set('content', $content->render());

        echo $this->template->render();

    }

    /**
     * akce errordemo - ukazka chyby
     * @param null $params
     * @throws \Exception
     */
    public function errordemo() {

        $this->template->set('title', 'vypis parametru na obrazovku');

        $content = new View('app/views/nonexistingview');
        $this->template->set('content', $content->render());

        echo $this->template->render();

    }

}