<?php

include 'Funcionario.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorFuncionario
 *
 * @author Alberto Damelles
 */
class ControladorFuncionario implements IControladorFuncionario {
    
    private $instance = null;
    
    private function __construct() {
        
    }
    
    public function getInstance(){
        if (!isset($this->instance)){
            $this->instance=new $this->ControladorFuncionario();
        }
        return $this->instance;
        
    }



    //put your code here
}
?>
