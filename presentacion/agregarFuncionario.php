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
            <a class="nav-link" href="../funcionario.php">Planilla</a>
        </li>
        <li>
        <a href="#" class="nav-link">Ver recibo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Bandeja de Anuncios
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Crear Anuncio
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            Modificar Funcionario
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Log out</a>
        </li>
    </ul>
    <h5 class="card-title">Ingresar un nuevo funcionario</h5>
    <form class="form-signin" ENCTYPE = "multipart/form-data" action="ingresarFunc.php" method="POST">
    <div class="row">
    <div class="col-md-5">
        <div class="form-label-group">
            <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="form-label-group">
            <input type="text" id="lname" name="lname" class="form-control" placeholder="Apellido" required>
        </div>
        <div class="form-label-group">
            <input type="text" id="ci" name="ci" class="form-control" placeholder="Cedúla" required>
        </div>
        <div class="form-label-group">
        <label>Fecha de nacimiento:    <input type="date" id="fnac" name="fnac" class="form-control" required>
        </label>
        </div>
    </div>
    <div class="col-md-5 text-center">
    <div class="form-label-group">
        <label for="img">Ingrese una foto del funcionario 
        <input type="file" name="img" class="form-control-file"></label>
    </div>
    <div class="form-label-group">
        <label for="nivel">Cargo del funcionario</label>
        <select name="nivel" id="nivel">
            <option value="esJefe">Jefe</option>
            <option value="esSuper">Supervisor</option>
            <option value="esSub">Cajero</option>
            <option value="esSub">Operario</option>
            <option value="esSub">Administrativo</option>
        </select>
    </div>
    <div class="form-label-group">
        <label>Ingrese el sueldo
        <input type="number" id="sueldo" name="sueldo" class="form-control" required></label>
    </div>
    </div>
    </div>
    <button class="btn btn-lg btn-primary text-uppercase" type="submit">Ingresar Funcionario</button>
    </form>
    </div>
    </div>

</body>
</html>