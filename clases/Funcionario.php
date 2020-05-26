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
 */
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




                
                
}
