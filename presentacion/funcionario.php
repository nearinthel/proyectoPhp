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
        <div class="bg" style="overflow: scroll">



<?php 
include_once '../utilities/navBar.php';
include_once '../clases/Funcionario.php'; 
include_once '../clases/FuncionarioMarca.php';
include_once '../clases/Marca.php';
include '../utilities/numAMeses.php';
include '../utilities/mesesANum.php';
include '../utilities/diasDelMes.php';
include_once '../DataTypes/DTSueldo.php';
include_once '../DataTypes/DTCargo.php';
include_once '../clases/Funcionario.php';
date_default_timezone_set("America/Montevideo");

    $_SESSION["msg"]="";
    $f = $_SESSION["func"];

    $m=new DateTime('now');
    if(!isset($_POST['mes'])){
        $mes=$m->format("m");
        $numes = numAMeses::mes($mes);
    }
    else{
        $mes= substr($_POST['mes'],-2);
        $numes = numAMeses::mes($mes);
     }
    $fma='Y-m-d H:i:s';
   /* $e1= DateTime::createFromFormat($fma,'2020-06-01 08:00:00');
    $e2= DateTime::createFromFormat($fma,'2020-06-02 07:34:34');
    $e3= DateTime::createFromFormat($fma,'2020-06-03 07:56:04');
    $e4= DateTime::createFromFormat($fma,'2020-06-04 08:03:44');
    $e5= DateTime::createFromFormat($fma,'2020-06-05 08:04:33');
    $e6= DateTime::createFromFormat($fma,'2020-06-06 07:59:00');
    $s1= DateTime::createFromFormat($fma,'2020-06-01 16:02:33');
    $s2= DateTime::createFromFormat($fma,'2020-06-02 16:00:00');
    $s3= DateTime::createFromFormat($fma,'2020-06-03 15:55:34');
    $s4= DateTime::createFromFormat($fma,'2020-06-04 16:23:33');
    $s5= DateTime::createFromFormat($fma,'2020-06-05 15:23:45');
    $s6 = DateTime::createFromFormat($fma,'2020-06-06 16:00:00');
    $f->ingresarMarca($e1,0);
    $f->ingresarMarca($e2,0);
    $f->ingresarMarca($e3,0);
    $f->ingresarMarca($e4,0);
    $f->ingresarMarca($e5,0);
    $f->ingresarMarca($e6,0);
    $f->ingresarMarca($s1,1);
    $f->ingresarMarca($s2,1);
    $f->ingresarMarca($s3,1);
    $f->ingresarMarca($s4,1);
    $f->ingresarMarca($s5,1);
    $f->ingresarMarca($s6,1);*/
?>

        <div class="row">
            <div class="col-sm-4">
                <div class="container">
                <h2><?php echo $f->getNombre()." ".$f->getApellido(); ?></h2>
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="<?php echo '../img/'.$f->getRegistro().'.jpg'?>" 
                                alt="Card image" style="width:100%">
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
                    $con = ControladorConexion::getInstance();
                    $entradas = array();
                    $salidas = array();
                    $entradas = $con->getMarcasMes($f,0,$mes,$m->format("Y"));
                    $salidas = $con->getMarcasMes($f,1,$mes,$m->format("Y"));     
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
                        echo "<td>";
                        if($i<10){
                            $ind= "0".$i;
                        }elseif($i<20){
                            $ind= $i;
                        }else{$ind= "2".$i;}
                        if(isset($entradas[$ind])){
                            $_SESSION['ent']=$entradas[$ind];                            
                            echo $entradas[$ind]->format('H:i');}
                        echo "</td>";
                        echo "<td>";
                        if(isset($salidas[$ind])){
                            $_SESSION['sal'] = $salidas[$ind];
                        echo $salidas[$ind]->format('H:i');}
                        echo "</td>";
                        echo "<td>";
                        $bandera = false;
                        if(isset($entradas[$ind])){
                            if($f->verificarInconsistencia($entradas[$ind],0)){
                                $bandera = true;
                                echo "LLegada tarde";
                            }
                        }
                        if(isset($salidas[$ind])){
                            if($f->verificarInconsistencia($salidas[$ind],1)){
                                if($bandera){
                                    echo " - ";
                                }
                                $bandera=true;
                                echo "Salida antes de hora";
                            }
                        }
                        echo "</td>";
                        
                        
                        echo "<td>"; 
                        if($bandera){    
                            echo "<a class=".'"nav-link"'. "href=".'listadodeInconsistencias.php'.">";
                            echo "<img src=".'"../img/iconoAnuncio.png"'."alt=".'"icono"'."style=".'"width:81px;heigth:52px"'.">";
                            echo "</a>";
                            }
                        if(isset($entradas[$ind])or isset($salidas[$ind])){
                            if(($d->format("D")=='Sun')or($d->format("D")=='Sat')){
                                echo "<a class=".'"nav-link"'. "href=".'listadodeInconsistencias.php'.">";
                                echo "<img src=".'"../img/iconoAnuncio.png"'."alt=".'"icono"'."style=".'"width:81px;heigth:52px"'.">";
                                echo "</a>";
                            }
                        }
                        if(isset($entradas[$ind]) and isset($salidas[$ind])){
                            $aux1= ($entradas[$ind]->diff(($salidas[$ind])))->format('%H:%i');
                            $minH= '09:00';
                            if($aux1>=$minH){
                                echo "<a class=".'"nav-link"'. "href=".'listadodeInconsistencias.php'.">";
                                echo "<img src=".'"../img/iconoAnuncio.png"'."alt=".'"icono"'."style=".'"width:81px;heigth:52px"'.">";
                                echo "</a>";
                            }
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                       
                        // for ($i=0 ; $i < count($entradas) ; $i++ ) {
                        //     echo "<tr>";
                        //     echo "<td>"; 
                            
                        //     echo "</td>";
                        //     echo "<td>";
                            
                        //     echo "</td>";
                        //     echo "</tr>";
                                       
                      
                    
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