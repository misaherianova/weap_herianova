<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 */

namespace app\classes\controllers;


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
        $this->template->set('zahlavi', '<div class="zahlavi"><p>ESHOP</p></div>');
        $this->template->set('navKategorie', '<ul>
		<li><a href=index.php?page=content/books&menu=1>Romanticke</a></li>
        <li><a href=index.php?page=content/books&menu=2>Sci-fy</a></li>
        <li><a href=index.php?page=content/books&menu=3>Motivacni literatura</a></li>
        <li><a href=index.php?page=content/books&menu=4>Historicke</a></li>
        <li><a href=index.php?page=content/books&menu=5>Vedecke</a></li>
        <li><a href=index.php?page=content/books&menu=6>Pro deti</a></li>
	</ul>');

        $this->template->set('administrace', '<ul><li><a href=\'index.php?url=administrace\'>administrace</a></li></ul>');
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