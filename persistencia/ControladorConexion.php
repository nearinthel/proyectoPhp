<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controladorConexion
 *
 * @author Alberto Damelles
 */
include 'Conexion.php';

class ControladorConexion implements iControladorConexion {
    //put your code here
    
    private $instance = null;
    
    private function __construct() {
        
        $con=Conexion::getInstance();
        $conexion=$con->getConexion();
        
    }
    
    public function getInstance(){
        if (!isset($this->instance)){
            $this->instance=new $this->ControladorFuncionario();
        }
        return $this->instance;
        
    }
}
