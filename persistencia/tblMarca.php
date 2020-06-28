<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tblMarca
 *
 * @author Alberto Damelles
 */
class tblMarca {
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
     public function insert($hora, $registro, $tipo,$mes, $anio, $inconsistencia){
         
        $hora=$hora->format('H:i:s');
          
        $sql ="insert into marca (hora, registro, tipoMarca,mes, anio, inconsistencia) values ("
                . "'$hora', '$registro', '$tipo','$mes','$anio' '$inconsistencia')";
               
        return $sql;
    }
  
    public function update($hora, $registro, $tipo, $mes, $anio, $inconsistencia){
        
        $hora=$hora->format('H:i:s');
        
        $sql="update marca set hora='$hora', registro='$registro', tipoMarca='$tipo',mes='$mes',anio='$anio', inconsistencia='$inconsistencia'"
                . "where hora='$hora' and registro='$registro' and tipoMarca='$tipo' ";
        return $sql;
    }
    
    public function delete($hora, $registro, $tipo){
        
        $hora=$hora->format('H:i:s');
        
        $sql="delete from marca where hora='$hora' and registro='$registro' and tipoMarca='$tipo' ";
        
        return $sql;
    }
    
    public function select($registro, $hora, $tipoMarca){
        $hora=$hora->format('H:i:s');
        $sql="select * from marca where registro='$registro' and hora='$hora' and tipomarca='$tipoMarca'";
        return $sql;
    }

}
