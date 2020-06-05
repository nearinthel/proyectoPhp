<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTCargo
 *
 * @author Alberto Damelles
 */
include("DTSueldo");
class DTCargo {
    //put your code here
    
    private $nivel;
    private $dtsueldo;
    
    function __construct() {
        
    }
    
    function getNivel() {
        return $this->nivel;
    }

    function getSueldo() {
        return $this->dtsueldo;
    }

    function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    function setSueldo($sueldo) {
        $this->sueldo = $dtsueldo;
    }



}
