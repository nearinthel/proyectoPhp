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
    
    public function ingresarFuncionario($param){
        
    }
    public function ingresarMarca($param){
        
    }
    public function ingresarSistema($param){
        
    }



    //put your code here
}
?>
