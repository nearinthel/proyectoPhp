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
    
    public function __construct($dtIn) {
        $this->$nconsistencia = $dtIn;
    }
    
    public function getInconsistencia() {
        return $this->inconsistencia;
    }

    public function setInconsistencia($inconsistencia) {
        $this->inconsistencia = $inconsistencia;
    }
    
    public function removerIncosistencia() {
        $this->inconsistencia = null;
    }



}
