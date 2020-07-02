<?php
include_once '../clases/Funcionario.php';
session_id("elfun"); 
session_start();
?>


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
    <?php include '../utilities/navBar.php' ?>
    <h2 class="text-primary">Ingresar Anuncio</h6>
    <form method="POST" action="">
        <div class ="row">
            <div class="col">
    <label>Seleccione el dia</label>
    <input type = "date" id="dia" name="dia" min="2020-01-01"
        max=<?php $n= new DateTime("now");
            $a = $n->format("Y");
            $mm = $n->format("m");
            $d = $n->format("d");
            echo "$a"."-"."$mm"."-"."$d";?> value=<?php if(isset($_SESSION['dia'])){
                                                    echo $_SESSION['dia']->format('Y-m-d');}?>>
            </div>
            <div class="col">
            </div>
        </div>
    </form>
</div>
</body>
</html>