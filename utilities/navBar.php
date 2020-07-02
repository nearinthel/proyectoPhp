<?php
include_once '../clases/Funcionario.php'; 
$f = $_SESSION["func"];

?>
<ul class="nav justify-content-end">
<li class="nav-item">
    <a class="nav-link" href="../index.html">Inicio</a>
</li>
<li>
<a href="#" class="nav-link">Ver recibo</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" style=<?php if(($f->getCargo()->getNivel()=="esJefe")or
                                                ($f->getCargo()->getNivel()=="esSuper"))
                                                    {echo '';}else{echo '"display:none"';} ?>>
    Bandeja de Anuncios
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" style=<?php if(($f->getCargo()->getNivel()!="esJefe"))
                                                {echo '"display:none"';}?>>
    Crear Anuncio
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#" style=<?php if($f->getCargo()->getNivel()!="esJefe")echo '"display:none"'; ?>>
    Modificar Funcionario
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="agregarFuncionario.php" style=<?php if($f->getCargo()->getNivel()!="esJefe"){echo '"display:none"';} ?>>
    Agregar Funcionario
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#">Log out</a>
</li>
</ul>

