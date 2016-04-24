<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 */

namespace app\classes\controllers;

/*
* controller pro administraci -> jeste uvidim jestli je nutny
*/

use libs\Controller;

if(!defined('BASE_DIR')) die('no direct script access');

class Administrace extends Controller {

    public function __construct() {
        $this->setTemplate('app/templates/administrace_temp');
    }


    public function index() {
        $this->template->set('content', '<h1>Administrace</h1>');
        
        echo $this->template->render();

    }

}