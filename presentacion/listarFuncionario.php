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
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <div class="bg">
            <?php include '../utilities/navBar.php' ?>
        <div class='col-sm-8'>
            <div class='container' >
            <h1 class='text-center'>Funcionarios a actualizar</h1>
            </div>
            </div>
    
            <form class="form-signin" ENCTYPE = "multipart/form-data" action="modificarFuncionario.php" method="POST">
        <?php
        // put your code here
        include_once '../persistencia/ControladorConexion.php';
        $con= ControladorConexion::getInstance();
        $tipoNivel=$_POST["nivel"];
        ?>
        <div class="form-label-group">
        <?php
        if ($tipoNivel=="esJefe"){
            $result=$con->getJefes();
            foreach ($result as $row){
                echo "<input type='radio' name='funcionario' value=".$row["registro"].">".$row["registro"]." ".$row["apellido"]." ".$row["nombre"]." Jefe </input>";
		echo "<br />";
            }
            
        }elseif ($tipoNivel=="esSuper"){
            $result=$con->getSupers();
            foreach ($result as $row){
                echo "<input type='radio' name='funcionario' value=".$row["registro"].">".$row["registro"]." ".$row["apellido"]." ".$row["nombre"]." Supervisor</input>";
		echo "<br />";
            }
        }elseif ($tipoNivel=="esSub"){
            $result=$con->getSubs();
            foreach ($result as $row){
                echo "<input type='radio' name='funcionario' value=".$row["registro"].">".$row["registro"]." ".$row["apellido"]." ".$row["nombre"]." Empleado</input>";
		echo "<br />";
            }
                
        }?>
        </div>
            
        


            
        
        
            <button class="btn btn-lg btn-primary text-uppercase" type="submit">Modificar Funcionario</button>
        </form>
            </div>
    </body>
</html>
