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
interface IControladorFuncionario {
    //put your code here
    
       public static function getInstance();
      
       public function ingresarMarca($registro, $hora,$tipo);
      
       public function getFuncionario($registro);
       public function agregarSupers($reg, $esSub, $esSuper, $esJefe);
       public function obtenerInconsistencia($registro, $hora, $tipoMarca);
       public function removerInconsistencia($hora, $registro, $tipoMarca);
               
}
