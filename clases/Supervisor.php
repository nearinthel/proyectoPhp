<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Supervisor
 *
 * @author Alberto Damelles
 */
include 'Anuncio.php';
require 'librerias/PHPMailer/src/PHPMailer.php';
require 'librerias/PHPMailer/src/Exception.php';
require 'librerias/PHPMailer/src/SMTP.php';

class Supervisor extends Funcionario implements SplObserver{
    private $anuncios;//lista de anuncios a aprobar
    private $email;

    public function Email($mail)
    {
        $this->email = $mail;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function aceptarAnuncio($idAnuncio) {

        //saca el anuncio de la lista del supervisor
        $i = 0;
        while($idAnuncio != $anuncios[$i].getId()){
             //revisar memoria
            unset($anuncios[$i]);
            $i++;
        }
       
    }

    public function agregarAnuncio($a){
        $this->anuncios[$this->anuncios->count()]=$a;
    }

   
    public function update(SplSubject $subject){

	$mail = new PHPMailer();
	$mail->isSMTP();

	$mail->Port = 587;
	$mail->SMTPAuth = true;
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->isHTML(true);

	$mail->SMTPOptions = array(
   	'ssl' => array(
    	'verify_peer' => false,
     	'verify_peer_name' => false,
     	'allow_self_signed' => true
    	)
	);
        
        $destinatarioCorreo=$this->mail;
        $remitenteCorreo="phprecibos@gmail.com";
        $passCorreo="AdminAdmin";
        
        $mailAenviar= $subject->getEstado();

	$mail->Username = $remitenteCorreo;
	$mail->Password = $passCorreo;
	$mail->setFrom($remitenteCorreo);
	$mail->addAddress($destinatarioCorreo);
	$mail->Subject = 'Notificacion de nuevo Anuncio';
	$mail->Body = $mailAenviar;

	if (!$mail->send()) {
	    //echo "ERROR: " . $mail->ErrorInfo."\n";
	    errorWrite($mail->ErrorInfo);
	}
        
    }
}
