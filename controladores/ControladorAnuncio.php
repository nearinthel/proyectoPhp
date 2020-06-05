<?php

include 'Anuncio.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorAnuncio
 *
 * @author Alberto Damelles
 */
include('Funcionario.php');


class ControladorAnuncio implements IControladorAnuncio {
    
    private $instance = null;
    
    
    public function getInstance(){
        if (!isset($this->instance)){
            $this->instance=new $this->ControladorAnuncio();
        }
        return $this->instance;
        
    }
    
    public function aceptarAnuncio($a,$f){
        $super = $f->getSuper();
        $id  = $a->getId();
        $super->aceptarAnuncio($id);
        $f->arreglarSueldo($id);
        $a->borrarInconsistencia();        
    }
    public function ingresarAnuncio($num, $just,$emp){
        $super = $emp->getSupervisor();
        $emp->ingresarAnuncio($num, $just);
        
    }
}
