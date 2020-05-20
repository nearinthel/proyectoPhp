<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Marca
 *
 * @author Alberto Damelles
 */
class Marca {
    //put your code here
    
    private $entrada;
    private $salida;
    
    function __construct() {
        
    }
    
    function getEntrada() {
        return $this->entrada;
    }

    function getSalida() {
        return $this->salida;
    }

    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }

    function setSalida($salida) {
        $this->salida = $salida;
    }



}
