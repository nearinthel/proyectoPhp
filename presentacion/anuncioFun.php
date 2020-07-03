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
    <?php include '../utilities/navBar.php';
    include_once '../clases/Anuncio.php';
    include_once '../controladores/ControladorAnuncio.php';
    $ins=ControladorAnuncio::getInstance();
    $a = $ins->ingresarAnuncio($_POST['nroA'], $_POST['just'],$_SESSION['func'],$_POST['hini'],$_POST['hfin']);
    
    ?>
    <h2 class="text-primary">Se ingreso el Anuncio con justificacion <?php echo $a->getJustificacion(); ?></h6>
    <a href="../index.html" class="btn btn-info" role="button">Aceptar</a>

</div>
</body>
</html>