<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTIncosistencia
 *
 * @author Alberto Damelles
 */
include_once("DTMarca.php");
class DTIncosistencia {
    private $hora;
    private $dtM;

    function __construct($h,$data){
        $this->hora = $h;//hora del turno
        $this->dtm = $data;
    }

    function getHora(){
        return $this->hora;
    }

    function getDTM(){
        return $this->dtm;
    }


}
