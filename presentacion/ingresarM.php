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
    <?php 
    include_once "../persistencia/ControladorConexion.php";
    include_once "../clases/Funcionario.php";
    include_once "../DataTypes/DTMarca.php";
    date_default_timezone_set("America/Montevideo");
    $con = ControladorConexion::getInstance();
    $reg =$_POST['reg'];
    $f = $con->getFuncionario($reg);
    $m = new DateTime("now");
    $tipo = $_POST['tipo'];
    $f->ingresarMarca($m,$tipo);
    ?>
    <div class="bg">
        <div class="container">
            <h2><?php echo $f->getNombre()." ".$f->getApellido(); ?></h2>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="../img/<?php echo $f->getRegistro(); ?>.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo  "Cargo: ".$f->getCargo()->getNivel(); ?></h4>
                            <p class="card-text">Explicacion del cargo(segun empresa)</p>                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h1 class = "text-center text-success">Se ingreso una marca de 
                    <?php if($_POST["tipo"]==0){echo "Entrada";}else{echo "Salida";}?> con la hora
                    <?php echo $m->format("H:i a"); ?><h1>
                    <a class=" text-center nav-link" href="../index.html">Ir a inicio</a>
                </div>    
            </div>
        </div>
    </div>
    
</body>
</html>