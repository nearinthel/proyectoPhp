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
include_once "FuncionarioMarca.php";
include_once "Anuncio.php";
include_once "../persistencia/ControladorConexion.php";
require '../librerias/PHPMailer/src/PHPMailer.php';
require '../librerias/PHPMailer/src/Exception.php';
require '../librerias/PHPMailer/src/SMTP.php';

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;

class Funcionario implements SplObserver{
    //put your code here
   
    protected $registro;
    protected $ci;
    protected $nombre;
    protected $apellido;
    protected $fnac;
    protected $fing;
    protected $cargo;
    protected $horario;
    protected $fM = array();
    protected $pass;
    protected $img;
    protected $mail;
    protected $anuncios;

    public function __construct() {
        
    }

    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass = $pass;
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
    function getMail() {
        return $this->mail;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }


    function getListaMarcas(){
        return $this->fM;
    }



    function ingresarMarca($hora,$tipo){
        //el tipo lo ingresa el que hace la marca
        $fm = new FuncionarioMarca();
        $fm->setFuncionario($this);
        //$fm->crearMarca($hora,$tipo);
        array_push($this->fM,$fm);
        $registro=$this->registro;
        $inconsistencia=$this->verificarInconsistencia($hora, $tipo);
        $controlador= ControladorConexion::getInstance();
        $controlador->insertMarca($hora, $registro, $tipo, $inconsistencia);
    }

    function verificarInconsistencia($hora, $tipo){
    //inconsistencias:llegar tarde, irte antes
    $h = $hora->format('H:i');
    $h= new DateTime($h);
    if($tipo == 0){
        $en = '08:00';
        $entrada = new DateTime($en);        
        return ($entrada<$h);
    }else{
        $sa = '16:00';    
        $salida = new DateTime($sa);
        return ($salida>$h);
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
        $this->anuncios[$i]->modificarSueldo();

     }
     
      public function update(SplSubject $subject){
        $archivo="../config/config.ini";
        
        $contenido= parse_ini_file($archivo, false);
        
        $hostCorreo=$contenido["hostCorreo"];
        $port=$contenido["port"];
        $remitente=$contenido["remitente"];
        $passCorreo=$contenido["passCorreo"];
          
          
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Port = $port;
	$mail->SMTPAuth = true;
	$mail->Host = $hostCorreo;
	$mail->isHTML(true);
	$mail->SMTPOptions = array('ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true ));
        $destinatarioCorreo=$this->mail;
       // $remitenteCorreo="phprecibos@gmail.com";
        //$passCorreo="AdminAdmin";
        $mailAenviar= $subject->getEstado();
	$mail->Username = $remitente;//"phprecibos@gmail.com";//$remitenteCorreo;
	$mail->Password = $passCorreo;//"AdminAdmin";//$passCorreo;
	$mail->setFrom($remitente);//phprecibos@gmail.com");//$remitenteCorreo);
	$mail->addAddress($destinatarioCorreo);
	$mail->Subject = 'Notificacion de nuevo Anuncio';
	$mail->Body = $mailAenviar;
	if (!$mail->send()) {
	    //echo "ERROR: " . $mail->ErrorInfo."\n";
	    //errorWrite($mail->ErrorInfo);
            echo $hostCorreo;
            echo $port;
            echo $destinatarioCorreo;
            echo "no enviado";
	}        
              
    }


}
