<?php
include_once '../clases/Funcionario.php'; 
session_start();
$f = $_SESSION["func"];

?>
<ul class="nav justify-content-end">
<li class="nav-item">
    <a class="nav-link" href="funcionario.php">Inicio</a>
</li>
<li>
    <a href="../utilities/recibo.php" class="nav-link" target="_blank">Ver recibo</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" style=<?php if(($f->getCargo()->getLevel()=="esJefe")or
                                                ($f->getCargo()->getLevel()=="esSuper"))
                                                    {echo '';}else{echo '"display:none"';} ?>>
    Bandeja de Anuncios
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" style=<?php if(($f->getCargo()->getLevel()!="esJefe"))
                                                {echo '"display:none"';}?>>
    Crear Anuncio
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="nivelesModificar.php" style=<?php if($f->getCargo()->getLevel()!="esJefe")echo '"display:none"'; ?>>
    Modificar Funcionario
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="agregarFuncionario.php" style=<?php if($f->getCargo()->getLevel()!="esJefe"){echo '"display:none"';} ?>>
    Agregar Funcionario
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="logout.php">Log out</a>
</li>
</ul>
<?php
?> 