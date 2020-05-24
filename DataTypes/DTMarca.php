<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTMarca
 *
 * @author Alberto Damelles
 */
include ("enumES.php");
class DTMarca {
    private $hora;
    private $tipo;

    public __construct($h,$t){
        $this->hora = $h;
        $this->tipo = $t;
    }
    public getTipo(){
        return enumES::$this->tipo;
    }

    public getHora(){
        return $this->hora;
    }

}
