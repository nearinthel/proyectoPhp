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
    <title>Document</title>
</head>
<body>
    <div class="bg">
        <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="../index.html">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Log out</a>
        </li>
        </ul>
        <div class="row">
            <div class="col">
                <div class="container">
<?php 
include_once '../clases/Funcionario.php';
include_once '../DataTypes/DTSueldo.php';
include_once '../DataTypes/DTCargo.php';
include '../utilities/numAMeses.php';
include '../utilities/mesesANum.php';

    $dts=new DTSueldo("500pei");
    $dtc=new DTCargo("Alcahuete",$dts);
    $f=new Funcionario();
    $f->setRegistro("123");
    $f->setNombre("Red Jhon");
    $nom=$f->getNombre();
    $f->setCargo($dtc);
    // echo "<h2>".$nom."</h2>";
    $carg=$f->getCargo()->getNivel();
    if(!isset($_POST['mes'])){
        $m=new DateTime("now");}
    else{
        $m=new DateTime("now");
        $numes= mesesANum::mes($_POST['mes']);
        echo $numes;
        $m->setDate(1,$numes,2020);
    }    
    $mes=$m->format("m");
    echo $mes;

?>
                <h2><?php echo $nom; ?></h2>
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="../img/power.jpg" alt="Card image" style="width:100%">
                        <div class="card-body">
                              <h4 class="card-title"><?php echo  "Cargo: ".$carg; ?></h4>
                              <p class="card-text">Explicacion del cargo</p>
                              <!-- <a href="#" class="btn btn-primary">Ver recibo</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <h1 class="text-center">Planilla diaria</h1>
                <h4>Mes <?php echo numAMeses::mes($mes); ?></h4>
                
                <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Dia</th>
                    <th class="text-center">Entrada</th>
                    <th class="text-center">Salida</th>
                    <th class="text-center">Inconsistencia</th>
                    <th class="text-center">Anuncios</th>
                </tr>
                </thead>
                <tbody>
                    <?php  ?>
                    <!-- <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    </tr> -->
                    <?php  ?>
                </tbody>
                </table>
                <form action="funcionario.php" method="post">
                <label>Otros meses: </label>
                <input list="mes" name="mes" id="mes">
                <datalist id="mes">
                    <option value="Enero">
                    <option value="Febrero">
                    <option value="Marzo">
                    <option value="Abril">
                    <option value="Mayo">
                    <option value="Junio">
                    <option value="Julio">
                    <option value="Agosto">
                    <option value="Setiembre">
                    <option value="Octubre">
                    <option value="Noviembre">
                    <option value="Diciembre">
                </datalist>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Aceptar</button>
                <form>
            </div>
        </div>
    </div>
</body>
</html>