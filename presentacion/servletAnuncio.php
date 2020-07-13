<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Personal</title>
</head>
<body>
<div class="bg">



<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../persistencia/ControladorConexion.php';
include_once '../controladores/ControladorAnuncio.php';
include '../utilities/navBar.php';

//$f=$_SESSION["func"];

$reg=$f->getRegistro();
$hora=$_POST['hora'];
$desc=$_POST['desc'];

$con= ControladorAnuncio::getInstance();

$con->ingAnuncio($hora, $reg, $desc);
?>
    <h5 class="card-title">Anuncio ingresado</h5>
</div>
</body>
</html>

