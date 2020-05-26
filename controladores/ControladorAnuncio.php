<?php

include 'Anuncio.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorAnuncio
 *
 * @author Alberto Damelles
 */
class ControladorAnuncio implements IControladorAnuncio {
    //put your code here
    
    private static $instance;
    
    private function __construct() {
        
    }
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    public function aceptarAnuncio($param){
        
    }
    public function ingresarAnuncio($param){
        
    }
}
