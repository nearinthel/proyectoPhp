<?php
include_once '../clases/Funcionario.php';
//session_id("elfun"); 
//session_start();

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
    <?php include '../utilities/navBar.php';?>
        <h2 class="text-primary">Ingresar Anuncio</h6>
    <form method="POST" action="agregarAnuncio.php">
        <div class ="row">
            <div class="form-label-group">
    <?php 
    include_once '../clases/Anuncio.php';
    include_once '../persistencia/ControladorConexion.php';

    
    $f=$_SESSION["func"];
    $reg=$f->getRegistro();
    
    $con=ControladorConexion::getInstance();
    
    $resultado=$con->getMarcasInconsistentes($reg);
    foreach($resultado as $row) {
        $tipo=$row['tipoMarca'];
        $hora=new DateTime($row['hora']);
        
        if($f->verificarInconsistencia($hora,$tipo==0)){
                                
            
            echo "<input type='radio' name='hora' value=".$row["hora"].">".$row["hora"]." LLegada tarde </input>";
            echo "<br />";
        }
        if($f->verificarInconsistencia($hora,$tipo==1)){
                                
            
            echo "<input type='radio' name='hora' value=".$row["hora"].">".$row["hora"]." Ida antes de hora </input>";
            echo "<br />";
        }
  
       
    }
    ?>

            </div>
        </div>
        <button class="btn btn-lg btn-primary text-uppercase" type="submit">Ingresar Anuncio</button>
    </form>
</div>
</body>
</html>