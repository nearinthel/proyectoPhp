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
include('Anuncio.php');
include('Funcionario.php');
class Jefe extends Funcionario{
    private $func;
    private $anuncios;
    //put your code here
    
    public function crearAnuncio($nroAnuncio,$descripcion) {
        $a = new Anuncio($nroAnuncio, $descripcion);
        //guardar a en la base de datos
        
    }
    
    public function verFuncionario($registro) {
        $f=null;
        return $f;//la consulta
    }
    public function modificarFuncionario($registro,$modificacion)
    {
        # code...
    }

    public function borrarFuncionario($registro)
    {
        # code...
    }

}
