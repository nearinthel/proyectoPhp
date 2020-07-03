<?php 
include_once '../clases/Funcionario.php'; 
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
<div class="bg">
    <?php 
    
    include_once '../persistencia/ControladorConexion.php';
    include_once '../utilities/navBar.php';
    $f = $_SESSION["func"];
    chdir('..');
    $directoriofinal = getcwd().'/img/';
    $nombrearchivo=  $_FILES['img']['name'];
    $directoriotemp = $_FILES['img']['tmp_name'];
    $tipoarchivo = $_FILES['img']['type'];
    $tamanio = $_FILES['img']['size']; 
    // $ubicacion = $directoriofinal. basename($nombrearchivo);
    $ubicacion = $directoriofinal. basename($_POST['ci'].'.jpg');
    move_uploaded_file($_FILES['img']['tmp_name'], $ubicacion);
    $directorio = '../img/'.$_POST['ci'].'.jpg';
    $con = ControladorConexion::getInstance();
     
    ?>
    <div class="row">
            <div class="col-sm-4">
                <div class="container">
                <h2><?php echo $_POST['name']." ".$_POST['lname']; ?></h2>
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="<?php echo $directorio;?>" 
                                alt="Card image" style="width:100%">
                        <div class="card-body">
                              <!-- <h4 class="card-title"><?php echo  "Cargo: ".$f->getCargo()->getNivel(); ?></h4> -->
                              <p class="card-text">Explicacion del cargo(segun empresa)</p>
                             
                        </div>
                    </div>
                </div>
            </div>
</div>    
</body>
</html>