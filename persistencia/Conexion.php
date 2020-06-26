<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author Alberto Damelles
 */
class Conexion {
    //put your code here
    private static $instance;
    private $conexion;


    private function __construct() {
        
	$host="localhost";
	$user="root";
	$pass="12345";
	$bd="proyectophp";
	$con = new mysqli($host,$user,$pass, $bd);
	//mysqli_select_db($con,$bd);
	//if (mysqli_connect_errno($con))
        if ($con->connect_errno)
	{
		$con="Error en la conexion";
                
	}
	$this->conexion=$con;

    }
    
    public function getConexion() {
        return $this->conexion;
    }

        
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    public function close(){
        $con=$this->conexion;
        $con->close();
        
        
    }
    
    public function query($sql){
        
        echo $sql;
       if ( $this->conexion->query($sql)===FALSE){
           throw new Exception("No se pudo ejecutar la query");           
       }

                    
       return $this->conexion->query($sql);
    }
    
    public function select($sql){
       $resultado=$this->conexion->query($sql);
               
       return $resultado;
    }
    
    

    
    
}
