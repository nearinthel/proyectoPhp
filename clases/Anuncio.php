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
class Anuncios implements SplSubject{
    
    private $descripcion;
    private $nroAnuncio;
    private $id;
    private $estado;
    private $storage;
    
    
    public function __construct() {
        
        $this->storage = new SplObjectStorage;
        
    }
            
    public function getDescripcion() {
        return $this->descripcion;
        
    }

    public function getNroAnuncio() {
        return $this->nroAnuncio;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        $this->estado=$this->getDescripcion();
        $this->notify();
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
    
    public function attach(SplObserver $observer)
    {
        $this->storage->attach($observer);
    }
    public function detach(SplObserver $observer)
    {
        $this->storage->detach($observer);
    }
    public function notify()
    {
        foreach ($this->storage as $observer) {
            $observer->update($this);
        }
    }

    
        


    //put your code here
}
