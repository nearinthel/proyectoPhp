<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tblFuncionario
 *
 * @author Alberto Damelles
 */
class tblFuncionario {
    //put your code here
    private static $instance;
    private function __construct() {
        
    }
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self){
            self::$instance = new self();
        
        }

        return self::$instance;
    }
    
    public function insert($registro, $nombre, $apellido, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe){
                
        $fnac= $fnac->format('Y-m-d H:i:s');
        $fing=$fing->format('Y-m-d H:i:s');
        $entrada=$entrada->format('H:i:s');
        $salida=$salida->format('H:i:s');
            
        $sql ="insert into funcionario (registro, nombre, apellido, fnac,fing, cargo, sueldo, "
                . "entrada, salida, esSubordinado, esSupervisor, esJefe) values ("
                . "'$registro', '$nombre', '$apellido', '$fnac','$fing', '$cargo'"
                . ",$sueldo,'$entrada', '$salida', '$esSubordinado', '$esSupervisor', '$esJefe')";
              
        return $sql;
    }
    
    public function agregarSubordinado($primerRegistro, $segundoRegistro){
        $sql="insert into tiene (regSup, regSub) values ('$primerRegistro','$segundoRegistro')";
        return $sql;
    }
    
    public function update($registro, $nombre, $apellido, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe){
        
        $fnac= $fnac->format('Y-m-d H:i:s');
        $fing=$fing->format('Y-m-d H:i:s');
        $entrada=$entrada->format('H:i:s');
        $salida=$salida->format('H:i:s');
        
        $sql="update funcionario set registro='$registro', nombre='$nombre', apellido='$apellido', fnac='$fnac' , fing='$fing' ,"
                . "cargo='$cargo', sueldo='$sueldo' , entrada='$entrada' , salida='$salida' , esSubordinado='$esSubordinado', "
                . "esSupervisor='$esSupervisor', esJefe='$esJefe' where registro= '$registro' ";
        return $sql;
    }
    
    public function delete($registro){
        $sql="delete from funcionario where registro='$registro'";
        
        return $sql;
    }
    
    public function justificar($nroAnuncio, $hora, $registro, $tipoMarca, $inconsistencia){
        $hora=$hora->format('H:i:s');
                
        $sql ="insert into justifica (nroAnuncio, hora, registro, tipoMarca, inconsistencia) values ("
                . "'$nroAnuncio', '$hora', '$registro', '$tipoMarca', '$inconsistencia')";
                
        return $sql;
        
    }
    
    public function noJustificar($nroAnuncio, $hora, $registro, $tipoMarca){
        $hora=$hora->format('H:i:s');
        $sql="delete from justifica where nroAnuncio='$nroAnuncio' and hora='$hora' and registro='$registro' and  tipoMarca='$tipoMarca'";
        return $sql;
    }
    
    
        
    public function aceptarAnuncio($regSup, $nroAnuncio){
        $sql="insert into acepta (regSup, nroAnuncio) values ('$regSup', '$nroAnuncio')";
        return $sql;
    }
    
    public function noAceptarAnuncio($regSup, $nroAnuncio){
        $sql="delete from acepta where regSup='$regSup' and nroAnuncio='$nroAnuncio')";
        return $sql;
    }
    
    public function select($registro){
        $sql="select * from funcionario where registro='$registro'";
        return $sql;
    }
    

}
