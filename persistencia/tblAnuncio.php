<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tblAnuncio
 *
 * @author Alberto Damelles
 */
class tblAnuncio {
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
    
    public function insert($nroAnuncio, $descripcion, $idAnuncio, $justificacion){
             
        $sql ="INSERT INTO anuncio (nroAnuncio,descripcion,idAnuncio,justificacion) VALUES 
            ('$nroAnuncio', '$descripcion' , '$idAnuncio' , '$justificacion')";
        return $sql;
    }
  
    public function update($nroAnuncio, $descripcion){
        
        $sql="UPDATE anuncio SET nroAnuncio='$nroAnuncio', descripcion='$descripcion', WHERE nroAnuncio='$nroAnuncio' ";
        return $sql;
    }
    
    public function delete($nroAnuncio){
        $sql="DELETE FROM anuncio WHERE nroAnuncio='$nroAnuncio' ";        
        return $sql;
    }

    public function select($nroAnuncio, $idAnuncio){
        $sql="SELECT * FROM anuncio WHERE idAnuncio='$idAnuncio' AND nroAnuncio='$nroAnuncio'";        
        return $sql;
    }

    public function selectCountAnuncio($nroAnuncio){
        $sql="SELECT * FROM anuncio WHERE nroAnuncio='$nroAnuncio'";        
        return $sql;
    }
    public function selectDesc($nroAnuncio){
        $sql="SELECT descripcion FROM anuncio WHERE nroAnuncio='$nroAnuncio'";        
        return $sql;
    }

    public function selectAnuncios()
    {
        $sql="SELECT nroAnuncio, descripcion FROM anuncio WHERE idAnuncio=0";        
        return $sql; 
    }
    

}
