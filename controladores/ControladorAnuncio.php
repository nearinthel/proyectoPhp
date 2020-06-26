<?php

include_once 'Anuncio.php';

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
include_once 'Funcionario.php';


class ControladorAnuncio implements IControladorAnuncio {
    
    private static $instance;
    
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
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
