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
    protected $cargo;
    protected $horario;
    
    function __construct() {
        
    }

    
    function getRegistro() {
        return $this->registro;
    }

    function getCi() {
        return $this->ci;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFnac() {
        return $this->fnac;
    }

    function getCargo() {
        return $this->cargo;
    }

    function getHorario() {
        return $this->horario;
    }

    function setRegistro($registro) {
        $this->registro = $registro;
    }

    function setCi($ci) {
        $this->ci = $ci;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFnac($fnac) {
        $this->fnac = $fnac;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }


                
                
}
