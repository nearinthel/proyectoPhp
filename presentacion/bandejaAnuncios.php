<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
        <div class="bg">
        <?php
        include '../utilities/navBar.php';
        
        if(($f->getCargo()->getLevel()=="esJefe")or
                                                ($f->getCargo()->getLevel()=="esSuper")){
            $con= ControladorConexion::getInstance();
            $result=$con->getAnuncios();
            foreach ($result as $value) {
                
                echo "El usuario ". $value['registro']." ha realizado un anuncio por la inconsistencia de la hora ".
                        $value['hora']." diciendo que fue por ".$value['descripcion']."<br />";
                
            }
        }
        // put your code here
        ?>
        </div>
    </body>
</html>
