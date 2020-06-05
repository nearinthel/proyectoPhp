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
    
    public function insert($nroAnuncio, $descripcion){
             
        $sql ="insert into anuncio (nroAnuncio,descripcion) values ("
                . "'$nroAnuncio', '$descripcion')";
        
        
        return $sql;
    }
  
    public function update($nroAnuncio, $descripcion){
        
        $sql="update anuncio set nroAnuncio='$nroAnuncio', descripcion='$descripcion', "
                . "where nroAnuncio='$nroAnuncio' ";
        return $sql;
    }
    
    public function delete($nroAnuncio){
        $sql="delete from anuncio where where nroAnuncio='$nroAnuncio' ";
        
        return $sql;
    }

    

}
