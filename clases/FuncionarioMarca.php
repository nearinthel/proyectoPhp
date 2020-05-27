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
include("Marca.php");
class FuncionarioMarca {
    
    //put your code here
    private $func;
    private $marca;
    private $inconsistencia;
    
    public function __construct() {
    }

    public function getFuncionario(){
        return $this->func;
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

    public function setFuncionario($f){
        $this->func = $f;
    }
    public function getFuncionario(){
        return $this->func;
    }
    public function setMarca($m){
        $this->marca = $m;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function crearMarca($hora,$t){
        $m = new Marcar($hora,$t);
        $this->marca = $m;
    }   

}
