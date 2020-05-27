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
    //despues lo hago enumerado
    
    private $fijo = array(array("Lunes",date(8:0:0),date(16:0:0)),
                    array("Martes",date(8:0:0),date(16:0:0)),
                    array("Miercoles",date(8:0:0),date(16:0:0)),
                    array("Jueves",date(8:0:0),date(16:0:0)),
                    array("Viernes",date(8:0:0),date(16:0:0))
                );
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
