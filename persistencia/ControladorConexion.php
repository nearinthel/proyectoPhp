<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controladorConexion
 *
 * @author Alberto Damelles
 */
include_once 'Conexion.php';
include_once 'iControladorConexion.php';
include_once 'tblFuncionario.php';
include_once 'tblAnuncio.php';
include_once 'tblMarca.php';
include_once '../clases/Funcionario.php';
include_once '../clases/FuncionarioMarca.php';

include_once '../DataTypes/DTCargo.php';
include_once '../DataTypes/DTSueldo.php';

        

class ControladorConexion implements iControladorConexion {
    private static $instance;
    
    private function __construct() {      

        
    }
    
    private function getConexion(){
        
        $con=Conexion::getInstance();
        $conexion=$con->getConexion();
        if ($conexion=="Error en la conexion"){
            throw new Exception('Error en la conexion');
        }
        return $conexion;
    }
    
    public static function getInstance()
    {
        if (!self::$instance instanceof self){
        
            self::$instance = new self();
           
        }

        return self::$instance;
    }
    
   /* public function getFuncionario(){
        $sql='select * from funcionario';
        
        $resultado=$this->con->query($sql);
        
    }*/
    
    
    public function updateFuncionario($registro, $pass, $nombre, $apellido,$mail, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe){

        
        $tabla= tblFuncionario::getInstance();
         
        $consulta=$tabla->update($registro, $pass, $nombre, $apellido,$mail, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function deleteFuncionario($registro){
        
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->delete($registro);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
    }
    
    public function insertFuncionario($registro, $pass, $nombre, $apellido,$mail, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe) {
        /*$fnac= $fnac->format('Y-m-d H:i:s');
        $fing=$fing->format('Y-m-d H:i:s');
        $entrada=$entrada->format('H:i:s');
        $salida=$salida->format('H:i:s');
        /*$consulta ="insert into funcionario (registro, nombre, apellido, fnac,fing, cargo, sueldo, "
                . "entrada, salida, esSubordinado, esSupervisor, esJefe) values ("
                . "'$registro', '$nombre', '$apellido', '$fnac','$fing', '$cargo'"
                . ",$sueldo,'$entrada', '$salida', '$esSubordinado', '$esSupervisor', '$esJefe')";*/
        $tabla= tblFuncionario::getInstance();
        
       /* $consulta=$tabla->insert($registro, $nombre, $apellido, $fnac->format('Y-m-d H:i:s'), 
            $fing->format('Y-m-d H:i:s'), $cargo, $sueldo, $entrada->format('H:i:s'), $salida->format('H:i:s'), $esSubordinado, $esSupervisor, $esJefe);*/
        
        $consulta=$tabla->insert($registro, $pass, $nombre, $apellido,$mail, $fnac, 
            $fing, $cargo, $sueldo, $entrada, $salida, $esSubordinado, $esSupervisor, $esJefe);
        $conexion=$this->getConexion();
        echo $consulta;
        $conexion->query($consulta);
        
    }
    
    public function agregarSubordinado($primerRegistro, $segundoRegistro){
        
        
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->agregarSubordinado($primerRegistro, $segundoRegistro);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
    }
    
    public function insertAnuncio($nroAnuncio, $descripcion){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->insert($nroAnuncio,$descripcion);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function login($registro, $pass){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->login($registro, $pass);
        $conexion=$this->getConexion();
        return $conexion->query($consulta);
    }
    
    public function selectFuncionario($registro)
    {
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->select($registro);
        $conexion=$this->getConexion();
        return $conexion->query($consulta);
        
    }
    
    public function updateAnuncio($nroAnuncio, $descripcion){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->update($nroAnuncio,$descripcion);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function deleteAnuncio($nroAnuncio){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->delete($nroAnuncio);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function insertMarca($hora, $registro, $tipoMarca, $inconsistencia){
        $tabla= tblMarca::getInstance();
        $consulta=$tabla->insert($hora, $registro, $tipoMarca, $inconsistencia);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function updateMarca($hora, $registro, $tipoMarca,$mes, $anio, $inconsistencia){
        $tabla= tblMarca::getInstance();
        $consulta=$tabla->update($hora, $registro, $tipoMarca, $inconsistencia);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function deleteMarca($hora, $registro, $tipo){
        $tabla= tblMarca::getInstance();
        $consulta=$tabla->delete($hora, $registro, $tipo);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
    }
    
    public function justificar($nroAnuncio, $hora, $registro, $tipoMarca, $inconsistencia){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->justificar($nroAnuncio, $hora, $registro, $tipoMarca, $inconsistencia);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
    }
    
    public function noJustificar($nroAnuncio, $hora, $registro, $tipoMarca){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->noJustificar($nroAnuncio, $hora, $registro, $tipoMarca);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
  
    }
    
    public function aceptarAnuncio($regSup, $nroAnuncio){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->aceptarAnuncio($regSup, $nroAnuncio);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
    }
    
    public function noAceptarAnuncio($regSup, $nroAnuncio){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->noAceptarAnuncio($regSup, $nroAnuncio);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
    }
    
    public function obtenerIncosistencia($registro, $hora, $tipoMarca){
        $tabla= tblMarca::getInstance();
        $consulta=$tabla->select($registro,$hora,$tipoMarca); 


        $conexion=$this->getConexion();
        
        return $conexion->query($consulta);

        
    }
    
//    public function crearInconsistencia(){
//        
//        $marca= tblMarca::getInstance();
//        
//        $consultaMarca=$marca->select($registro, $hora, $tipoMarca);
//        
//        $conexion= $this->getConexion();
//        $resultadoConsultaMarca=$conexion->query($consultaMarca);
//        
//        foreach ($resultadoMarca as $row){
//            
//        }
//        
//    }

    public function getMarcasMes($fun,$tipo,$mes,$anio)
    //les das el fun y le carga las marcas
    {
        $tabla= tblMarca::getInstance();
        $consulta=$tabla->selectMarcasMes($fun->getRegistro(),$tipo,$mes, $anio);
        $conexion=$this->getConexion();
        //$res = $conexion->query($consulta);
        // $fm = new FuncionarioMarca();
        $ar = array();
        $result = $conexion->query($consulta) or die($conexion->error);
        while ($row = $result->fetch_assoc()) {
            $hora= $row["hora"];
            $h= new DateTime($hora);
            $ar[$row["dia"]]=$h;
        }
        return $ar;
//falte meterselo al func y arreglarlo que sea en funcionario no aca
    }
    
    public function getFuncionarioMail($registro){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->select($registro);
        $conexion=$this->getConexion();

        return $conexion->query($consulta);
        
    }
    
    public function getFuncionario($registro){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->select($registro);
        $conexion=$this->getConexion();

        //return $conexion->query($consulta);

        $res = $conexion->query($consulta);
        $f = new Funcionario();
        $row = $res->fetch_assoc();
        $f->setNombre($row["nombre"]);
        $f->setRegistro($row["registro"]);
        $f->setApellido($row["apellido"]);
        $f->setPass($row["pass"]);
        $f->setFing($row["fing"]);
        $dts = new DTSueldo($row["sueldo"]);
        $dtc = new DTCargo($row["cargo"],$dts);
        $f->setCargo($dtc);
        

        // registro, pass , nombre, apellido, fnac,fing, cargo, sueldo, "
        //         . "entrada, salida, esSubordinado, esSupervisor, esJefe
        return $f; 

    }
    
    public function getSupervisor($registro){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->getSupervisor($registro);
        $conexion=$this->getConexion();

        return $conexion->query($consulta);
        
    }
    
   
}


