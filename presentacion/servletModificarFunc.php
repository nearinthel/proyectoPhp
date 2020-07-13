<?php

include_once '../persistencia/ControladorConexion.php';
include_once '../controladores/ControladorFuncionario.php';


        $reg=$_POST['registro'];
        $ci=$_POST['ci'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $mail=$_POST['mail'];
        $cargo=$_POST['cargo'];

        $sueldo=$_POST['sueldo'];
        $opcion=$_POST["nivel"];
        $esSubordinado=0; 
        $esSupervisor=0; 
        $esJefe=0;

        switch ($opcion){
        case "esJefe":
            $esJefe=1;
            break;
        case "esSuper":
            $esSupervisor=1;
            break;
        default :
            $esSubordinado=1;
            break;

        }

        
        $con= ControladorConexion::getInstance();
        $conFun= ControladorFuncionario::getInstance();
        $result=$con->selectFuncionario($reg);
        foreach ($result as $row){
            $jefe=$row['esJefe'];
            $sub=$row['esSubordinado'];
            $super=$row['esSupervisor'];
        }
        
        
        
        $con->updateFun($reg,$ci, $nombre, $apellido,$mail, 
            $cargo, $sueldo, $esSubordinado, $esSupervisor, $esJefe);
        
        echo $jefe;
        echo $super;
        echo $sub;
        echo $esJefe;
        echo $esSupervisor;
        echo $esSubordinado;
        
        
        if ($ci!=$reg){
            $con->updateTiene($reg, $ci);
            
        }
        
        if (($esJefe!=$jefe) or ($esSubordinado!=$sub) or ($esSupervisor!=$super)){
            $con->delSubordinados($reg);
            $conFun->agregarSupers($reg, $esSubordinado, $esSupervisor, $esJefe);
        }
        
        $_SESSION["msg"]="Funcionario ".$ci." ".$nombre." ".$apellido. " actualizado. <br />";
        
        header("Location: nivelesModificar.php");
        
        

