<?php

include_once '../clases/Anuncio.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorAnuncio
 *
 * @author Alberto Damelles
 */
include_once '../clases/Funcionario.php';
include_once '../persistencia/ControladorConexion.php';

// include_once 'IControladorAnuncio.php';


class ControladorAnuncio {
    
    private static $instance;
    
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    public function aceptarAnuncio($a,$f){
        $super = $f->getSuper();
        $id  = $a->getId();
        $super->aceptarAnuncio($id);
        $f->arreglarSueldo($id);
        $a->borrarInconsistencia();        
    }
    public function ingresarAnuncio($num, $just,$emp, $entrada, $salida){
        $con = ControladorConexion::getInstance();
        //$super = $con->getSupervisor($emp->getRegistro());//el registro del super
        //aca va notificar
        $a= Anuncio::ingresarAnuncio($num,"", $just);
        $con->justifica($a->getNroAnuncio(), $entrada, $salida, $emp->getRegistro(), "", "1");
        // si la hora es now es por licencia
        try{
            $empleado=new Funcionario();
            $result=$con->getSupervisor($emp->getRegistro());
            foreach ($result as $row){
                $sup=$row["regSup"];
            }
            $resultado=$con->selectFuncionario($sup);          
            foreach ($resultado as $row) {
                $empleado->setRegistro($row["registro"]);
                $empleado->setMail($row["mail"]);
            }
            $a->attach($empleado);
            $a->setEStado("Numero de Anuncio:" .$num." Descricpcion: ".$just);
            $a->notify();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $a;
    }
    
        public function ingAnuncio($hora, $reg, $desc){
        $con = ControladorConexion::getInstance();
        //$super = $con->getSupervisor($emp->getRegistro());//el registro del super
        //aca va notificar
        //$a= Anuncio::ingresarAnuncio($num,"", $just);
        //$con->justifica($a->getNroAnuncio(), $entrada, $salida, $emp->getRegistro(), "", "1");
        $con->insertAnuncios($hora, $reg, $desc);
        // si la hora es now es por licencia
        try{
            $empleado=new Funcionario();
            $result=$con->getSupervisor($reg);
            foreach ($result as $row){
                $sup=$row["regSup"];
            }
            $resultado=$con->selectFuncionario($sup);          
            foreach ($resultado as $row) {
                $empleado->setRegistro($row["registro"]);
                $empleado->setMail($row["mail"]);
            }
            $a->attach($empleado);
            $a->setEStado("Numero de Anuncio:" .$num." Descricpcion: ".$just);
            $a->notify();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $a;
    }
}
