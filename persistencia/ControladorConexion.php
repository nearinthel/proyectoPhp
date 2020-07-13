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
    
    public function updateFun($ci, $registro, $nombre, $apellido,$mail, 
            $cargo, $sueldo, $esSubordinado, $esSupervisor, $esJefe){

        
        $tabla= tblFuncionario::getInstance();
         
        $consulta=$tabla->updateFun($ci ,$registro, $nombre, $apellido,$mail, 
                $cargo, $sueldo, $esSubordinado, $esSupervisor, $esJefe);
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
        
        $conexion->query($consulta);
        
    }
    
    public function agregarSubordinado($regSuper, $regSub){
        
        
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->agregarSubordinado($regSuper, $regSub);
        $conexion=$this->getConexion();
        echo $consulta. "<br />";
        $conexion->query($consulta);
    }
    
    public function insertAnuncio($nroAnuncio, $descripcion ,$idAnuncio, $justificacion){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->insert($nroAnuncio,$descripcion, $idAnuncio, $justificacion);
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

    public function selectAnuncio($nroAnuncio, $idAnuncio){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->select($nroAnuncio, $idAnuncio);
        $conexion=$this->getConexion();
        return $conexion->query($consulta);
    }

    public function selectCountAnuncio($nroAnuncio){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla-> selectCountAnuncio($nroAnuncio);
        $conexion=$this->getConexion();
        $res = $conexion->query($consulta);
        return $res->num_rows;
    }
    public function selectAnuncios(){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->selectAnuncios();
        $conexion=$this->getConexion();
        return $conexion->query($consulta);
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
    
    public function justifica($nroAnuncio, $entrada, $salida, $registro, $tipoMarca, $inconsistencia){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->justifica($nroAnuncio, $entrada, $salida, $registro, $tipoMarca, $inconsistencia);
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
    

    
    public function getFuncionario($registro){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->select($registro);
        $conexion=$this->getConexion();

        //return $conexion->query($consulta);

        $res = $conexion->query($consulta) ;
        $f = new Funcionario();
        $row = $res->fetch_assoc();
        $f->setNombre($row["nombre"]);
        $f->setRegistro($row["registro"]);
        $f->setApellido($row["apellido"]);
        $f->setPass($row["pass"]);
        $f->setFing($row["fing"]);
        $dts = new DTSueldo($row["sueldo"]);
        $dtc = new DTCargo($row["cargo"],$dts);
        if($row["esSupervisor"]==1){
            $dtc->setLevel("esSuper");
        }elseif ($row["esJefe"]==1) {
            $dtc->setLevel("esJefe");
            
        }else{
            $dtc->setLevel("esSubordinado");
        }
        $f->setCargo($dtc);
        

        // registro, pass , nombre, apellido, fnac,fing, cargo, sueldo, "
        //         . "entrada, salida, esSubordinado, esSupervisor, esJefe
        return $f; 

    }
    
    public function getSupervisor($registro){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->getSupervisor($registro);
        $conexion=$this->getConexion();
        $res =$conexion->query($consulta) or die($conexion->error);
       // $row = $res->fetch_assoc();
        //return $row['regSup'];
        return $res;
    }
    
    public function getSupers(){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->getSupers();
        $conexion=$this->getConexion();

        return $conexion->query($consulta);
    }
    
    public function getJefes(){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->getJefes();
        $conexion=$this->getConexion();

        return $conexion->query($consulta);
    }
    
    public function getSubs(){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->getSubs();
        $conexion=$this->getConexion();

        return $conexion->query($consulta);
        
    }
    
    public function delSubordinados($reg){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->delSubordinados($reg);
        
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        
        
    }
    
    public function getMarcasInconsistentes($reg){
        $tabla= tblMarca::getInstance();
        $consulta=$tabla->getInconsistencia($reg, 1);

        $conexion=$this->getConexion();

        return $conexion->query($consulta);
        
        
      
    }
    
    public function updateTiene($ci, $reg){
        $tabla= tblFuncionario::getInstance();
        $consulta=$tabla->updateTieneSupervisor($ci, $reg);
        $conexion=$this->getConexion();
        $conexion->query($consulta);
        $consulta=$tabla->updateTieneSubordinado($ci,$reg);
        $conexion->query($consulta);
     
        
    }
    
        public function insertAnuncios($hora, $reg, $desc){
        $tabla= tblAnuncio::getInstance();
        $consulta=$tabla->insertAnuncios($hora, $reg, $desc);
        $conexion=$this->getConexion();

        $conexion->query($consulta);
            
        }
    
        
        public function getAnuncios(){
            $tabla= tblAnuncio::getInstance();
            $consulta=$tabla->getAnuncios();
            $conexion=$this->getConexion();
            return $conexion->query($consulta);
        }

    
    
   
}


