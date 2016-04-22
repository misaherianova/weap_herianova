<?php
namespace app\classes\controllers;

/**
 * Knihy controller
 * ukazka pouziti modelu
 */
use libs\Controller;
use libs\View;

if(!defined('BASE_DIR')) die('no direct script access');

class Knihy extends Controller {


    public function __construct() {
        $this->setTemplate('app/templates/default');
        $this->openDatabaseConnection();
    }

    /**
     * metoda pro vypis vech clanku
     */

    public function index() {
        $this->template->set('title', 'seznam clanku');
        $knihy = new \app\classes\models\ Knihy($this->db);
        $data = $knihy->getAll();

        $content = new View('app/views/knihy');
        $content->set('data', $data);
        $this->template->content = $content->render();

        echo $this->template->render();
    }

    /*
    * metoda pro vypis konkretniho clanku
    * ukazuje ze pro slozitejsi projekty je dobre mit propracovanejsi smerovani ve front controlleru
    * pokud by chyby zpracoval jiz router a dale predaval pouze jeden validni parametr mohl by kod zde
    * byt o neco kratsi
    */
    public function show($params = null) {
        $knihy = new \app\classes\models\ Knihy($this->db);

        // je co hledat
        if ($params) {
            $url_id = $params[0];
            $data = $knihy->getByUrl($url_id);

            //vysledek existuje
            if ($data) {
                $content = new View('app/views/kniha_detail');
                $content->set('data', $data);

                $this->template->title =  'seznam clanku';
                $this->template->content = $content->render();

                echo $this->template->render();
                return true;
            }
        }

        //v pripade chyb presmeruj na custom 404 stranku
        $redirect = 'location: ' . BASE_DIR . 'error/notFound/';
        header($redirect);

    }



}