<!DOCTYPE html>

<?php

include_once '../clases/Funcionario.php';
session_id("elfun"); 
session_start(); 

$f = $_SESSION["func"];
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <script src="../librerias/html2pdf.js/dist/html2pdf.bundle.min.js"></script>
        <script>
      function generatePDF() {
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("recibo");
        // Choose the element and save the PDF for our user.
        var opt = {
                margin:       1,
                filename:     'recibo.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 4 },
                jsPDF:        { unit: 'in', format: 'A4', orientation: 'landscape' }
    };
        html2pdf()
          .set(opt)
          .from(element)
          .save();
      }
      
      function goBack() {
          window.history.back();
      }
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Sueldo</title>
</head>
<body>
    <button onclick="generatePDF()">Descargar como PDF</button>
    <button onclick="goBack()">Volver atras</button>
    <div id="recibo">
    <img src="../img/logo.jpg" class="float-left border border-dark" width="150px" height="116px">
    <div class="row">    
        <div class="col-sm-12 text-center border border-dark bg-light">
            <h6>Liquidación de Haberes</h6>
        </div>
    </div>
    <div class="row">    
        <div class="col-sm-12 text-center border border-dark bg-light ">
            <h6>Administración de Personal</h6>
        </div>
    </div>
    <div class="row">    
        <div class="col-sm-4 text-center border border-dark bg-light ">
            <h6>Tipo de Liquidación</h6>
        </div>
        <div class="col-sm-4 text-center border border-dark bg-light ">
            <h6>Fecha</h6>
        </div>
        <div class="col-sm-4 text-center border border-dark bg-light ">
            <h6>Cedula de identidad</h6>
        </div>
        
    </div>
    <div class="row">    
        <div class="col-sm-4 text-center border border-dark bg-light ">
            <h6>Aca va el php</h6>
        </div>
        <div class="col-sm-4 text-center border border-dark bg-light ">
            <h6>mas php</h6>
        </div>
        <div class="col-sm-4 text-center border border-dark bg-light ">
            <h6><?php echo $f->getRegistro() ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center border border-dark bg-light">
            <h6>Apellido y Nombre</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center border border-dark bg-light">
            <h6><?php echo $f->getApellido()." ".$f->getNombre();?></h6>
        </div>
        
    </div>
    <div class="row">
        <div class="col text-center border border-dark bg-light">
            <h6>Haberes</h6>            
        </div>
        <div class="col text-center border border-dark bg-light">
            <h6>Descuentos</h6>
        </div>
    </div>
    <div class="row ">
        <div class = "col-sm-6 border border-dark bg-light text-center">
            <table class ="table table-striped">
                <tr>
                    <td class="text-left">
                        Sueldo Nominal
                    </td>
                    <td class="text-rigth">
                        <?php
                        $nominal=$f->getCargo()->getSueldo()->getSueldo();
                        echo $nominal;
                        ?>
                    </td>
                </tr>
                <!--<tr>
                    <td class="text-left">
                        Sueldo Nominal
                    </td>
                    <td class="text-rigth">
                        <?php
                        //echo $f->getCargo()->getSueldo()->getSueldo();
//                       ?>
                    </td>
                </tr>-->
                <tr>
                    <td class="text-left">
                        Horas extras simple
                    </td>
                    <td class="text-rigth">
                        <?php
                        $f->getCargo()->getSueldo();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="text-left">
                        Horas extras doble
                    </td>
                    <td class="text-rigth">
                        <?php
                        
                        $horas= $f->getCargo()->getSueldo()->getTotal();
                        if ($horas=0){
                            echo 0;
                        }else{
                            echo $horas;
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class = "col-sm-6 border border-dark bg-light text-center">
            <table class ="table table-striped">
            <tr>
                <td class="text-left">
                    Montepio
                </td>
                <td class="text-rigth">
                    <?php
                    $montepio=$f->getCargo()->getSueldo()->getSueldo()*0.15;
                    echo $montepio;
                    ?>
                </td>
            </tr>
            <tr>
                <td class="text-left">
                    SNIS
                </td>
                <td class="text-rigth">
                    
                    <?php 
                    $snis=0;
                    if ($f->getCargo()->getSueldo()->getSueldo()<=9620){
                        $snis=$f->getCargo()->getSueldo()->getSueldo()*0.03;
                        
                    }
                    else  {
                        $snis= $f->getCargo()->getSueldo()->getSueldo()*0.045;
                    }
                    echo $snis;

                    ?>
                    <!--3% si tu sueldo nominal no supera las 2,5 BPC* ($9.620)
                     4,5% si supera 2,5 BPC* ($9.620 en adelante) y no tienes hijos a cargo.
                        6 % para más de 2,5 BPC* ($9.620) con hijos menores o con discapacidad a cargo.
                    5% para más de 2,5 BPC* ($9.620) sin hijos, pero sí cónyuge o pareja a cargo.
                    8% más de 2,5 BPC* ($9.620) con hijos y pareja a cargo. -->
                </td>
            </tr>
            <tr>
                <td class="text-left">
                    FRL
                </td>
                <td class="text-rigth">
                    <?php
                    $frl=$f->getCargo()->getSueldo()->getSueldo()*0.125;
                    echo $frl;
                    ?>

                </td>
            </tr>
            <tr>
                <td class="text-left">
                    IRPF
                </td>
                <td class="text-rigth">
                    <?php
                    $irpf=$f->getCargo()->getSueldo()->getSueldo();
                    if($irpf<=26936){
                        $irpf=$irpf*0;
                        
                    }elseif ($irpf<=38480) {
                        $irpf= $irpf*0.1;                        
                    }elseif ($irpf<=57720) {
                        $irpf= $irpf*0.15;                        
                    }elseif ($irpf<=115440) {
                        $irpf= $irpf*0.24;
                    }elseif ($irpf<=192400) {
                        $irpf= $irpf*0.24;                        
                    }elseif ($irpf<=288600) {
                        $irpf= $irpf*0.27;
                    }elseif ($irpf<=442520) {
                        $irpf= $irpf*0.31;
                    }else{
                        $irpf= $irpf*0.36;
                    }
                    echo $irpf;
                    
                            ?>
                    <!-- 0 a 7 BPC	$0 a 26,936	Exento
                    7 a 10 BPC	26,936 a 38,480	10%
                    10 a 15 BPC	38,480 a 57,720	15%
                    15 a 30 BPC	57,720 a 115,440	24%
                    30 a 50 BPC	115,440 a 192,400	25%
                    50 a 75 BPC	192,400 a 288,600	27%
                    75 a 115 BPC	288,600 a 442,520	31% 
                    Más de 115 BPC	442,520 en adelante	36%-->
                </td>
            </tr>
            <tr>
                <td class="text-left">
                    Llegadas tarde
                </td>
                <td class="text-rigth">
                    <?php
                    $tarde=0;
                    ?>
                    sueldo*0.125
                </td>
            </tr>
        </table>
        </div>
    </div>
   
    <div class="row">
        <div class="col text-center border border-dark bg-light">
            <h6>Total</h6>            
        </div>
        <div class="col text-center border border-dark bg-light">
            <h6>
                <?php
                $total=$nominal+$horas-$frl-$irpf-$snis-$montepio-$tarde;
                echo $total;
                ?>
            </h6>
        </div>
    </div>
    
    

</body>
</html>
