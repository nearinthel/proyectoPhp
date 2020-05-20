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
    
    private $instance = null;
    
    private function __construct() {
        
    }
    
    public function getInstance(){
        if (!isset($this->instance)){
            $this->instance=new $this->ControladorAnuncio();
        }
        return $this->instance;
        
    }
}
