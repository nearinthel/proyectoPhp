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
    //despues lo hago enumerado usar strtotime 
    private $fijo = array(
                    array("dia"=>"Lunes","entrada"=>"08:00am","salida"=>"04:00pm"),
                    array("dia"=>"Martes","entrada"=>"08:00am","salida"=>"04:00pm"),
                    array("dia"=>"Miercoles","entrada"=>"08:00am","salida"=>"04:00pm"),
                    array("dia"=>"Jueves","entrada"=>"08:00am","salida"=>"04:00pm"),
                    array("dia"=>"Viernes","entrada"=>"08:00am","salida"=>"04:00pm")
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
