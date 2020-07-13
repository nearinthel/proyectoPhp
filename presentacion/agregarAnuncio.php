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
    include_once '../controladores/ControladorAnuncio.php';
    //$ins=ControladorAnuncio::getInstance();
    //$a = $ins->ingresarAnuncio($_POST['nroA'], $_POST['just'],$_SESSION['func'],$_POST['hini'],$_POST['hfin']);
    $hora=$_POST['hora'];
    ?>
        <h5 class="card-title">Ingresar un nuevo anuncio</h5>
    
    <form class="form-signin" ENCTYPE = "multipart/form-data" action="servletAnuncio.php" method="POST">
    <div class="row">
        <input type="hidden" name="hora" value="<?php echo $hora ?>">

    <div class="col-md-5">

        <div class="form-label-group">
            <textarea id="desc" name="desc" class="form-control" required></textarea>
        </div>
    </div>
    </div>
            <button class="btn btn-lg btn-primary text-uppercase" type="submit">Ingresar Anuncio</button>
            
    </form>

</div>
</body>
</html>