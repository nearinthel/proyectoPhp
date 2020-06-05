<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FuncionarioMarca
 *
 * @author Alberto Damelles
 */
include("Marca.php");
include("../DataType/DTIncosistencia.php");
include("Funcionario.php");
class FuncionarioMarca {
    
    //diff para calcular las diff
    private $func;
    private $marca;
    private $inconsistencia = null;
    
    public function __construct() {
    }

    public function getFuncionario(){
        return $this->func;
    }
    
    public function getInconsistencia() {
        return $this->inconsistencia;
    }

    public function crearInconsistencia()//para marcar las inconsistencias
    {   //por ahora solo turno fijo no verifica si hay marca
        if($this->marca->getTipo==0){
            if($this->marca->getHora()->format('%h')>8){
                $dtm = new DTMarca($this->marca->getHora(),enumES::Entrada);
                $inc = new DTIncosistencia($this->marca->getHora(),$dtm);//se repite la info
                $this->inconsistencia = $inc;
            };
        }else {//caso de fuera de hora
            if($this->marca->getHora()->format('%h')>16){
                $dtm = new DTMarca($this->marca->getHora(),enumES::Salida);
                $inc = new DTIncosistencia($this->marca->getHora(),$dtm);//se repite la info
                $this->inconsistencia = $inc;
            };
        }    
    }
    
    public function removerIncosistencia() {
        unset($this->inconsistencia);
    }

    public function setFuncionario($f){
        $this->func = $f;
    }

    public function setMarca($m){
        $this->marca = $m;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function crearMarca($hora,$t){
        //crea la marca y la asiga al funcionario
        $m = new Marcar($hora,$t);
        $this->marca = $m;
    }   

}
