<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../persistencia/ControladorConexion.php';
include "../clases/Funcionario.php";
include "../clases/Anuncio.php";
try{
    ini_set('memory_limit', '-1');
    $controlador= ControladorConexion::getInstance();
    
    $empleado=new Funcionario();
    $resultado=$controlador->getFuncionario(44853435);
    echo "busco funcionario";
    
    foreach ($resultado as $row) {
     $empleado->setRegistro($row["registro"]);// $registro;
     $empleado->setMail($row["mail"]);   

        echo "funcionario";
    }
    
    $anuncio = new Anuncio(1, "puto el que lo lea");
    echo "puto";
    $anuncio->attach($empleado);
    echo "puto 2";
    $anuncio->ingresarAnuncio(1, "puto el que lo lea");
    
    echo "puto 3";
    
    
    
    
} catch (Exception $ex) {
 echo $ex->getMessage();
}