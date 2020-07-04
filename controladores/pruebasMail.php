<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../persistencia/ControladorConexion.php';
include_once "../clases/Funcionario.php";
include_once "../clases/Anuncio.php";
try{
    //ini_set('memory_limit', '-1');
    $controlador= ControladorConexion::getInstance();
    
    $empleado=new Funcionario();
    
    $result=$controlador->getSupervisor(12102282);
    
    foreach ($result as $row){
        $sup=$row["regSup"];
    }
    $resultado=$controlador->selectFuncionario($sup);
    echo "busco funcionario";
    
    foreach ($resultado as $row) {
     $empleado->setRegistro($row["registro"]);// $registro;
     $empleado->setMail($row["mail"]);   

        echo $empleado->getMail();
    }
    
    
    
    $anuncio = new Anuncio(1, "puto el que lo lea");
    
    echo $anuncio->getDescripcion();
    
    $anuncio->attach($empleado);
    
    
    $anuncio->setDescripcion("trolololo");
    
    //$anuncio->ingresarAnuncio(1, "puto el que lo lea");
    
    //echo "puto 3";
    
    
    
    
} catch (Exception $ex) {
 echo $ex->getMessage();
}