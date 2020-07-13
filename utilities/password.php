<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of password
 *
 * @author Alberto Damelles
 */

class Password {    
    
    private $salt="phprecibos";
    private static $instance;
    
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        //$archivo="../config/config.ini";
        
        //$contenido= parse_ini_file($archivo, false);

        //$this->salt=$contenido["salt"];

    }

    public function hash($password) {
        return hash('sha512', $this->salt . $password);
    }
}



