<?php
/**
 * Created by PhpStorm.
 * User: Michaela
 *
 * zakladni trida pro vytvareni View
 */

namespace libs;
use Exception;


class View {

    protected $_file;
    protected $_data = array();

    /**
     *  View constructor
     * @param string / views file name
     * @param array / data to views
     */
    public function __construct($viewname, array $data = NULL) {

        $this->_file = $viewname . ".php";

        if ($data !== NULL) {
            array_merge($data, $this->_data);
        }
    }


    /**
     * Rendering method
     * vytvori retezec reprezentujici dane views slozene z obsahu souboru
     * a nastavenych promennych
     * @return string
     * @throws Exception
     * @throws \Exception
     */

    public function render() {
        //import pole data ve forme promnenych v lokalnim scope
        extract($this->_data);
        //start output buffering
        ob_start();

        try {
            require_once $this->_file; // nekam si to ulozi a cokoli co to bude pak volat muze ten kod pouzit

        }
        catch (Exception $e) {
            // pokud se to nepovede, smazeme bufer
            ob_end_clean();

            // vyhod vys
            throw $e;
        }

        // vrati obsah bufferu jako retezec
        return ob_get_clean();

    }


    /**
     * Magic setter - asi umi volat automaticky
     * usage $views->key = $value;
     */
    public function __set($key, $value) {
        $this->set($key,$value);
    }


    /**
     * Function for seting the data to $_data;
     * allows chaining
     * usage: $views->set('key',$data);
     * @param string
     * @param value
     * @return View
     */
    public function set($key, $value = NULL) { // null je defoultni hodnota
        $this->_data[$key] = $value;
        return $this;
    }

}