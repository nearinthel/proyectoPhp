<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Funcionario
 *
 * @author Alberto Damelles
 * 
 * 
 * falta funcion para ingresar licencia
 * 
 */
include("FuncionarioMarca.php");
include("Anuncio.php");
class Funcionario {
    //put your code here
   
    protected $registro;
    protected $ci;
    protected $nombre;
    protected $apellido;
    protected $fnac;
    protected $fing;
    protected $cargo;
    protected $horario;
    protected $fM;
    protected $pass;

    protected $anuncios;

    public function __construct() {
        
    }

    
    public function getRegistro() {
        return $this->registro;
    }

    public function getCi() {
        return $this->ci;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public  function getApellido() {
        return $this->apellido;
    }

    public function getFnac() {
        return $this->fnac;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getHorario() {
        return $this->horario;
    }

    public function setRegistro($registro) {
        $this->registro = $registro;
    }

    public function setCi($ci) {
        $this->ci = $ci;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setFnac($fnac) {
        $this->fnac = $fnac;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setHorario($horario) {
        $this->horario = $horario;
    }
    
    
    function getFing() {
        return $this->fing;
    }

    function setFing($fing) {
        $this->fing = $fing;
    }



    function ingresarMarca($hora,$tipo){
        //el tipo lo ingresa el que hace la marca
        $fm = new FuncionarioMarca();
        $fm->setFuncionario($this);
        $fm->crearMarca($hora,$tipo);
        $this->fM =$fm;    
        
        $registro=$this->registro;
        $inconsistencia=$this->verificarInconsistencia($hora);
        $controlador= ControladorConexion::getInstance();
        $controlador->insertMarca($hora, $registro, $tipo, $inconsistencia);

    }

    function verificarInconsistencia($hora){
    //inconsistencias:llegar tarde, irte antes
    //por ahora solo fijo te deja irte despues de las 16
    $h = $hora->format('%h');
    $m = $hora->format('%i');
    if(($h<"8") or($h < "16")){
        return true;
    }else {
        return false;
    }   
    }           
     
    public function ingresarAnuncio($nroAnuncio, $just){
        //aca debe notificar al super
        $a = Anuncio::ingresarAnuncio($nroAnuncio, $just);
        $this->anuncios[$this->anuncios->count()] = $a;
        
        $controlador= ControladorConexion::getInstance();
        $controlador->insertAnuncio($nroAnuncio, $just);
    }

     public function arreglarSueldo($idAnuncio)
     {
        $i = 0;
        while($idAnuncio != $this->anuncios[$i].getId()){
            $this->anuncios[$i]->modificarSueldo();
            
            $i++;
        }
        

     }


}
