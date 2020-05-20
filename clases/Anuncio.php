<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Anuncios
 *
 * @author Alberto Damelles
 */
class Anuncios {
    
    private $descripcion;
    private $nroAnuncio;
    private $id;
            
    function getDescripcion() {
        return $this->descripcion;
    }

    function getNroAnuncio() {
        return $this->nroAnuncio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNroAnuncio($nroAnuncio) {
        $this->nroAnuncio = $nroAnuncio;
    }
    
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    
        
    function __construct() {
        
    }

    //put your code here
}
