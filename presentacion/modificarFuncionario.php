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
    <?php include_once '../utilities/navBar.php';
    include_once '../persistencia/ControladorConexion.php';
    $registro=$_POST['funcionario'];
    
    $con= ControladorConexion::getInstance();
    $result=$con->getFuncionarioMail($registro);
    foreach ($result as $row) {
        $reg=$row['registro'];
        $nombre=$row['nombre'];
        $apellido=$row['apellido'];
        $mail=$row['mail'];
        $cargo=$row['cargo'];
        //$fing=$row['fing'];
        //$fnac=$row['fnac'];
        $sueldo=$row['sueldo'];
        $esJefe=$row['esJefe'];
        $esSubordinado=$row['esSubordinado'];        
        $esSupervisor=$row['esSupervisor'];
        
    }
    
    ?>

    <h5 class="card-title">Modificar funcionario</h5>
    
    <form class="form-signin" ENCTYPE = "multipart/form-data" action="" method="POST">
        <input type="hidden" name="registro" value="<?php echo $registro ?>">
    <div class="row">
        <?php
        
        ?>

    <div class="col-md-5">
        <div class="form-label-group">
            <input type="text" id="ci" name="ci" class="form-control" value="<?php echo $reg; ?>" required >
        </div>
        <div class="form-label-group">
            <input type="text" id="name" name="nombre" class="form-control" value="<?php echo $nombre; ?>" required>
        </div>
        <div class="form-label-group">
            <input type="text" id="lname" name="apellido" class="form-control" value="<?php echo $apellido; ?>" required>
        </div>

        <div class="form-label-group">
            <input type="text" id="mail" name="mail" class="form-control" value="<?php echo $mail; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        
        <div class="form-label-group">
            <input type="text" id="mail" name="cargo" class="form-control" value="<?php echo $cargo; ?>"required>
        </div>
        <!--<div class="form-label-group">
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-label-group">
        <label>Fecha de nacimiento:    <input type="date" id="fnac" name="fnac" class="form-control" required>
        </label>
        </div>-->
    </div>
        
    <div class="col-md-5 text-center">
    <div class="form-label-group">
    <!--<label for="img">Ingrese una foto del funcionario 
        <input type="file" name="img" class="form-control-file"></label>
    </div>-->
    <div class="form-label-group">
        <label for="nivel">Nivel del funcionario</label>
        <select name="nivel" id="nivel">
            
            <?php 
            if($esJefe==1){
                echo "<option value='esJefe' selected>Jefe</option>
            <option value='esSuper'>Supervisor</option>
            <option value='esSub'>Empleado</option>";
                
            }elseif($esSupervisor==1){
                echo "<option value='esJefe'>Jefe</option>
            <option value='esSuper' selected>Supervisor</option>
            <option value='esSub'>Empleado</option>";
            }else{
                echo "<option value='esJefe'>Jefe</option>
            <option value='esSuper'>Supervisor</option>
            <option value='esSub' selected>Empleado</option>";
            }
            
            ?>


        </select>
    </div>
    <div class="form-label-group">
        <label>Ingrese el sueldo
        <input type="number" id="sueldo" name="sueldo" class="form-control" value="<?php echo $sueldo; ?>"required></label>
    </div>
    </div>
    </div>
    <button class="btn btn-lg btn-primary text-uppercase" type="submit">Modificar Funcionario</button>
    </form>
    </div>
    </div>

</body>
</html>
