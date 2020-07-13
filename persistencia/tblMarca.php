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
     public function insert($h, $registro, $tipo, $inconsistencia){
         
        $hora=$h->format('Y-m-d H:i:s');
        $dia=$h->format('d');
        $mes = $h->format('m');
        $anio = $h->format('Y');   
        $sql ="INSERT INTO marcas (hora, registro, tipoMarca, dia, mes, anio, inconsistencia) VALUES (
                '$hora', '$registro', '$tipo','$dia','$mes','$anio','$inconsistencia')";
               
        return $sql;
    }
  
    public function update($hora, $registro, $tipo, $mes, $anio, $inconsistencia){
        
        $hora=$hora->format('H:i:s');
        
        $sql="update marcas set hora='$hora', registro='$registro', tipoMarca='$tipo',mes='$mes',anio='$anio', inconsistencia='$inconsistencia'"
                . "where hora='$hora' and registro='$registro' and tipoMarca='$tipo' ";
        return $sql;
    }
    
    public function delete($hora, $registro, $tipo){
        
        $hora=$hora->format('H:i:s');
        
        $sql="delete from marcas where hora='$hora' and registro='$registro' and tipoMarca='$tipo' ";
        
        return $sql;
    }
    
    public function select($registro, $hora, $tipoMarca){
        $hora=$hora->format('H:i:s');
        $sql="SELECT * FROM marcas WHERE registro='$registro' AND hora='$hora' AND tipoMarca='$tipoMarca'";
        return $sql;
    }

    public function selectMarcasMes($registro, $tipoMarca, $mes, $anio)
    {
        $sql="SELECT * FROM marcas WHERE registro='$registro' AND tipoMarca='$tipoMarca' AND
            mes='$mes' AND anio='$anio'";
        
        return $sql;
    }
    
        public function getInconsistencia($registro, $inc){
        
        $sql="SELECT * FROM marcas WHERE registro='$registro' AND inconsistencia='$inc'";
        
        return $sql;
        
    }
      
    

    


}
