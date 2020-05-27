<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supervisor
 *
 * @author Alberto Damelles
 */
class Supervisor extends Funcionario{
    private $anuncios;//lista de anuncios a aprobar

    public function aceptarAnuncio($idAnuncio) {
        $i = 0;
        while($idAnuncio != $anuncios[$i].getId()){
            $i++;
        }
        //revisar memoria
        unset($anuncios[$i]);
    }
}
