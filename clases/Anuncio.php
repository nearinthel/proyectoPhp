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
    
    private $fM;
    private $descripcion;// de que se trata el anuncio
    private $nroAnuncio;//numero que se usa en la empresa para ese anuncio ejemplo exrta 4
    private $justificacion;//porque lo usaron
    private $id = 0;//probar
    
    public function __construct() {
        
    }
            
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getNroAnuncio() {
        return $this->nroAnuncio;
    }

    public function getFM(){
        return $this->fm;
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
        $this->fm->removerIncosistencia();        
    }

    public function modificarSueldo{
        //obtengo la hra de la marca la del horario y hago la cuenta
        $hmarca = $this->fm->getInconsistencia()->getHora();
        $horario = $this->fm->getFuncionario()->getHorario();
        if ($horario->getTipo() == 0) {
            if($hmarca > date(16-0-0) ){
                $sueldo = $this->fm->getFuncionario()->getSueldo(); 
                //aca modificar la plata
            }
        }
    }
    
}
