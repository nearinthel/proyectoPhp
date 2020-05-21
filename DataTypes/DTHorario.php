<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DTHorarios
 *
 * @author Alberto Damelles
 */
class DTHorarios {
    //put your code here
    
    private $fijo;
    private $rotativo;
    
    function __construct() {
        
    }
    
    function getFijo() {
        return $this->fijo;
    }

    function getRotativo() {
        return $this->rotativo;
    }

    function setFijo($fijo) {
        $this->fijo = $fijo;
    }

    function setRotativo($rotativo) {
        $this->rotativo = $rotativo;
    }



}
