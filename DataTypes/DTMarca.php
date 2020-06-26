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
<<<<<<< HEAD
include_once ("enumES.php");
=======
include_once "enumES.php";
>>>>>>> 2a51bae12d96d7b4ea4b339f29136f566b1fc2ca
class DTMarca {
    private $hora;//la hora se debe crear con datetime
    private $tipo;

    public function __construct($h,$t)
    {
        $this->hora = $h;
        $this->tipo= $t;
    }
    public function getTipo(){
        return enumES::$this->tipo;
    }

    public function getHora(){
        return $this->hora;
    }

}
