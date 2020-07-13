<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../persistencia/ControladorConexion.php';
include_once '../controladores/ControladorAnuncio.php';

$f=$_SESSION["func"];

$reg=$f->getRegistro();
$hora=$_POST['hora'];
$desc=$_POST['desc'];

$con= ControladorAnuncio::getInstance();

$con->ingAnuncio($hora, $reg, $desc);


