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
    
    public function __construct() {
        
    }
            
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getNroAnuncio() {
        return $this->nroAnuncio;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setNroAnuncio($nroAnuncio) {
        $this->nroAnuncio = $nroAnuncio;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function borrarInconsistencia() {
        
    }

    
        


    //put your code here
}
