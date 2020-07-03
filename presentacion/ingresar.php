<?php 
include_once '../clases/Funcionario.php';
 session_id("elfun"); 
 session_start();
    
    //include_once '../controladores/ControladorFuncionario.php';
    include_once '../persistencia/ControladorConexion.php';
   
    $passi= $_POST['pass'];
    
    // if(!isset($_COOKIE['reg'])){
        if(isset($_POST['check'])){
            $con = ControladorConexion::getInstance();
            $reg= $_POST['reg'];
            $func = $con->getFuncionario($reg);
            $_SESSION["func"] = $func;
            if($func->getPass() == $passi){
                setcookie('fun',$reg,time() + 1800 , "/");
                setcookie('reg',$passi,time() + 1800 , "/");//hay que vichar el path (86400 * 30)eso es un mes
            }
        }
    // }
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
        
    <?php
    
    //aca iria una pagina de inicio de la empresa
    $con = ControladorConexion::getInstance();
    $func = $con->getFuncionario($_POST['reg']);
    $_SESSION["func"] = $func;
    $_SESSION["pass"] = $passi;
    if($func->getPass() == $passi){
        echo "<h3 class=".'"text-white text-center"'.">Bienvenido ".$func->getNombre()." ".$func->getApellido()."<h3>";
        echo "<ul class=".'"nav nav justify-content-center"'.">";
        echo "<li class=".'"nav-item"'.">";
        echo "<a class=".'"nav-link"'. "href=".'"funcionario.php"'.">Ver ficha personal</a></li>";
        echo "<li class=".'"nav-item"'.">
                <a class=".'"nav-link"'. "href=".'"../utilities/recibo.php"'.">Ver el recibo de sueldo</a></li>";
        echo "<li class=".'"nav-item"'.">
                <a class=".'"nav-link"'. "href=".'"#"'.">Logout</a></li></ul>";
    }else{
        echo "<h3 class=".'"text-white text-center"'.">Contraseña Incorrecta<h3>";
        echo "<a class=".'"nav-link"'. "href=".'"ingSistema.php"'.">Probar nuevamente</a></li>";
    }
    ?>
    </div>

</body>
</html>