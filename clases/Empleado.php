<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Empleado
 *
 * @author Alberto Damelles
 */
class Empleado extends Funcionario{
    //put your code here
    private $supervisor;
    
    public function setSuper($regS){
        $controlador = ControladorConexion::getInstance();
        
        $f= $controlador->getFuncionario($regS);//busco el supervisor en la base
        $this->supervisor= $f;
    }

    public function getSupervisor(){
        return $this->supervisor;
        
    }
    
    
}
