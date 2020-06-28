<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jefe
 *
 * @author Alberto Damelles
 */
include_once('Anuncio.php');
include('Funcionario.php');
include_once "../persistencia/ControladorConexion.php";

class Jefe extends Funcionario{
    private $func;
    private $anuncios;
    //put your code here
    
    public function crearAnuncio($nroAnuncio,$descripcion) {
        $a = new Anuncio($nroAnuncio, $descripcion);
        //guardar a en la base de datos
        $controlador= ControladorConexion::getInstance();
        $controlador->insertAnuncio($nroAnuncio, $descripcion);
        
    }
    
    public function verFuncionario($registro) {
        
        $controlador= ControladorConexion::getInstance();
        $f=$controlador->getFuncinario($registro);
        
        
        return $f;//la consulta
    }
    public function modificarFuncionario($registro,$modificacion)
    {
        # code...
        
    }

    public function borrarFuncionario($registro)
    {
        # code...
        $controlador= ControladorConexion::getInstance();
        $controlador->deleteFuncionario($registro);
    }

}
