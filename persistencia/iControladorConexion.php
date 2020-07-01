<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Alberto Damelles
 */
interface iControladorConexion {
    //put your code here
    public static function getInstance();
    
    public function updateFuncionario($registro, $pass, $nombre, $apellido,$mail, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
        
    public function deleteFuncionario($registro);
    
    public function insertFuncionario($registro, $pass, $nombre, $apellido,$mail, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
    
    public function agregarSubordinado($primerRegistro, $segundoRegistro);
    
    public function insertAnuncio($nroAnuncio, $descripcion);

    public function updateAnuncio($nroAnuncio, $descripcion);

    public function deleteAnuncio($nroAnuncio);    
    
    public function insertMarca($hora, $registro, $tipoMarca,$mes, $anio, $inconsistencia);
    
    public function updateMarca($hora, $registro, $tipoMarca,$mes, $anio, $inconsistencia);

    public function justificar($nroAnuncio, $hora, $registro, $tipoMarca, $inconsistencia);

    public function noJustificar($nroAnuncio, $hora, $registro, $tipoMarca);

    public function aceptarAnuncio($regSup, $nroAnuncio);

    public function noAceptarAnuncio($regSup, $nroAnuncio);    
    public function getFuncionarioMail($registro);
    
    public function getSupervisor($registro);
}
