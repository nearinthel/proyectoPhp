<?php
include '../utilities/navBar.php' ;
include_once '../persistencia/ControladorConexion.php';


        $reg=$_POST['registro'];
        $ci=$_POST['ci'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $mail=$_POST['mail'];
        $cargo=$_POST['cargo'];

        $sueldo=$_POST['sueldo'];
        $esJefe=$_POST['esJefe'];
        $esSubordinado=$_POST['esSubordinado'];        
        $esSupervisor=$_POST['esSupervisor'];
        
        $con= ControladorConexion::getInstance();
        $result=$con->getFuncionarioMail($reg);
        foreach ($result as $row){
            $jefe=$row['esJefe'];
            $sub=$row['esSubordinado'];
            $super=$row['esSupervisor'];
        }
        
?>
