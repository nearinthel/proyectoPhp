<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'ControladorConexion.php';

try{
$registro=44853435;
$nombre="Hugo"; 
$apellido="Damelles";
$fnac=new DateTime("1985-03-07 02:30:00 PM");
//$fnac=date("Y-m-d H:i:s");
echo $fnac->format('Y-m-d H:i:s');

$fing=new DateTime("1985-03-07 02:30:00 AM");
$cargo="cajero";
$sueldo=20000;
$entrada=new DateTime("1985-03-07 02:30:00 AM");
$salida=new DateTime("1985-03-07 02:30:00 AM");
$esSubordinado="c";
$esSupervisor="c";
$esJefe="c";

$instancia=ControladorConexion::getInstance();
$instancia->insertFuncionario($registro, $nombre, $apellido, $fnac, 
            $fing,$cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
$instancia->agregarSubordinado($registro, $registro);
}
 catch (Exception $e){
     echo $e->getMessage();
     //echo $e->getCode();
 }

