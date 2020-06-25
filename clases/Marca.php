<?php
include_once '../DataTypes/enumES.php';
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
    
    private $hora;
    private $tipo;
    
    public function __construct($h, $t) {
        //h debe ser en tipo DateTime para que ande lo demas
        $this->hora = $h;
        $this->tipo = $t;
    }
    
    public function getTipo() {
        return $this->enumES::$this->tipo;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($h) {
        $this->entrada = $h;
    }

    public function setSalida($salida) {
        $this->salida = $salida;
    }



}
