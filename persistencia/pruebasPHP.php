<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'ControladorConexion.php';

try{
$registro=44853435;
$pass="1234";
$nombre="Hugo"; 
$apellido="Damelles";
$fnac=new DateTime("1985-03-07 02:30:00 PM");
//$fnac=date("Y-m-d H:i:s");
echo $fnac->format('Y-m-d H:i:s');

$fing=new DateTime("1985-03-07 02:30:00 AM");
$cargo="gerente";
$sueldo=20000;
$entrada=new DateTime("1985-03-07 02:30:00 AM");
$salida=new DateTime("1985-03-07 02:30:00 AM");
$esSubordinado="0";
$esSupervisor="0";
$esJefe="1";



$instancia=ControladorConexion::getInstance();
$instancia->insertFuncionario($registro, $pass, $nombre, $apellido, $fnac, 
            $fing,$cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
//$instancia->agregarSubordinado($registro, $registro);

//marcas
echo "mostrar mensaje";
$hora=new DateTime("1985-03-07 02:30:00 PM");

echo $hora->format('H:i:s');      
$tipo="entrada";
$inc="1";

$instancia->insertMarca($hora, $registro, $tipo, $inc);

$hora=new DateTime("07:30:00 PM");
$tipo="salida";
$inc="0";

$instancia->insertMarca($hora, $registro, $tipo, $inc);

 
$registro=12102282;
$pass="1234";
$nombre="Susana"; 
$apellido="Merello";
$fnac=new DateTime("1950-02-15 02:30:00 PM");
//$fnac=date("Y-m-d H:i:s");
echo $fnac->format('Y-m-d H:i:s');

$fing=new DateTime("1985-03-07 02:30:00 AM");
$cargo="encargado";
$sueldo=20000;
$entrada=new DateTime("1985-03-07 02:30:00 AM");
$salida=new DateTime("1985-03-07 02:30:00 AM");
$esSubordinado="0";
$esSupervisor="1";
$esJefe="0";




$instancia=ControladorConexion::getInstance();
$instancia->insertFuncionario($registro, $pass, $nombre, $apellido, $fnac, 
            $fing,$cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
//$instancia->agregarSubordinado($registro, $registro);

//marcas
//marcas
echo "mostrar mensaje";
$hora=new DateTime("1985-03-07 02:30:00 PM");

echo $hora->format('H:i:s');      
$tipo="entrada";
$inc="1";

$instancia->insertMarca($hora, $registro, $tipo, $inc);

$hora=new DateTime("07:30:00 PM");
$tipo="salida";
$inc="0";

$instancia->insertMarca($hora, $registro, $tipo, $inc);


$registro=44151643;
$pass="1234";
$nombre="Lucia"; 
$apellido="Figueredo";
$fnac=new DateTime("1987-02-14 02:30:00 PM");
//$fnac=date("Y-m-d H:i:s");
echo $fnac->format('Y-m-d H:i:s');

$fing=new DateTime("1985-03-07 02:30:00 AM");
$cargo="cajero";
$sueldo=20000;
$entrada=new DateTime("1985-03-07 02:30:00 AM");
$salida=new DateTime("1985-03-07 02:30:00 AM");
$esSubordinado="1";
$esSupervisor="0";
$esJefe="0";

$instancia=ControladorConexion::getInstance();
$instancia->insertFuncionario($registro, $pass, $nombre, $apellido, $fnac, 
            $fing,$cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
//$instancia->agregarSubordinado($registro, $registro);

//marcas
echo "mostrar mensaje";
$hora=new DateTime("1985-03-07 02:30:00 PM");

echo $hora->format('H:i:s');      
$tipo="entrada";
$inc="1";

$instancia->insertMarca($hora, $registro, $tipo, $inc);

$hora=new DateTime("07:30:00 PM");
$tipo="salida";
$inc="0";

$instancia->insertMarca($hora, $registro, $tipo, $inc);

$registro=12345678;
$pass="1234";
$nombre="Mariana"; 
$apellido="Damelles";
$fnac=new DateTime("1977-02-15 02:30:00 PM");
//$fnac=date("Y-m-d H:i:s");
echo $fnac->format('Y-m-d H:i:s');

$fing=new DateTime("1985-03-07 02:30:00 AM");
$cargo="vendedor";
$sueldo=20000;
$entrada=new DateTime("1985-03-07 02:30:00 AM");
$salida=new DateTime("1985-03-07 02:30:00 AM");
$esSubordinado="1";
$esSupervisor="0";
$esJefe="0";

$instancia=ControladorConexion::getInstance();
$instancia->insertFuncionario($registro, $pass, $nombre, $apellido, $fnac, 
            $fing,$cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
$instancia->agregarSubordinado(44853435, $registro);

$instancia->agregarSubordinado(44853435, 12102282);

$instancia->agregarSubordinado(44853435, 44151643);

$instancia->agregarSubordinado(12102282, $registro);
$instancia->agregarSubordinado(12102282, 44151643);

//marcas
echo "mostrar mensaje";
$hora=new DateTime("1985-03-07 02:30:00 PM");

echo $hora->format('H:i:s');      
$tipo="entrada";
$inc="1";

$instancia->insertMarca($hora, $registro, $tipo, $inc);

$hora=new DateTime("07:30:00 PM");
$tipo="salida";
$inc="0";

$instancia->insertMarca($hora, $registro, $tipo, $inc);






}
 catch (Exception $e){
     echo $e->getMessage();
     //echo $e->getCode();
 }