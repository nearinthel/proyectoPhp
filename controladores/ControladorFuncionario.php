<?php

include 'Funcionario.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorFuncionario
 *
 * @author Alberto Damelles
 */
include 'FuncionarioMarca.php';
include 'enumES.php';


class ControladorFuncionario implements IControladorFuncionario {
    
    private $instance = null;
    
    public function getInstance(){
        if (!isset($this->instance)){
            $this->instance=new $this->ControladorFuncionario();
        }
        return $this->instance;
        
    }
    
    public function ingresarFuncionario($param){
        
        
    }
    public function ingresarMarca($registro, $hora,$tipo){
        //tipo se lo pasamos 0 entrada 1 salida de la capa de presentacion
        //si no anda hay que mandarle el enumES
        $func =null;//lo obtengo de la base
        $func->ingresarMarca($hora,tipo);
        
    }
    public function ingresarSistema(){
        
    }

    public function verSueldo($registro)
    {
        # code...
    }



}
?>
