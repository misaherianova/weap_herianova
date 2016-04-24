<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 */

namespace app\classes\controllers;

/*
* Error controller
* pro zobrazovani chyb
*/
use libs\Controller;
use libs\View;

//kdyz to je spustene natvrdo, opet se to nespusti :D
if(!defined('BASE_DIR')) die('no direct script access'); 

class Error extends Controller {

    public function __construct() {
        $this->setTemplate('app/templates/default');
        
    }

    public function index() {
        $this->notFound();

    }

    /**
     * Error 404 - stranka nenalezena
     */
    public function notFound() {
        $this->template->set('title', '404 - not found');
        $content = new View('app/views/404');
        $this->template->content = $content->render();
        echo $this->template->render();
    }


    /**
     *
     * Error 500 - debugovaci vypis
     * @param \Exception $exception
     * @throws \Exception
     */
     public function debugError(\Exception $exception) {
        $this->template->set('title', '500 - server error');
        $content = new View('app/views/debugger');
        $content->set('myException', $exception);
        $this->template->content = $content->render();
        echo $this->template->render();
        exit();
    }


    /**
     *
     * Error 500 - debugovaci vypis
     * realne by bylo nutne zalogovat chybu, poslat mail adminovi, nebo oboji...
     * @param \Exception $exception
     * @throws \Exception
     */
    public function error500(\Exception $exception) {

        $this->template->set('title', '500 - server error');
        $content = new View('app/views/500');
        $this->template->content = $content->render();
        echo $this->template->render();
        exit();
    }



}