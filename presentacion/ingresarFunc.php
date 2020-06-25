<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Personal</title>
</head>
</head>
<body>
<?php  
    include_once '../persistencia/ControladorConexion.php';
    $directoriofinal = getcwd().'/img/';
    $nombrearchivo = $_FILES['img']['name'];
    $directoriotemp = $_FILES['img']['tmp_name'];
    $tipoarchivo = $_FILES['img']['type'];
    $tamanio = $_FILES['img']['size']; 
    $ubicacion = $directoriofinal. basename($reg);
    move_uploaded_file($_FILES['img']['tmp_name'], $ubicacion);
    $directorio = 'img/'.$nombrearchivo;
    $con = ControladorConexion::getInstance();



?>
<div class="bg">
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="../funcionario.php">Planilla</a>
        </li>
        <li>
        <a href="#" class="nav-link">Ver recibo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Bandeja de Anuncios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Crear Anuncio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Modificar Funcionario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Log out</a>
        </li>
    </ul>
    <!-- aca mostrar la card del usuario -->
    
</body>
</html>