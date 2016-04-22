<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 * Date: 18.04.2016
 * Time: 12:29
 */

namespace app\classes\controllers;

/*
* Home controller 
* ukazka pouziti View
*/

use libs\Controller;
use libs\View;

class Home extends Controller {

    public function __construct() {
        $this->setTemplate('app/templates/default');
    }

    /**
     * zakladni metoda controlleru
     */

    public function index() {
        $this->template->set('title', 'semestralni_prace');
        $this->template->set('content', '<h1>Uvodni stranka</h1>');
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