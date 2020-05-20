<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionarioMarca
 *
 * @author Alberto Damelles
 */
class FuncionarioMarca {
    
    //put your code here
    
    private $inconsistencia;
    
    function __construct() {
        
    }
    
    function getInconsistencia() {
        return $this->inconsistencia;
    }

    function setInconsistencia($inconsistencia) {
        $this->inconsistencia = $inconsistencia;
    }



}
