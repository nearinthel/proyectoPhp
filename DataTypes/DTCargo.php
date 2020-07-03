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
include_once "DTSueldo.php";
class DTCargo {
    //put your code here
    
    private $nivel;
    private $dtsueldo;
    private $level;
    
    function __construct($n,$dtS) {
        $this->nivel = $n;
        $this->dtsueldo = $dtS;
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
    
    function getLevel() {
        return $this->level;
    }

    function setLevel($level) {
        $this->level = $level;
    }





}
