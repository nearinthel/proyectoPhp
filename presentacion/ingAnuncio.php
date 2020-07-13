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
    <?php include '../utilities/navBar.php';
    include_once '../clases/Anuncio.php';
    include_once '../persistencia/ControladorConexion.php';
    $ins=ControladorConexion::getInstance();
    $a1= $ins->insertAnuncio(1,"Hora extra descanso" ,0, "");
    $a2= $ins->insertAnuncio(2,"Hora extra común" ,0, "");
    $a3= $ins->insertAnuncio(3,"LLegada tarde" ,0, "");
    $a4= $ins->insertAnuncio(4,"Salida antes" ,0, "");
    $a5= $ins->insertAnuncio(5,"Licencia" ,0, ""); 
    $res =$ins->selectAnuncios();
    ?>
    <h2 class="text-primary">Ingresar Anuncio</h6>
    <form method="POST" action="anuncioFun.php">
        <div class ="row">
            <div class="col">
                <label>Seleccione el dia</label>
                <input type = "date" id="dia" name="dia" min="2020-01-01"
                    max=<?php $n= new DateTime("now");
                    $a = $n->format("Y");
                    $mm = $n->format("m");
                    $d = $n->format("d");
                    echo "$a"."-"."$mm"."-"."$d";?> >
                <label for="nroA">Anucio a ingresar</label>
                <select name="nroA" id="nroA">
                    <?php
                    while($row = $res->fetch_assoc()){
                        echo "<option value=".$row["nroAnuncio"].">".$row["descripcion"]."</option>";
                    }?>
                </select>
                <div class="text-left">
                <label for="hini">Hora de la inconsistencia:
                <input type="time" name="hini"></label>
                </div>
                <div class="text-rigth">
                <label for="hfin">Hora de finalizacion:
                <input type="time" name="hfin"></label>
                </div> 
            </div>
            
            <div class="col">
                <div class="form-label-group">
                    <input type="text" id="just" name="just" class="form-control" placeholder="Justificación">
                    
                </div> 
            </div>
        </div>
        <button class="btn btn-lg btn-primary text-uppercase" type="submit">Ingresar Anuncio</button>
    </form>
</div>
</body>
</html>