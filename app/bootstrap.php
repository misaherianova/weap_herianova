<?php
namespace app;
/**
 * Created by PhpStorm.
 * User: Michaela
 * 
 * zakladni implementace FCP s jednoduchym smerovanim
 * Class Bootstrap
 * @package app
 */
class Bootstrap
{

    private $controller;
    private $action;
    private $params = array();

    function __construct()
    {

        $this->splitUrl();
        $this->routeRequest();

    }

    /*
    * routing presmeruje request na prislusny controller
    * nebo na vychozi controller, pokud controller z requestu neni platny
    */

    private function routeRequest(){

        if ($this->controller) {
            $class_name = "\\app\\classes\\controllers\\".$this->controller; // prvi parametr
            $class_file = "app/classes/controllers/".$this->controller.".php";
            if (is_readable($class_file)) {
                $handler = new $class_name();
                if (($this->action) && method_exists($handler, $this->action)) { // kdyz existuje metoda action zavola se
                    $handler->{$this->action}($this->params);
                    return true;
                }
                elseif (!$this->action) { // existujici controller, vychozi metoda index = vychozi stranka kontroleru
                    $handler->index();
                    return true;
                }
                else { //neexistujici metoda controlleru -> 404
                    $handler = new \app\classes\controllers\ Error();
                }
            }
            else { //neexistujci controler -> 404
                $handler = new \app\classes\controllers\ Error();
            }
        }
        else { //neexistujci controller -> home page = vychozi cesta
            $handler = new \app\classes\controllers\ Home();
        }

        // finalni zavolani handleru
        $handler->index();
    }

    /**
     * zpracovani parametru URL, ktery je vytvoren pri prepisovani
     */
    private function splitUrl()
    {
        //isset plati kdyz je tam ? .. jinak se to neprovede
        if (isset($_GET['url'])) {

            // split URL
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // prirazeni vlastnosti
            $this->controller = (isset($url[0]) ? $url[0] : null);
            $this->action = (isset($url[1]) ? $url[1] : null);
            $this->params = array_slice($url, 2);

        }
    }

}