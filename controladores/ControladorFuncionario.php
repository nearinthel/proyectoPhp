<?php

include 'Funcionario.php';

include "../persistencia/iControladorConexion.php";

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
    
    private static $instance;
    
    public function getInstance(){
        if (!isset($this->instance)){
            $this->instance=new $this->ControladorFuncionario();
        }

        return self::$instance;
    }
    
    public function ingresarFuncionario($param){
        
        
    }
    public function ingresarMarca($registro, $hora,$tipo){
        //tipo se lo pasamos 0 entrada 1 salida de la capa de presentacion
        //si no anda hay que mandarle el enumES
        
        $controlador = iControladorConexion::getInstance();
        //$func =null;//lo obtengo de la base
        $func = new Funcionario();
        
        $result=$controlador->select($registro);
        
        foreach ($result as $row){
            $func->setRegistro($row["registro"]);
               
            //$func->setCi($row["registro"]);
            $func->setNombre($row["nombre"]);
            $func->setApellido($row["registro"]);
            $func->setFnac($row["fnac"]);
            $func->setFing($row["fing"]);
            $func->setCargo($row["cargo"]);
            $func->setHorario($row["horario"]);

            
        }
        $func->ingresarMarca($hora,$tipo);
        
    }
    public function ingresarSistema(){
        
    }

    public function verSueldo($registro)
    {
        # code...
    }
    
    public function obtenerInconsistencia($registro, $hora, $tipoMarca){
        
        $controlador= iControladorConexion::getInstance();
        $result = $controlador->obtenerInconsistencia($registro, $hora, $tipoMarca);
        
        foreach ($result as $row ) {
       
            $inc=$row["inconsistencia"];
	}
        
        return $inc;       
               
        
    }
    
    public function removerInconsistencia($hora, $registro, $tipoMarca){
        
        //$fm= new FuncionarioMarca();
        
        
        $controlador= iControladorConexion::getInstance();
        
        //$controlador->noJustificar($nroAnuncio, $hora, $registro, $tipoMarca);
        $controlador->noJustificar($hora, $registro, $tipoMarca);
    }



}
?>
