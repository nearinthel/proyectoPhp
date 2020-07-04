<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Alberto Damelles
 */
interface IControladorAnuncio {
    
    
    //put your code here
    
    public function getInstance();
    public function aceptarAnuncio($param);
    public function ingresarAnuncio($num, $just,$emp, $hora);
}
