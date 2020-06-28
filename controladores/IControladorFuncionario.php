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
    
       public function getInstance();
       public function ingresarFuncionario($param);
       public function ingresarMarca($param);
       public function ingresarSistema($param);
       public function getFuncionario($registro);
               
}
