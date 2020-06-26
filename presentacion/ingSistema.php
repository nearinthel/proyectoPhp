<?php
  include_once '../persistencia/ControladorConexion.php';
  include_once '../clases/Funcionario.php';
  if(isset($_COOKIE['reg'])){
    $isnt = ControladorConexion::getInstance();
    $func = $isnt->getFuncionario($_COOKIE['reg']);
    $pass = $func->getPass();
  }else{
    $pass='';
  };
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
    <title>Document</title>
</head>
<body>
    <div class="bg">
        <div class="container">
            <div class="row">
              <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                  <div class="card-body">
                    <h5 class="card-title text-center">Ingresar al Sistema</h5>
                    <form class="form-signin" action="ingresar.php" method="POST">
                      <div class="form-label-group">
                        <input type="text" id="reg" name="reg" class="form-control" placeholder="Registro" required autofocus>
                      </div>
        
                      <div class="form-label-group">
                        <input type="password" id="pass" name="pass"class="form-control" placeholder="Contraseña" value="<?php $pass
                        ?>" required>
                      </div>
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" id="check">
                        <label class="custom-control-label" for="check">Recordar contraseña</label>
                      </div>
                      <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</body>
</html>