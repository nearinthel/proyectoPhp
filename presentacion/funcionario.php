<?php 
include_once '../clases/Funcionario.php';
session_id("elfun"); 
session_start(); ?>
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

include_once '../clases/FuncionarioMarca.php';
include_once '../clases/Marca.php';
include '../utilities/numAMeses.php';
include '../utilities/mesesANum.php';
include '../utilities/diasDelMes.php';
include_once '../DataTypes/DTSueldo.php';
include_once '../DataTypes/DTCargo.php';
include_once '../clases/Funcionario.php';
    $f = $_SESSION["func"];
    $m=new DateTime("now");
    if(!isset($_POST['mes'])){
        $mes=$m->format("m");
        $numes = numAMeses::mes($mes);
    }
    else{
        $mes= substr($_POST['mes'],-2);
        $numes = numAMeses::mes($mes);
    }    
    
?>  
    <div class="bg" style="overflow: scroll">
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">Inicio</a>
        </li>
        <li>
        <a href="#" class="nav-link">Ver recibo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" style=<?php if(($f->getCargo()->getNivel()=="esJefe")or
                                                        ($f->getCargo()->getNivel()=="esSuper"))
                                                            {echo '';}else{echo '"display:none"';} ?>>
            Bandeja de Anuncios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" style=<?php if(($f->getCargo()->getNivel()!="esJefe"))
                                                        {echo '"display:none"';}?>>
            Crear Anuncio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" style=<?php if($f->getCargo()->getNivel()!="esJefe")echo '"display:none"'; ?>>
            Modificar Funcionario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="agregarFuncionario.php" style=<?php if($f->getCargo()->getNivel()!="esJefe"){echo '"display:none"';} ?>>
            Agregar Funcionario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Log out</a>
        </li>
        </ul>
        <div class="row">
            <div class="col-sm-4">
                <div class="container">
                <h2><?php echo $f->getNombre()." ".$f->getApellido(); ?></h2>
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="../img/power.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                              <h4 class="card-title"><?php echo  "Cargo: ".$f->getCargo()->getNivel(); ?></h4>
                              <p class="card-text">Explicacion del cargo(segun empresa)</p>
                             
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="container" >
                <h1 class="text-center">Planilla diaria</h1>
                <h4>Mes <?php echo $numes ?></h4>
                <div class="table-responsive container-md ">
                <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Dia</th>
                    <th class="text-center">Horario</th>
                    <th class="text-center">Entrada</th>
                    <th class="text-center">Salida</th>
                    <th class="text-center">Inconsistencia</th>
                    <th class="text-center">Anuncios</th>
                </tr>
                </thead>
                <tbody>
                    
                    <?php
                    $tope = diasDelMes::UltimoDia($m->format("Y"),$mes);
                    if($m->format("m")==$mes){
                        $tope=$m->format("d");
                    }                    
                    for ($i=1; $i <=$tope ; $i++) {
                        echo "<tr>";
                        echo "<td>";
                        echo $i.' ';                        
                        $fecha=$m->format("Y").'/'.$mes.'/'.$i;
                        $d = DateTime::createFromFormat('Y/m/d',$fecha);
                        echo $d->format("D");
                        echo "</td>";
                        echo "<td>";
                        if(($d->format("D")=='Sun')or($d->format("D")=='Sat')){
                            echo "Descanso";
                        }else{
                            echo "8:00-16:00";
                        }
                        echo "</td>";
                        echo "</tr>";
                        
                    }   

                    ?>
                    
                    
                </tbody>
                </table>
                <form action="funcionario.php" method="post">
                <label>Seleccione otro mes</label>
                <input type = "month" id="mes" name="mes" min="2020-01"
                    max=<?php $n= new DateTime("now");
                        $a = $n->format("Y");
                        $mm = $n->format("m");
                        echo "$a"."-"."$mm";?>>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Aceptar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>